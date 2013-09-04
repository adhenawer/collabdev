<?php
/**
 * EquipeRepositorioFixture
 *
 */
class EquipeRepositorioFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'equipe_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'repositorio_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_times_has_repositorios_times1_idx' => array('column' => 'equipe_id', 'unique' => 0),
			'fk_equipe_repositorios_repositorios1_idx' => array('column' => 'repositorio_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'equipe_id' => 1,
			'repositorio_id' => 1,
			'created' => '2013-09-01 05:18:59',
			'modified' => '2013-09-01 05:18:59'
		),
	);

}
