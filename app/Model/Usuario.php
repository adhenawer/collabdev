<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * Usuario Model
 *
 * @property Grupo $Grupo
 * @property Repositorio $Repositorio
 * @property TarefaComentario $TarefaComentario
 * @property Tarefa $Tarefa
 */
class Usuario extends AppModel {

    public $actsAs = array('Acl' => array('type' => 'requester'));

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'login';

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'nome' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'notempty' => array(
                'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'login' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'maxlength' => array(
                'rule' => array('maxlength', 45),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'senha' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'grupo_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'password' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Campo de preenchimento obrigatório.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        ),
        'passwordAgain' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Campo de preenchimento obrigatório.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'checkPassword' => array(
                'rule' => array('checkPassword'),
                'message' => 'Senhas diferentes.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        ),
        'oldPassword' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Campo de preenchimento obrigatório.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'OldPassword' => array(
                'rule' => array('OldPassword'),
                'message' => 'Senha inválida.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
        'Grupo' => array(
            'className' => 'Grupo',
            'foreignKey' => 'grupo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

/**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        'Repositorio' => array(
            'className' => 'Repositorio',
            'foreignKey' => 'usuario_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'TarefaComentario' => array(
            'className' => 'TarefaComentario',
            'foreignKey' => 'usuario_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Tarefa' => array(
            'className' => 'Tarefa',
            'foreignKey' => 'usuario_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'EquipeUsuario' => array(
            'className' => 'EquipeUsuario',
            'foreignKey' => 'usuario_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    public function beforeSave($options = array()) {
        if(isset($this->data['Usuario']['senha']) && !empty($this->data['Usuario']['senha'])){
            $this->data['Usuario']['senha'] = AuthComponent::password($this->data['Usuario']['senha']);
        }
        return true;
    }

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['Usuario']['grupo_id'])) {
            $groupId = $this->data['Usuario']['grupo_id'];
        } else {
            $groupId = $this->field('grupo_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Grupo' => array('id' => $groupId));
        }
    }

    public function bindNode($user) {
        return array('model' => 'Grupo', 'foreign_key' => $user['Usuario']['grupo_id']);
    }

    public function OldPassword($check){
        $oldPass = $this->find('count', array(
            'conditions' => array('Usuario.id' => $this->data['Usuario']['id'], 'Usuario.senha' => AuthComponent::password($check['oldPassword']))
        ));
        if($oldPass)
            return true;
        else
            return false;
    }

    public function checkPassword($check){
        if($check['passwordAgain'] == $this->data['Usuario']['senha'])
            return true;
        else
            return false;
    }
}
