<?php
App::uses('TipoRepositorio', 'Model');

/**
 * TipoRepositorio Test Case
 *
 */
class TipoRepositorioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipo_repositorio',
		'app.repositorio'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TipoRepositorio = ClassRegistry::init('TipoRepositorio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TipoRepositorio);

		parent::tearDown();
	}

}
