<?php
App::uses('AppController', 'Controller');
/**
 * Statuses Controller
 *
 * @property Status $Status
 */
class StatusesController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Status->recursive = 0;
        $this->set('statuses', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->Status->exists($id)) {
            throw new NotFoundException(__('Status inválido'));
        }
        $options = array('conditions' => array('Status.' . $this->Status->primaryKey => $id));
        $this->set('status', $this->Status->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Status->create();
            if ($this->Status->save($this->request->data)) {
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
        if (!$this->Status->exists($id)) {
            throw new NotFoundException(__('Status inválido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Status->save($this->request->data)) {
                $this->Session->setFlash(__('Registro salvo com sucesso.'), 'default', array('class' => 'notification success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Problemas ao salvar registro. Por favor, tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('Status.' . $this->Status->primaryKey => $id));
            $this->request->data = $this->Status->find('first', $options);
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
        $this->Status->id = $id;
        if (!$this->Status->exists()) {
            throw new NotFoundException(__('Status inválido'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Status->delete()) {
            $this->Session->setFlash(__('Registro deletado com sucesso.'), 'default', array('class' => 'notification success'));
        } else {
            $this->Session->setFlash(__('Problemas ao deletar registro. Por favor, tente novamente.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
