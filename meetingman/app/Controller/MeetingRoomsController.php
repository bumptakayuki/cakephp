<?php
App::uses('AppController', 'Controller');
/**
 * 会議室コントローラクラス
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
 * @property MeetingRoom $MeetingRoom 会議室モデル
 */
class MeetingRoomsController extends AppController {

/**
 * コンポーネントの利用宣言（リスト４－２５(p.87)）
 * 
 * @var array components コントローラで利用するコンポーネント
 */
	var $components = array("MySpecial");
	
/**
 * 各アクションの前に呼ばれる処理
 * （リスト４－２３．コールバックメソッド(p.85)）
 */
	public function beforeFilter() {
		parent::beforeFilter();
	}
	
/**
 * 一覧表示アクション (p.77)
 *
 * @return void
 */
	public function index() {
		$this->MeetingRoom->recursive = 0;
		$this->set('meetingRooms', $this->paginate());
		
		// 独自メソッドの呼び出し。リスト４－２２(p.83)
		$this->_aaa();
		
		// コンポーネントのメソッドの呼び出し。リスト４－２５(p.87)
		$this->MySpecial->aaa();
	}

/**
 * １件表示アクション (p.78)
 *
 * @throws NotFoundException 指定IDのデータが存在しない場合の例外
 * @param string $id 表示対象レコードのID
 * @return void
 */
	public function view($id = null) {
		if (!$this->MeetingRoom->exists($id)) {
			throw new NotFoundException(__('Invalid meeting room'));
		}
		$options = array('conditions' => array('MeetingRoom.' . $this->MeetingRoom->primaryKey => $id));
		$this->set('meetingRoom', $this->MeetingRoom->find('first', $options));
	}

/**
 * 登録アクション (p.79)
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MeetingRoom->create();
			if ($this->MeetingRoom->save($this->request->data)) {
				$this->Session->setFlash(__('The meeting room has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meeting room could not be saved. Please, try again.'));
			}
		}
	}

/**
 * 変更アクション (p.80)
 *
 * @throws NotFoundException 指定IDのデータが存在しない場合の例外
 * @param string $id 表示対象レコードのID
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MeetingRoom->exists($id)) {
			throw new NotFoundException(__('Invalid meeting room'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MeetingRoom->save($this->request->data)) {
				$this->Session->setFlash(__('The meeting room has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meeting room could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MeetingRoom.' . $this->MeetingRoom->primaryKey => $id));
			$this->request->data = $this->MeetingRoom->find('first', $options);
		}
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
		$this->MeetingRoom->id = $id;
		if (!$this->MeetingRoom->exists()) {
			throw new NotFoundException(__('Invalid meeting room'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MeetingRoom->delete()) {
			$this->Session->setFlash(__('Meeting room deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Meeting room was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
/**
 * このコントローラでしか使わない独自メソッドの例。リスト４－２２(p.83)
 */	
	public function _aaa() {
//		debug("Hello! This is MeetingRoomsController->_aaa()");
	}
}
