<?php
App::uses('AppController', 'Controller');
/**
 * Acl Controller
 *
 * @property Acl $Acl
 */
class AclController extends AppController {

    public $uses = array('Usuario');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('initDB'); // We can remove this line after we're finished
    }

    public function initDB() {
        $group = $this->Usuario->Grupo;
        //Administrador
        $group->id = 1;
        $this->Acl->allow($group, 'controllers');

        //Gerenciador
        $group->id = 2;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Usuarios/index');
        $this->Acl->allow($group, 'controllers/Usuarios/add');
        $this->Acl->allow($group, 'controllers/Usuarios/edit');
        $this->Acl->allow($group, 'controllers/Usuarios/view');
        $this->Acl->allow($group, 'controllers/Usuarios/delete');

        $this->Acl->allow($group, 'controllers/Repositorios/index');
        $this->Acl->allow($group, 'controllers/Repositorios/add');
        $this->Acl->allow($group, 'controllers/Repositorios/edit');
        $this->Acl->allow($group, 'controllers/Repositorios/view');
        $this->Acl->allow($group, 'controllers/Repositorios/delete');

        $this->Acl->allow($group, 'controllers/Equipes/index');
        $this->Acl->allow($group, 'controllers/Equipes/add');
        $this->Acl->allow($group, 'controllers/Equipes/edit');
        $this->Acl->allow($group, 'controllers/Equipes/view');
        $this->Acl->allow($group, 'controllers/Equipes/delete');

        $this->Acl->allow($group, 'controllers/Tarefas/index');
        $this->Acl->allow($group, 'controllers/Tarefas/add');
        $this->Acl->allow($group, 'controllers/Tarefas/edit');
        $this->Acl->allow($group, 'controllers/Tarefas/view');
        $this->Acl->allow($group, 'controllers/Tarefas/delete');

        //Colaborador
        $group->id = 3;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Usuarios/edit');

        $this->Acl->allow($group, 'controllers/Tarefas/index');
        //$this->Acl->allow($group, 'controllers/Tarefas/add');
        //$this->Acl->allow($group, 'controllers/Tarefas/edit');
        $this->Acl->allow($group, 'controllers/Tarefas/view');
        //$this->Acl->allow($group, 'controllers/Tarefas/delete');

        //we add an exit to avoid an ugly "missing views" error message
        echo "all done";
        exit;
    }

}