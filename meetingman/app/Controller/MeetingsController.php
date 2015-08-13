<?php
App::uses('AppController', 'Controller');
/**
 * 会議コントローラクラス
 * 
 * 第３章(p.46)で自動生成したクラスファイルをカスタマイズしています。
 * クラスの継承構造については p.60 を、使用可能な主なメンバー変数に
 * ついては p.61 をご覧ください。
 * 
 * また、コントローラでできることについては、
 * 　・ブラウザから送信された情報を受け取る	p.62
 * 　・モデルクラスの操作 ～検索～				p.64
 * 　・モデルクラスの操作 ～更新～				p.65
 * 　・画面にデータを引き継ぐ					p.67
 * 　・リダイレクトする						p.68
 * 　・セッションを操作する					p.70
 * 　・Cookieファイルを操作する				p.73
 * 　・ファイルをダウンロードする				p.75
 * をご覧ください。
 *
 * @property Meeting $Meeting 会議モデル
 */
class MeetingsController extends AppController {

	// 利用ヘルパーの宣言
	var $helpers = array(
		// 自作ヘルパーの利用宣言 リスト６－１５(p.169)
		'My',
		
		// 自作ヘルパーを「FormHelper」として宣言 リスト６－１８(p.170)
		'Form' => array('className' => 'My'),
	);

/**
 * 一覧表示アクション (p.77)
 *
 * @return void
 */
	public function index() {

		// 「今日分だけ」パラメータがセットされていれば条件追加
		// リスト６－１１ (p.164)
		$scope = array();
		if (isset($this->request->params['named']['today'])
		 && $this->request->params['named']['today'] == true) {
			$today_str = date('Y-m-d');		// 今日の日付
			$scope = array('start_time LIKE '=> $today_str . ' %');
		}
debug($scope);

		$this->Meeting->recursive = 0;
		$this->set('meetings', $this->paginate(null, $scope));
	}

/**
 * １件表示アクション (p.78)
 *
 * @throws NotFoundException 指定IDのデータが存在しない場合の例外
 * @param string $id 表示対象レコードのID
 * @return void
 */
	public function view($id = null) {
		if (!$this->Meeting->exists($id)) {
			throw new NotFoundException(__('Invalid meeting'));
		}
		$options = array('conditions' => array('Meeting.' . $this->Meeting->primaryKey => $id));
		// リスト６－１(p.143) 検索結果を画面に引き渡し
		$this->set('meeting', $this->Meeting->find('first', $options));
	}

/**
 * 登録アクション (p.79)
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Meeting->create();
			if ($this->Meeting->save($this->request->data)) {
				$this->Session->setFlash(__('The meeting has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meeting could not be saved. Please, try again.'));
			}
		}
		$meetingRooms = $this->Meeting->MeetingRoom->find('list');
		$members = $this->Meeting->Member->find('list');
		$this->set(compact('meetingRooms', 'members'));
	}

/**
 * 変更アクション (p.80)
 *
 * @throws NotFoundException 指定IDのデータが存在しない場合の例外
 * @param string $id 表示対象レコードのID
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Meeting->exists($id)) {
			throw new NotFoundException(__('Invalid meeting'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Meeting->save($this->request->data)) {
				// 更新成功の場合
				$this->Session->setFlash(__('The meeting has been saved'));
				// 更新成功なのでリダイレクト
				$this->redirect(array('action' => 'index'));
			} else {
				// 更新失敗・入力チェックエラーの場合
				$this->Session->setFlash(__('The meeting could not be saved. Please, try again.'));
			}
		} else {
			// 画面初期表示の場合
			$options = array('conditions' => array('Meeting.' . $this->Meeting->primaryKey => $id));
			// FORMの初期データをVIEWに引き継ぎ。リスト６－３ (p.145)
			$this->request->data = $this->Meeting->find('first', $options);
		}
		// 画面初期表示orエラーによる再表示の場合に、関連データを検索する。
		$meetingRooms = $this->Meeting->MeetingRoom->find('list');
		$members = $this->Meeting->Member->find('list');
		$this->set(compact('meetingRooms', 'members'));
	}

/**
 * 削除アクション (p.82)
 *
 * @throws NotFoundException 指定IDのデータが存在しない場合の例外
 * @throws MethodNotAllowedException HttpリクエストをPOST/DELETE以外で送られた場合の例外
 * @param string $id 表示対象レコードのID
 * @return void
 */
	public function delete($id = null) {
		$this->Meeting->id = $id;
		if (!$this->Meeting->exists()) {
			throw new NotFoundException(__('Invalid meeting'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Meeting->delete()) {
			$this->Session->setFlash(__('Meeting deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Meeting was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
