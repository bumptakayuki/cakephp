<?php
/*
 * リスト８－２ (p.191) タスククラス
 */
class MemberDataTask extends AppShell {
	
	// 使用するモデル
	public $uses = 'Member';
	
	/**
	 * タスクの入り口
	 */
	public function execute() {
		// ご挨拶を画面に表示
		$this->out("Hello!!!!");
		
		// 区切り線を表示
		$this->hr();

		// addArgument()で指定した引数を表示
		debug($this->args);
		
		// addOption()で指定したオプションを表示
		debug($this->params);
		
		// 実際のバッチ処理
		$this->_exec();
	}

	/**
	 * ヘルプ内容とパラメータ・オプション群の定義
	 * @return ConsoleOptionParser
	 */
	public function getOptionParser() {
		
		// ConsoleOptionParserインスタンスの取得
		$parser = parent::getOptionParser();

		// ヘルプの先頭にくるこのタスクの説明
		$parser->description(
			'This is MemberData Task\'s help.'
		);

		// 引数の説明
		$parser->addArgument('FileName', array(
			'help' => 'Output file name.', 
			// 引数は入力必須か
			'required' => true
		));

		// タスクのオプションの定義
		$parser->addOption('connection', array(
			'help' => 'Database connection.',
			// オプションの短縮名
			'short' => 'c',
			// 未入力の場合の初期値
			'default' => 'default',
			// オプション値の選択肢
			'choices' => array('default', 'test'),
		));
		
		return $parser;
	}
	
	// 実際のバッチ処理
	public function _exec() {
		$data = $this->Member->find('all');
		$data[0]['Member']['name'] = mb_convert_encoding($data[0]['Member']['name'], 'sjis-win', 'utf8');
		$data[0]['Meeting'][0]['gidai'] = mb_convert_encoding($data[0]['Meeting'][0]['gidai'], 'sjis-win', 'utf8');
		$data[0]['Meeting'][0]['title'] = mb_convert_encoding($data[0]['Meeting'][0]['title'], 'sjis-win', 'utf8');
		debug($data);
	}
	
}
