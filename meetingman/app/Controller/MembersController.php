<?php
App::uses('AppController', 'Controller');
/**
 * メンバーコントローラクラス
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
 * @property Member $Member メンバーモデル
 */
class MembersController extends AppController {

/**
 * 一覧表示アクション (p.77)
 *
 * @return void
 */
	public function index() {
		$this->Member->recursive = 0;
		$this->set('members', $this->paginate());
	}

/**
 * １件表示アクション (p.78)
 *
 * @throws NotFoundException 指定IDのデータが存在しない場合の例外
 * @param string $id 表示対象レコードのID
 * @return void
 */
	public function view($id = null) {
		if (!$this->Member->exists($id)) {
			throw new NotFoundException(__('Invalid member'));
		}
		$options = array('conditions' => array('Member.' . $this->Member->primaryKey => $id));
		$this->set('member', $this->Member->find('first', $options));
	}

/**
 * 登録アクション (p.79)
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Member->create();
			if ($this->Member->save($this->request->data)) {
				$this->Session->setFlash(__('The member has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The member could not be saved. Please, try again.'));
			}
		}
		$meetings = $this->Member->Meeting->find('list');
		$this->set(compact('meetings'));
	}

/**
 * 変更アクション (p.80)
 *
 * @throws NotFoundException 指定IDのデータが存在しない場合の例外
 * @param string $id 表示対象レコードのID
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Member->exists($id)) {
			throw new NotFoundException(__('Invalid member'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Member->save($this->request->data)) {
				$this->Session->setFlash(__('The member has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The member could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Member.' . $this->Member->primaryKey => $id));
			$this->request->data = $this->Member->find('first', $options);
		}
		$meetings = $this->Member->Meeting->find('list');
		$this->set(compact('meetings'));
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
		$this->Member->id = $id;
		if (!$this->Member->exists()) {
			throw new NotFoundException(__('Invalid member'));
		}
		$this->request->onlyAllow('post', 'delete');
		
//		Bakeで自動生成した物理削除ロジック
		if ($this->Member->delete()) {

		// Behaviorの論理削除メソッドの呼び出し　（リスト５－１６）(p.136)
//		if ($this->Member->logicalDelete()) {
			
		// delete()メソッド拡張によるBehaviorの論理削除メソッドの呼び出し　(p.138)
//		if ($this->Member->delete($id, array('logocalDelete' => true))) {
			
			$this->Session->setFlash(__('Member deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Member was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
