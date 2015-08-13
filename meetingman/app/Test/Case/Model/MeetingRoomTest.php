<?php
App::uses('MeetingRoom', 'Model');

/**
 * リスト７－２．会議室モデルのテストケース (p.175)
 */
class MeetingRoomTest extends CakeTestCase {

/**
 * 利用するFixtureクラス
 *
 * @var array
 */
	public $fixtures = array(
		'app.meeting_room',
		'app.meeting'
	);

/**
 * 各テストメソッド実行前に呼び出される初期処理
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MeetingRoom = ClassRegistry::init('MeetingRoom');
	}

/**
 * 各テストメソッド実行後に呼び出される後始末処理
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MeetingRoom);

		parent::tearDown();
	}

/**
 * 登録機能をテストする。
 * リスト７－３ (p.177)
 */	
	function testSave() {
		$data = array(
			'MeetingRoom' => array(
				'name' => '大部屋',
			)
		);
		// データ登録
		$this->MeetingRoom->create();
		$result = $this->MeetingRoom->save($data);
		
		// テストケース１： 更新処理の結果がfalseでないこと
		$this->assertNotEqual($result, false, "更新エラーです");
debug($result);

		// テストケース２： 登録後、データが２件に増えていること
		$result = $this->MeetingRoom->find('all');
		$this->assertEqual(count($result), 2, "データが".count($result)."あります");
debug($result);
	}
	
}
