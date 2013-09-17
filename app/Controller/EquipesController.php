<?php

App::uses('AppController', 'Controller');
/**
 * Equipes Controller
 *
 * @property Equipe $Equipe
 */
class EquipesController extends AppController {

    public $uses = array('Equipe','Usuario');

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Equipe->recursive = 0;
        $this->set('equipes', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->Equipe->exists($id)) {
            throw new NotFoundException(__('Equipe inválida'));
        }
        $options = array('conditions' => array('Equipe.' . $this->Equipe->primaryKey => $id), 'recursive' => -1);
        $this->set('equipe', $this->Equipe->find('first', $options));

        $usuarios = $this->Usuario->find('list');
        array_unshift($usuarios, null);
        $this->set('usuarios', $usuarios);

        $repositorios = $this->Usuario->Repositorio->find('list');
        array_unshift($repositorios, null);
        $this->set('repositorios', $repositorios);

        $this->set('membros', $this->getMembrosEquipe($id));
        $this->set('repositoriosEquipe', $this->getRepositoriosEquipe($id));
    }

/**
 * getMembrosEquipe method
 *
 * @param string $equipeId
 * @return array contendo dados dos usuários
 */
    private function getMembrosEquipe($equipeId){
        $options['fields'] = array('Usuario.id', 'Usuario.login');
        $options['conditions'] = array('EquipeUsuario.equipe_id' => $equipeId);
        return $this->Equipe->EquipeUsuario->find('all', $options);
    }

/**
 * getRepositoriosEquipe method
 *
 * @param string $equipeId
 * @return array contendo dados dos repositórios
 */
    private function getRepositoriosEquipe($equipeId){
        $options['fields'] = array('Repositorio.id', 'Repositorio.nome');
        $options['conditions'] = array('EquipeRepositorio.equipe_id' => $equipeId);
        return $this->Equipe->EquipeRepositorio->find('all', $options);
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Equipe->create();
            if ($this->Equipe->save($this->request->data)) {
                $this->Session->setFlash(__('Registro salvo com sucesso.'), 'default', array('class' => 'notification success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Problemas ao salvar registro. Por favor, tente novamente.'));
            }
        }
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        if (!$this->Equipe->exists($id)) {
            throw new NotFoundException(__('Equipe inválida'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Equipe->save($this->request->data)) {
                $this->Session->setFlash(__('Registro salvo com sucesso.'), 'default', array('class' => 'notification success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Problemas ao salvar registro. Por favor, tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('Equipe.' . $this->Equipe->primaryKey => $id));
            $this->request->data = $this->Equipe->find('first', $options);
        }
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->Equipe->id = $id;
        if (!$this->Equipe->exists()) {
            throw new NotFoundException(__('Equipe inválida'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Equipe->delete()) {
            $this->Session->setFlash(__('Registro deletado com sucesso.'), 'default', array('class' => 'notification success'));
        } else {
            $this->Session->setFlash(__('Problemas ao deletar registro. Por favor, tente novamente.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

/**
 * relacionarUsuario method
 *
 * @throws NotFoundException
 * @param string $equipeId
 * @return boolean
 */
    public function relacionarUsuario($equipeId){
        if (!$this->Equipe->exists($equipeId)) {
            throw new NotFoundException(__('Equipe inválida'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data['EquipeUsuario'] = array(
                'equipe_id'  => $equipeId,
                'usuario_id' => $this->request->data['Equipe']['usuario_id']
            );
            if ($this->Equipe->EquipeUsuario->save($data)) {
                $this->Session->setFlash(__('Usuário adicionado a equipe com sucesso.'), 'default', array('class' => 'notification success'));
            } else {
                $this->Session->setFlash(__('Problemas ao adicionar usuário. Por favor, tente novamente.'));
            }
        }
        return $this->redirect($this->referer());
    }

/**
 * removerUsuario method
 *
 * @param string $equipeId
 * @param string $usuarioId
 * @return void
 */
    public function removerUsuario($equipeId = null, $usuarioId = null){
        if ($equipeId != null && $usuarioId != null) {
            $conditions = array(
                'EquipeUsuario.equipe_id'  => $equipeId,
                'EquipeUsuario.usuario_id' => $usuarioId
            );
            if ($this->Equipe->EquipeUsuario->deleteAll($conditions)) {
                $this->Session->setFlash(__('Usuário removido da equipe com sucesso.'), 'default', array('class' => 'notification success'));
            } else {
                $this->Session->setFlash(__('Problemas ao remover usuário. Por favor, tente novamente.'));
            }
        } else {
            $this->Session->setFlash(__('Parâmetros inválidos. Por favor, tente novamente.'));
        }
        return $this->redirect($this->referer());
    }

/**
 * relacionarRepositorio method
 *
 * @throws NotFoundException
 * @param string $equipeId
 * @return boolean
 */
    public function relacionarRepositorio($equipeId){
        if (!$this->Equipe->exists($equipeId)) {
            throw new NotFoundException(__('Equipe inválida'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data['EquipeRepositorio'] = array(
                'equipe_id'  => $equipeId,
                'repositorio_id' => $this->request->data['Equipe']['repositorio_id']
            );
            if ($this->Equipe->EquipeRepositorio->save($data)) {
                $this->Session->setFlash(__('Repositório atrelado à equipe com sucesso.'), 'default', array('class' => 'notification success'));
            } else {
                $this->Session->setFlash(__('Problemas ao atrelar repositório. Por favor, tente novamente.'));
            }
        }
        return $this->redirect($this->referer());
    }

/**
 * removerRepositorio method
 *
 * @param string $equipeId
 * @param string $repositorioId
 * @return void
 */
    public function removerRepositorio($equipeId = null, $repositorioId = null){
        if ($equipeId != null && $repositorioId != null) {
            $conditions = array(
                'EquipeRepositorio.equipe_id'  => $equipeId,
                'EquipeRepositorio.repositorio_id' => $repositorioId
            );
            if ($this->Equipe->EquipeRepositorio->deleteAll($conditions)) {
                $this->Session->setFlash(__('Repositório removido da equipe com sucesso.'), 'default', array('class' => 'notification success'));
            } else {
                $this->Session->setFlash(__('Problemas ao remover repositório. Por favor, tente novamente.'));
            }
        } else {
            $this->Session->setFlash(__('Parâmetros inválidos. Por favor, tente novamente.'));
        }
        return $this->redirect($this->referer());
    }
}
