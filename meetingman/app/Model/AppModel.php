<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

	
/**
 * 論理削除に対応した拡張版削除メソッド。(p.137)
 * 
 * 既定のdelete()は
 * 　　 delete($id = null, $cascade = true)
 * ですが、論理削除を行うかどうかのオプション値を追加するために、
 * 第二引数を $option = array() としました。もちろん従来通り
 * 第二引数に $cascade を送ってもらっても良いように対応しています。
 *
 * #### Options
 * - cascade: Set to true to delete records that depend on this record
 * - logicalDelete: 論理削除を行うか。（初期値：false）
 *
 * @param type $id 削除対象レコードのID
 * @param type $option オプション値。または$cascade
 * @return boolean True on success
 * @throws FatalErrorException 論理削除を行う指定なのに、論理削除Behaviorの利用宣言がされていない。
 */
	public function delete($id = null, $option = array()) {
		// デフォルトオプションに指定オプションを上書き
		$defaultOpt = array(
			'cascade' => true, 
			'logicalDelete' => false
		);
		if (is_bool($option)) { // 既存の呼び出し方式の場合
			$defaultOpt['cascade'] = $option;
			$option = array();
		}
		$option = array_merge($defaultOpt, $option);
		// DBアクセス処理呼び出し
		if ($option['logicalDelete']) {
			if (function_exists($this, 'logicalDelete')) {
				// 論理削除
				$sts = $this->logicalDelete($id);
			} else {
				throw new FatalErrorException(
					'MyDeleterBehaviorが導入されてないのでは？');
			}
		} else {
			// 物理削除
			$sts = parent::delete($id, $option['cascade']);
		}
		return $sts;
	}

}
