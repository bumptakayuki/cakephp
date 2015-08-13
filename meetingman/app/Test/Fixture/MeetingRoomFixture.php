<?php
/**
 * リスト７－１．会議室Fixture (p.174)
 */
class MeetingRoomFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array $fields テーブル項目の定義
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false),
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
			'name' => 'Lorem ipsum dolor sit amet'
		),
	);

}
