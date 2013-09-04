<?php
App::uses('AppController', 'Controller');
/**
 * Repositorios Controller
 *
 * @property Repositorio $Repositorio
 */
class RepositoriosController extends AppController {

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
            throw new NotFoundException(__('Invalid repositorio'));
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
            if ($this->Repositorio->save($this->request->data)) {
                $this->Session->setFlash(__('The repositorio has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The repositorio could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->Repositorio->Usuario->find('list');
        $tipoRepositorios = $this->Repositorio->TipoRepositorio->find('list');
        $this->set(compact('usuarios', 'tipoRepositorios'));
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
            throw new NotFoundException(__('Invalid repositorio'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Repositorio->save($this->request->data)) {
                $this->Session->setFlash(__('The repositorio has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The repositorio could not be saved. Please, try again.'));
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
        if (!$this->Repositorio->exists()) {
            throw new NotFoundException(__('Invalid repositorio'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Repositorio->delete()) {
            $this->Session->setFlash(__('The repositorio has been deleted.'));
        } else {
            $this->Session->setFlash(__('The repositorio could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }}
