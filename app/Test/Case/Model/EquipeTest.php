<?php
App::uses('Equipe', 'Model');

/**
 * Equipe Test Case
 *
 */
class EquipeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.equipe',
		'app.equipe_repositorio',
		'app.equipe_usuario'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Equipe = ClassRegistry::init('Equipe');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Equipe);

		parent::tearDown();
	}

}
