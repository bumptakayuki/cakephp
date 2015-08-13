<?php
App::uses('Meeting', 'Model');

/**
 * 会議モデルのテストケース (p.175)
 */
class MeetingTest extends CakeTestCase {

/**
 * 利用するFixtureクラス
 *
 * @var array
 */
	public $fixtures = array(
		'app.meeting',
		'app.meeting_room',
		'app.member',
		'app.meetings_member'
	);

/**
 * 各テストメソッド実行前に呼び出される初期処理
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Meeting = ClassRegistry::init('Meeting');
	}

/**
 * 各テストメソッド実行後に呼び出される後始末処理
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Meeting);

		parent::tearDown();
	}

}
