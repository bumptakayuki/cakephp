<?php
/*
 * 論理削除Behavior
 * リスト５－１４ (p.133)
 */
class MyDeleterBehavior extends ModelBehavior {
	
  /**
   * Behavior読み込み時に呼ばれるメソッド。コンストラクタ的な
   * 位置付けと思えば近いかも。特に初期処理が必要ないなら省略可。
   * 
   * @param Model $Modelモデルのインスタンス
   * @param array $config Behaviorの設定情報
   * @return void 戻り値不要
   */
	public function setup(Model $Model, array $settings = array()) {
	}

	/**
	 * 指定されたレコードの論理削除を行う
	 * @param Model $Model 削除を行うモデルのインスタンス
	 * @param type $id 削除レコードのID
	 * @return boolean 論理削除の結果（true：成功、false:失敗）
	 * @throws NotFoundException 指定されたデータが存在しない
	 * @throws FatalErrorException テーブルに削除フラグが無い
	 */
	public function logicalDelete(Model $Model, $id = null) {
		if (empty($id)) {
			$id = $Model->id;
		}
		// 対象データが存在するか
		if (!$Model->exists($id)) {
			throw new NotFoundException('そんなIDないよ');
		}
		// このテーブルに削除フラグがあるか
		$tableConst = $Model->getDataSource()->describe($Model); 
//debug($tableConst);
		if (!isset($tableConst['delete_flg'])) {
			throw new FatalErrorException('削除フラグがないよ');
		}
		// 更新データ組立
		$data = array(
			$Model->alias => array(
				'id' => $id,
				'delete_flg' => true,
			)
		);
//debug($data);
		// 更新
		$sts = $Model->save($data, array('validate'=>false));
		if ($sts===false) {
			return false;
		} else {
			return true;
		}
	}
	
}

?>
