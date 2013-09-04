<?php
App::uses('EquipeUsuario', 'Model');

/**
 * EquipeUsuario Test Case
 *
 */
class EquipeUsuarioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.equipe_usuario',
		'app.equipe',
		'app.equipe_repositorio',
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
		$this->EquipeUsuario = ClassRegistry::init('EquipeUsuario');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EquipeUsuario);

		parent::tearDown();
	}

}
