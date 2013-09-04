<?php
App::uses('Tarefa', 'Model');

/**
 * Tarefa Test Case
 *
 */
class TarefaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tarefa',
		'app.repositorio',
		'app.usuario',
		'app.grupo',
		'app.tarefa_comentario',
		'app.tipo_repositorio',
		'app.status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tarefa = ClassRegistry::init('Tarefa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tarefa);

		parent::tearDown();
	}

}
