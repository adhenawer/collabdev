<?php
App::uses('EquipeRepositorio', 'Model');

/**
 * EquipeRepositorio Test Case
 *
 */
class EquipeRepositorioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.equipe_repositorio',
		'app.equipe',
		'app.equipe_usuario',
		'app.usuario',
		'app.grupo',
		'app.repositorio',
		'app.tarefa_comentario',
		'app.tarefa'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EquipeRepositorio = ClassRegistry::init('EquipeRepositorio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EquipeRepositorio);

		parent::tearDown();
	}

}
