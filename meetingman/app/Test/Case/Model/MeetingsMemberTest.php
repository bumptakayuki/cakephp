<?php
App::uses('MeetingsMember', 'Model');

/**
 * 中間テーブル（会議⇔メンバー）テストケース (p.175)
 */
class MeetingsMemberTest extends CakeTestCase {

/**
 * 利用するFixtureクラス
 *
 * @var array
 */
	public $fixtures = array(
		'app.meetings_member'
	);

/**
 * 各テストメソッド実行前に呼び出される初期処理
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MeetingsMember = ClassRegistry::init('MeetingsMember');
	}

/**
 * 各テストメソッド実行後に呼び出される後始末処理
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MeetingsMember);

		parent::tearDown();
	}

}
