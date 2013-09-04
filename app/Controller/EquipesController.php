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
            throw new NotFoundException(__('Invalid equipe'));
        }
        $options = array('conditions' => array('Equipe.' . $this->Equipe->primaryKey => $id));
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
                $this->Session->setFlash(__('The equipe has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The equipe could not be saved. Please, try again.'));
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
            throw new NotFoundException(__('Invalid equipe'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Equipe->save($this->request->data)) {
                $this->Session->setFlash(__('The equipe has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The equipe could not be saved. Please, try again.'));
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
            throw new NotFoundException(__('Invalid equipe'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Equipe->delete()) {
            $this->Session->setFlash(__('The equipe has been deleted.'));
        } else {
            $this->Session->setFlash(__('The equipe could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }}
