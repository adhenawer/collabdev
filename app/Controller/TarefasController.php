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
            throw new NotFoundException(__('Tarefa inválida'));
        }
        $options = array('conditions' => array('Tarefa.' . $this->Tarefa->primaryKey => $id), 'recursive' => 0);
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
            $this->request->data['Tarefa']['usuario_id'] = $this->Session->read('Auth.User.id');
            if ($this->Tarefa->save($this->request->data)) {
                $this->Session->setFlash(__('Registro salvo com sucesso.'), 'default', array('class' => 'notification success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Problemas ao salvar registro. Por favor, tente novamente.'));
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
            throw new NotFoundException(__('Tarefa inválida'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Tarefa->save($this->request->data)) {
                $this->Session->setFlash(__('Registro salvo com sucesso.'), 'default', array('class' => 'notification success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Problemas ao salvar registro. Por favor, tente novamente.'));
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
            throw new NotFoundException(__('Tarefa inválida'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Tarefa->delete()) {
            $this->Session->setFlash(__('Registro deletado com sucesso.'), 'default', array('class' => 'notification success'));
        } else {
            $this->Session->setFlash(__('Problemas ao deletar registro. Por favor, tente novamente.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
