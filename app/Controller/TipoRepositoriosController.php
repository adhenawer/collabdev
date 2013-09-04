<?php
App::uses('AppController', 'Controller');
/**
 * TipoRepositorios Controller
 *
 * @property TipoRepositorio $TipoRepositorio
 */
class TipoRepositoriosController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->TipoRepositorio->recursive = 0;
        $this->set('tipoRepositorios', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->TipoRepositorio->exists($id)) {
            throw new NotFoundException(__('Tipo de repositorio inválido'));
        }
        $options = array('conditions' => array('TipoRepositorio.' . $this->TipoRepositorio->primaryKey => $id));
        $this->set('tipoRepositorio', $this->TipoRepositorio->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->TipoRepositorio->create();
            if ($this->TipoRepositorio->save($this->request->data)) {
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
        if (!$this->TipoRepositorio->exists($id)) {
            throw new NotFoundException(__('Tipo de repositorio inválido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->TipoRepositorio->save($this->request->data)) {
                $this->Session->setFlash(__('Registro salvo com sucesso.'), 'default', array('class' => 'notification success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Problemas ao salvar registro. Por favor, tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('TipoRepositorio.' . $this->TipoRepositorio->primaryKey => $id));
            $this->request->data = $this->TipoRepositorio->find('first', $options);
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
        $this->TipoRepositorio->id = $id;
        if (!$this->TipoRepositorio->exists()) {
            throw new NotFoundException(__('Tipo de repositorio inválido'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->TipoRepositorio->delete()) {
            $this->Session->setFlash(__('Registro deletado com sucesso.'), 'default', array('class' => 'notification success'));
        } else {
            $this->Session->setFlash(__('Problemas ao deletar registro. Por favor, tente novamente.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
