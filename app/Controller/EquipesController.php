<?php

App::uses('AppController', 'Controller');
/**
 * Equipes Controller
 *
 * @property Equipe $Equipe
 */
class EquipesController extends AppController {

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
}
