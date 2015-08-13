<?php
/**
 * メンバーFixture (p.174)
 */
class MemberFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array $fields テーブル項目の定義
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false),
		'email' => array('type' => 'string', 'null' => true),
		'delete_flg' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'indexes' => array(
			
		),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array $records テスト実行時に初期投入するテストデータ
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'delete_flg' => 1
		),
	);

}
