<?php
App::uses('Member', 'Model');

/**
 * メンバーモデルのテストケース (p.175)
 */
class MemberTest extends CakeTestCase {

/**
 * 利用するFixtureクラス
 *
 * @var array
 */
	public $fixtures = array(
		'app.member',
		'app.meeting',
		'app.meeting_room',
		'app.meetings_member'
	);

/**
 * 各テストメソッド実行前に呼び出される初期処理
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Member = ClassRegistry::init('Member');
	}

/**
 * 各テストメソッド実行後に呼び出される後始末処理
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Member);

		parent::tearDown();
	}

}
