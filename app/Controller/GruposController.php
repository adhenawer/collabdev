<?php
App::uses('AppController', 'Controller');
/**
 * Grupos Controller
 *
 * @property Grupo $Grupo
 */
class GruposController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Grupo->recursive = 0;
        $this->set('grupos', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->Grupo->exists($id)) {
            throw new NotFoundException(__('Invalid grupo'));
        }
        $options = array('conditions' => array('Grupo.' . $this->Grupo->primaryKey => $id));
        $this->set('grupo', $this->Grupo->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Grupo->create();
            if ($this->Grupo->save($this->request->data)) {
                $this->Session->setFlash(__('The grupo has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The grupo could not be saved. Please, try again.'));
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
        if (!$this->Grupo->exists($id)) {
            throw new NotFoundException(__('Invalid grupo'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Grupo->save($this->request->data)) {
                $this->Session->setFlash(__('The grupo has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The grupo could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Grupo.' . $this->Grupo->primaryKey => $id));
            $this->request->data = $this->Grupo->find('first', $options);
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
        $this->Grupo->id = $id;
        if (!$this->Grupo->exists()) {
            throw new NotFoundException(__('Invalid grupo'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Grupo->delete()) {
            $this->Session->setFlash(__('The grupo has been deleted.'));
        } else {
            $this->Session->setFlash(__('The grupo could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
