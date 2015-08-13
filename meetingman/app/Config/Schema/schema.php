<?php
/**
 * リスト２－１．会議室管理システムのスキーマファイル (p.31)
 * 
 * ファイルが完成したら、p.35の手順でテーブルを作成しましょう。
 */
class AppSchema extends CakeSchema {
	
	//kaba このクラスでは、１つのメンバー変数が１つのテーブルになります。
	//kaba メンバー変数名（テーブル名）はスネークケース複数形です。

	// 会議室テーブル
	public $meeting_rooms = array(
		// 各項目に関する定義
		'id' => array('type' => 'integer', 'key' => 'primary', 
			'null' => false, 'default' => null),
		'name' => array('type' => 'string', 
			'null' => false, 'default' => '', 'length' => 255),

		// インデックスの定義
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		// テーブルパラメータの定義
		'tableParameters' => array()
	);
	
	// 会議テーブル
	public $meetings = array(
		'id' => array('type' => 'integer', 'key' => 'primary', 
			'null' => false, 'default' => null),
		'start_time' => array('type' => 'datetime', 
			'null' => false, 'default' => null),
		'end_time' => array('type' => 'datetime', 
			'null' => false, 'default' => null),
		'meeting_room_id' => array('type' => 'integer', 
			'null' => false, 'default' => null),
		'title' => array('type' => 'string', 
			'null' => false, 'default' => '', 'length' => 255),
		'gidai' => array('type' => 'string', 
			'null' => true, 'default' => '', 'length' => 1024),
		'gijiroku' => array('type' => 'string', 
			'null' => true, 'default' => '', 'length' => 10240),
		
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array()
	);
	
	// メンバーテーブル
	public $members = array(
		'id' => array('type' => 'integer', 'key' => 'primary', 
			'null' => false, 'default' => null),
		'name' => array('type' => 'string', 
			'null' => false, 'default' => '', 'length' => 255),
		'email' => array('type' => 'string', 
			'null' => true, 'default' => '', 'length' => 255),
		'delete_flg' => array('type' => 'boolean', 
			'null' => false, 'default' => false),
		
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array()
	);
	
	// 中間テーブル（会議⇔出席メンバー）
	public $meetings_members = array(
		'id' => array('type' => 'integer', 'key' => 'primary', 
			'null' => false, 'default' => null),
		'meeting_id' => array('type' => 'integer', 
			'null' => false, 'default' => null),
		'member_id' => array('type' => 'integer', 
			'null' => false, 'default' => null),
		
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array()
	);

}
?>