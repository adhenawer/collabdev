<?php
App::uses('TarefaComentario', 'Model');

/**
 * TarefaComentario Test Case
 *
 */
class TarefaComentarioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tarefa_comentario',
		'app.tarefa',
		'app.repositorio',
		'app.usuario',
		'app.grupo',
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
		$this->TarefaComentario = ClassRegistry::init('TarefaComentario');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TarefaComentario);

		parent::tearDown();
	}

}
