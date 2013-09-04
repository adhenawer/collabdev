<?php
App::uses('AppModel', 'Model');
/**
 * EquipeRepositorio Model
 *
 * @property Equipe $Equipe
 * @property Repositorio $Repositorio
 */
class EquipeRepositorio extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'equipe_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
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
        'repositorio_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
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
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
        'Equipe' => array(
            'className' => 'Equipe',
            'foreignKey' => 'equipe_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Repositorio' => array(
            'className' => 'Repositorio',
            'foreignKey' => 'repositorio_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}
