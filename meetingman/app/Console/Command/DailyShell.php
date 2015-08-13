<?php
App::uses('AppShell', 'Console/Command');

/*
 * リスト８－１ (p.188) シェルクラス
 */
class DailyShell extends AppShell {

	// 利用可能なサブコマンド（タスク）の定義
    public $tasks = array('MemberData'); // Console/Command/Task/MemberDataTask.phpが対応します

	/**
	 * ヘルプ内容とパラメータ・オプション群の定義
	 * @return ConsoleOptionParser
	 */
	public function getOptionParser() {
		
		// ConsoleOptionParserインスタンスの取得
		$parser = parent::getOptionParser();

		// ヘルプの先頭にくるこのシェルの説明
		$parser->description(
			'This is DailyShell\'s help.'
		);

		// サブコマンドの説明・オプションの定義
		$parser->addSubcommand('MemberData', array(
			'help' => 'Backup Members data.', 
			'parser' => $this->MemberData->getOptionParser()
		));
		
		return $parser;
	}
	
}
