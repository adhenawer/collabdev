<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'php-version-control/autoload');
/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 */
class UsuariosController extends AppController {

/**
 * index dashboard
 *
 * @return void
 */
    public function dashboard(){}

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Usuario->recursive = 0;
        $this->set('usuarios', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->Usuario->exists($id)) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        $options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
        $this->set('usuario', $this->Usuario->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash(__('Registro salvo com sucesso.'), 'default', array('class' => 'notification success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Problemas ao salvar registro. Por favor, tente novamente.'));
            }
        }
        $grupos = $this->Usuario->Grupo->find('list', array('conditions' => array('Grupo.id >=' => $this->Session->read('Auth.User.Grupo.id'))));
        $this->set(compact('grupos'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        if (!$this->Usuario->exists($id)) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash(__('Registro salvo com sucesso.'), 'default', array('class' => 'notification success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Problemas ao salvar registro. Por favor, tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
            $this->request->data = $this->Usuario->find('first', $options);
        }
        $grupos = $this->Usuario->Grupo->find('list');
        $this->set(compact('grupos'));
    }

/**
 * conta method
 *
 * @return void
 */
    public function conta(){
       $this->edit($this->Session->read('Auth.User.id'));
       $this->render('edit');
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->Usuario->id = $id;
        $this->Usuario->recursive = -1;
        $usuario = $this->Usuario->findById($id);
        if (!$this->Usuario->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Usuario->delete()) {
            $svn = new Svn();
            $svn->path = Configure::read('path.svn');
            $svn->pathAuthUsers = Configure::read('path.svn.auth-users');
            $svn->deleteUser($usuario['Usuario']['login']);
            $this->Session->setFlash(__('Registro deletado com sucesso.'), 'default', array('class' => 'notification success'));
        } else {
            $this->Session->setFlash(__('Problemas ao deletar registro. Por favor, tente novamente.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Usuário ou senha incorreto.'));
        }
        if ($this->Session->read('Auth.User')) {
            $this->Session->setFlash('Você já está logado!');
            return $this->redirect('/');
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function alterarSenha(){
        if ($this->request->is('post')) {
            $this->Usuario->id = $this->Session->read('Auth.User.id');
            $this->request->data['Usuario']['id'] = $this->Usuario->id;
            if($this->Usuario->save($this->data)){
                $this->Session->setFlash(__('Senha alterada com sucesso.'), 'default', array('class' => 'notification success'));
            }else
                $this->Session->setFlash(__('Problemas ao alterar senha, verifique abaixo.'), 'default', array('class' => 'notification form-error'));
        }
    }

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('logout');
    }
}
