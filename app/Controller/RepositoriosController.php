<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'php-version-control/autoload');
/**
 * Repositorios Controller
 *
 * @property Repositorio $Repositorio
 */
class RepositoriosController extends AppController {

    public $uses = array('Repositorio', 'EquipeUsuario');

    public $components = array('Svn');

/**
 * atributo armazena o versionador instânciado[svn|git]
*/
    private $versionador = null;

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Repositorio->recursive = 0;
        $this->set('repositorios', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->Repositorio->exists($id)) {
            throw new NotFoundException(__('Repositório inválido'));
        }
        $options = array('conditions' => array('Repositorio.' . $this->Repositorio->primaryKey => $id));
        $this->set('repositorio', $this->Repositorio->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Repositorio->create();
            $this->request->data['Repositorio']['usuario_id'] = $this->Session->read('Auth.User.id');
            if ($this->Repositorio->save($this->request->data)) {
                $repositorio = $this->Repositorio->findById($this->Repositorio->id);
                $this->loadVersionador($repositorio['TipoRepositorio']['nome']);
                $this->versionador->create($this->request->data['Repositorio']['nome']);
                $this->Session->setFlash(__('Registro salvo com sucesso.'), 'default', array('class' => 'notification success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Problemas ao salvar registro. Por favor, tente novamente.'));
            }
        }
        $tipoRepositorios = $this->Repositorio->TipoRepositorio->find('list');
        $this->set(compact('tipoRepositorios'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        if (!$this->Repositorio->exists($id)) {
            throw new NotFoundException(__('Repositório inválido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $repositorio = $this->Repositorio->findById($id);
            if ($this->Repositorio->save($this->request->data)) {
                $this->loadVersionador($repositorio['TipoRepositorio']['nome']);
                $this->versionador->rename($repositorio['Repositorio']['nome'], $this->request->data['Repositorio']['nome']);
                $this->Session->setFlash(__('Registro salvo com sucesso.'), 'default', array('class' => 'notification success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Problemas ao salvar registro. Por favor, tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('Repositorio.' . $this->Repositorio->primaryKey => $id));
            $this->request->data = $this->Repositorio->find('first', $options);
        }
        $usuarios = $this->Repositorio->Usuario->find('list');
        $tipoRepositorios = $this->Repositorio->TipoRepositorio->find('list');
        $this->set(compact('usuarios', 'tipoRepositorios'));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->Repositorio->id = $id;
        $repositorio = $this->Repositorio->findById($id);
        if (!$this->Repositorio->exists()) {
            throw new NotFoundException(__('Repositório inválido'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Repositorio->delete()) {
            $this->loadVersionador($repositorio['TipoRepositorio']['nome']);
            $this->versionador->delete($repositorio['Repositorio']['nome']);
            $this->Session->setFlash(__('Registro deletado com sucesso.'), 'default', array('class' => 'notification success'));
        } else {
            $this->Session->setFlash(__('Problemas ao deletar registro. Por favor, tente novamente.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

/**
 * sincronizar method, sincroniza os usuários da equipe com o controle de versão.
 *
 * @param string $repositorioId
 * @param string $equipeId
 * @return void
 */
    public function sincronizar($equipeId, $repositorioId){
        $repositorio = $this->Repositorio->find('first', array('conditions' => array('Repositorio.id' => $repositorioId)));
        $this->loadVersionador($repositorio['TipoRepositorio']['nome']);
        $usuarios = $this->getUsuariosEquipe($equipeId);
        if ($usuarios) {
            foreach ($usuarios as $value) {
                $this->versionador->addUser(strtolower($value), Configure::read('user.default.senha'));
            }
        }
        $equipe = $this->EquipeUsuario->Equipe->find('first', array('conditions' => array('Equipe.id' => $equipeId)));
        $this->Svn->svnAcl($usuarios, $equipe, $repositorio);
        $this->Session->setFlash(__('Repositório sincronizado com sucesso.'), 'default', array('class' => 'notification success'));
        return $this->redirect($this->referer());
    }

/**
 * getUsuariosEquipe method
 *
 * @param string $equipeId
 * @return array de usuarios
 */
    private function getUsuariosEquipe($equipeId){
        $options['fields']      = array('Usuario.login');
        $options['recursive']   = -1;
        $options['conditions']  = array('EquipeUsuario.equipe_id' => $equipeId);
        $options['joins'] = array(
            array(
                'table' => 'usuarios',
                'alias' => 'Usuario',
                'type' => 'inner',
                'conditions' => array('EquipeUsuario.usuario_id = Usuario.id')
            )
        );
        return $this->EquipeUsuario->find('list', $options);
    }

/**
 * loadVersionador method
 *
 * @param string $versionador ex: [svn|git]
 * @return void
 */
    private function loadVersionador($versionador){
        $versionador = ucfirst(strtolower($versionador));
        if (!class_exists($versionador)) {
            throw new Exception(__('Classe "' . $versionador . '" inexistente!'));
        }
        $this->versionador                = new $versionador();
        $this->versionador->path          = Configure::read('path.svn');
        $this->versionador->pathAuthUsers = Configure::read('path.svn.auth-users');
    }
}