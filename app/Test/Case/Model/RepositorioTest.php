<?php
App::uses('Repositorio', 'Model');

/**
 * Repositorio Test Case
 *
 */
class RepositorioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.repositorio',
		'app.usuario',
		'app.grupo',
		'app.tarefa_comentario',
		'app.tarefa',
		'app.tipo_repositorio'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Repositorio = ClassRegistry::init('Repositorio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Repositorio);

		parent::tearDown();
	}

}
