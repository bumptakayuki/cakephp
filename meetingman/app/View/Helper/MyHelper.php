<?php
/*
 * 自作ヘルパー
 * 
 * 自作ヘルパーには、
 * ・何も継承しないで独自の軽量ヘルパーを作成する場合 （リスト６－１４ (p.168)）
 * ・他のヘルパーを継承して標準ヘルパーを拡張する場合 （リスト６－１７ (p.169)）
 * の２種類の作り方があります。
 * 
 * どちらもクラス宣言を変更するだけですので、下記の例を参考に、使う方を
 * コメントアウトしてください。
 */

/* ------- 以下、何も継承しない場合の宣言 ----------------- */

//class MyHelper extends AppHelper {

/* ------- 以上、何も継承しない場合の宣言 ----------------- */

/* ------- 以下、FormHelperを継承する場合の宣言 ----------- */

App::uses('FormHelper', 'View/Helper');
class MyHelper extends FormHelper {

/* ------- 以上、FormHelperを継承する場合の宣言 ----------- */


/**
 * 広告エレメントを表示する
 * @param array $options
 * @return type
 */
	function ad($options = array()) {
		// オプション初期値セット
		$options += array('id' => 'unknown');

		return $this->_View->element('ad', array('data_id'=>$options['id']));

	}
}
?>
