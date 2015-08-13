<?php
App::uses('AppModel', 'Model');
/**
 * 会議モデルクラス
 * 
 * 第３章(p.41)で自動生成したクラスファイルをカスタマイズしています。
 * クラスの継承構造については p.91 を、使用可能な主なメンバー変数に
 * ついては p.92 をご覧ください。
 * 
 * また、モデルでできることについては、
 * ・データアクセス（１テーブル検索）
 * 　　・IDで単純検索　～ read() ～				p.94
 * 　　・自在な検索　～ find() ～					p.96
 * 　　・レコード絞り込み条件の設定				p.98
 * 　　・その他の検索条件の設定					p.100
 * 　　・検索処理のコールバックメソッド			p.102
 * ・データアクセス（１テーブル更新）
 * 　　・登録処理　～ create() & save() ～		p.105
 * 　　・更新処理　～ save() ～					p.108
 * 　　・複数レコードの更新処理　～ updateAll() ～	p.109
 * 　　・削除処理　～ delete() ～					p.110
 * 　　・一括削除処理　～ deleteAll() ～			p.110
 * 　　・更新処理のコールバックメソッド			p.111
 * ・データアクセス（複数テーブルの連携）
 * 　　・ｎ：１の検索　～ belongsTo ～			p.115
 * 　　・１：ｎの検索　～ hasMany ～				p.117
 * 　　・ｎ：ｎの検索　～ hasAndBelongsToMany ～	p.121
 * 　　・番外編：「関連テーブル」ってどこまで？		p.125
 * をご覧ください。
 *
 * @property MeetingRoom $MeetingRoom	会議室モデル
 * @property Member $Member			メンバーモデル
 */
class Meeting extends AppModel {

/**
 * Display field
 *
 * @var string $displayField 名称として画面表示する項目
 */
	public $displayField = 'title';

/**
 * 入力チェックルール (p.127)
 *
 * @var array $validate 入力チェック条件を定義する配列
 */
	public $validate = array(
		'start_time' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			// 独自ルールの定義「会議室が予約済みではない事」
			// リスト５－１３ (p.130)
			'isDoubleBooking' => array(
				'rule' => array('isDoubleBooking'),
				'message' => '予約済みです',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'end_time' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'meeting_room_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxlength' => array(
				'rule' => array('maxlength', 255),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'gidai' => array(
			'maxlength' => array(
				'rule' => array('maxlength', 1024),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'gijiroku' => array(
			'maxlength' => array(
				'rule' => array('maxlength', 10240),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo (n:1)連係 (p.115)
 *
 * @var array
 */
	public $belongsTo = array(
		'MeetingRoom' => array(
			'className' => 'MeetingRoom',
			'foreignKey' => 'meeting_room_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany (n:n)連係 (p.121)
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Member' => array(
			'className' => 'Member',
			'joinTable' => 'meetings_members',
			'foreignKey' => 'meeting_id',
			'associationForeignKey' => 'member_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

	
	/** 
	 * 独自チェックルール「この時間帯の会議室は使用されていないか」
	 * リスト５－１３ (p.130)
	 * @param array $check 当該項目名と入力値
	 * @return boolean true:チェックOK、false:チェックNG
	 */
	public function isDoubleBooking($check) {
		
debug($check);			// 引数を表示してみる
//debug($this->data);		// 他の入力値も表示してみる

		// 入力内容を取得
		$key = key($check);			// 項目名の取り出し
		$val = array_shift($check);	// 入力値の取り出し
		$room_id = $this->data['Meeting']['meeting_room_id'];
									// 入力値(会議室ID)の取り出し
		
		// 検索条件組立
		$query = array(
			'conditions' => array(
				'Meeting.meeting_room_id' => $room_id, 
				'Meeting.start_time <' => $val,	
				'Meeting.end_time >' => $val,	
			)
		);
		// この時間に開催中の会議はあるか
		$this->recursive = -1;
		$count = $this->find('count', $query);
		
		if ($count >= 1) return false;
		return true;
	}
}
