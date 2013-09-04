<?php
App::uses('AppController', 'Controller');
/**
 * Tarefas Controller
 *
 * @property Tarefa $Tarefa
 */
class TarefasController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Tarefa->recursive = 0;
        $this->set('tarefas', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->Tarefa->exists($id)) {
            throw new NotFoundException(__('Invalid tarefa'));
        }
        $options = array('conditions' => array('Tarefa.' . $this->Tarefa->primaryKey => $id));
        $this->set('tarefa', $this->Tarefa->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Tarefa->create();
            if ($this->Tarefa->save($this->request->data)) {
                $this->Session->setFlash(__('The tarefa has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tarefa could not be saved. Please, try again.'));
            }
        }
        $repositorios = $this->Tarefa->Repositorio->find('list');
        $statuses = $this->Tarefa->Status->find('list');
        $usuarios = $this->Tarefa->Usuario->find('list');
        $this->set(compact('repositorios', 'statuses', 'usuarios'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        if (!$this->Tarefa->exists($id)) {
            throw new NotFoundException(__('Invalid tarefa'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Tarefa->save($this->request->data)) {
                $this->Session->setFlash(__('The tarefa has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tarefa could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Tarefa.' . $this->Tarefa->primaryKey => $id));
            $this->request->data = $this->Tarefa->find('first', $options);
        }
        $repositorios = $this->Tarefa->Repositorio->find('list');
        $statuses = $this->Tarefa->Status->find('list');
        $usuarios = $this->Tarefa->Usuario->find('list');
        $this->set(compact('repositorios', 'statuses', 'usuarios'));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->Tarefa->id = $id;
        if (!$this->Tarefa->exists()) {
            throw new NotFoundException(__('Invalid tarefa'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Tarefa->delete()) {
            $this->Session->setFlash(__('The tarefa has been deleted.'));
        } else {
            $this->Session->setFlash(__('The tarefa could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }}
