<?php
/**
 * 中間テーブル（会議⇔メンバー）Fixture (p.174)
 */
class MeetingsMemberFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array $fields テーブル項目の定義
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'meeting_id' => array('type' => 'integer', 'null' => false),
		'member_id' => array('type' => 'integer', 'null' => false),
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
			'meeting_id' => 1,
			'member_id' => 1
		),
	);

}
