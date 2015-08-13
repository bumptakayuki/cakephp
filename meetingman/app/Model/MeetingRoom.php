<?php
App::uses('AppModel', 'Model');
/**
 * 会議室モデルクラス
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
 * @property Meeting $Meeting			会議モデル
 */
class MeetingRoom extends AppModel {

/**
 * Display field
 *
 * @var string $displayField 名称として画面表示する項目
 */
	public $displayField = 'name';

/**
 * 入力チェックルール (p.127)
 *
 * @var array $validate 入力チェック条件を定義する配列
 */
	public $validate = array(
		'name' => array(
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany (1:n)連係 (p.117)
 *
 * @var array
 */
	public $hasMany = array(
		'Meeting' => array(
			'className' => 'Meeting',
			'foreignKey' => 'meeting_room_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
