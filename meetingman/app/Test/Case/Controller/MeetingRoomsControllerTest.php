<?php
App::uses('MeetingRoomsController', 'Controller');

/**
 * リスト７－４．会議室コントローラのテストケース (p.178)
 */
class MeetingRoomsControllerTest extends ControllerTestCase {

/**
 * 利用するFixtureクラス
 *
 * @var array
 */
	public $fixtures = array(
		'app.meeting_room',
		'app.meeting',
		'app.member',
		'app.meetings_member'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
	}

/**
 * 更新アクションのテストケース
 * リスト７－５ (p.180)
 *
 * @return void
 */
	public function testEdit() {

		/*
		 *  初期データの登録(Fixtureを使わない場合）
		 */
		App::uses('MeetingRoom', 'Model');
		$this->MeetingRoom = ClassRegistry::init('MeetingRoom');
		$data = array('MeetingRoom' =>array(
			'name' => '大部屋',
		));
		$this->MeetingRoom->create();
		$result = $this->MeetingRoom->save($data);
		$id = $result['MeetingRoom']['id'];
debug($id);
		
		/*
		 *  編集画面表示
		 */
		$this->testAction('/meeting_rooms/edit/'.$id, 
			array('method' => 'GET', 'return'=>'view'));

		// テストケース１： 正しいデータが検索できること
		$formData = $this->controller->request->data['MeetingRoom'];
		$this->assertEqual($id, $formData['id']);
		
		// テストケース２： 画面変数に何もset()されていないこと
		$this->assertEqual(array(), $this->vars);

		// テストケース３： 画面にデータが表示されていること
		$this->assertTextContains($formData['name'], $this->view);

		// テストケース４： 文字コードが正しくがセットされていること
		$this->assertTextContains('charset=utf-8', $this->contents);

		/*
		 *  更新
		 */
		$data = array('MeetingRoom' =>array(
			'id' => $id,
			'name' => '小部屋',
		));
		// 疑似リクエストを送信
		$this->testAction('/meeting_rooms/edit/'.$id, 
			array('method' => 'POST', 'return'=>'result', 'data'=>$data));

		// テストケース５： 会議室名が更新されていること
		$result = $this->MeetingRoom->read(null, $id);
debug($result);		
		$result = $result['MeetingRoom']['name'];
		$this->assertEqual($data['MeetingRoom']['name'], $result);
		
		// テストケース６： 一覧ページにリダイレクトすること
debug($this->headers);		
//debug($_SERVER);
//debug($this->controller->request);
		$this->assertEqual(
			'http://localhost/meetingman/meeting_rooms', // ご自身の環境に応じてURLを変更してください。
			$this->headers['Location']);

	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
	}

}
