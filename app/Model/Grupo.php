<?php
App::uses('AppModel', 'Model');
/**
 * Grupo Model
 *
 * @property Usuario $Usuario
 */
class Grupo extends AppModel {

    public $actsAs = array('Acl' => array('type' => 'requester'));

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'nome';

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
            'maxlength' => array(
                'rule' => array('maxlength', 45),
                'message' => 'O máximo de caracteres permitidos são 45.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        'Usuario' => array(
            'className' => 'Usuario',
            'foreignKey' => 'grupo_id',
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

    public function parentNode() {
        return null;
    }
}
