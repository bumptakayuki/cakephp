<?php
/**
 * 会議Fixture (p.174)
 */
class MeetingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array $fields テーブル項目の定義
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'start_time' => array('type' => 'datetime', 'null' => false),
		'end_time' => array('type' => 'datetime', 'null' => false),
		'meeting_room_id' => array('type' => 'integer', 'null' => false),
		'title' => array('type' => 'string', 'null' => false),
		'gidai' => array('type' => 'string', 'null' => true, 'length' => 1024),
		'gijiroku' => array('type' => 'string', 'null' => true, 'length' => 10240),
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
			'start_time' => '2013-03-23 15:29:52',
			'end_time' => '2013-03-23 15:29:52',
			'meeting_room_id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'gidai' => 'Lorem ipsum dolor sit amet',
			'gijiroku' => 'Lorem ipsum dolor sit amet'
		),
	);

}
