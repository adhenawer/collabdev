<?php
App::uses('AppModel', 'Model');
/**
 * Status Model
 *
 * @property Tarefa $Tarefa
 */
class Status extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
    public $useTable = 'status';

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
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        'Tarefa' => array(
            'className' => 'Tarefa',
            'foreignKey' => 'status_id',
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

}
