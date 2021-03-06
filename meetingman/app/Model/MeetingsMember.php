<?php
App::uses('AppModel', 'Model');
/**
 * 中間モデル（会議-メンバー）クラス
 * 
 * 第３章(p.41)で自動生成したクラスファイルをカスタマイズしています。
 * クラスの継承構造については p.91 を、使用可能な主なメンバー変数に
 * ついては p.92 をご覧ください。
 * 
 * また、モデルでできることについては、
 * ・データアクセス（１テーブル検索）
 * 　　・IDで単純検索　～ read() ～				p.94
 * 　　・自在な検索　～ find() ～					p.96
 * 　　・レコード絞り込み条件の設定				p.98
 * 　　・その他の検索条件の設定					p.100
 * 　　・検索処理のコールバックメソッド			p.102
 * ・データアクセス（１テーブル更新）
 * 　　・登録処理　～ create() & save() ～		p.105
 * 　　・更新処理　～ save() ～					p.108
 * 　　・複数レコードの更新処理　～ updateAll() ～	p.109
 * 　　・削除処理　～ delete() ～					p.110
 * 　　・一括削除処理　～ deleteAll() ～			p.110
 * 　　・更新処理のコールバックメソッド			p.111
 * ・データアクセス（複数テーブルの連携）
 * 　　・ｎ：１の検索　～ belongsTo ～			p.115
 * 　　・１：ｎの検索　～ hasMany ～				p.117
 * 　　・ｎ：ｎの検索　～ hasAndBelongsToMany ～	p.121
 * 　　・番外編：「関連テーブル」ってどこまで？		p.125
 * をご覧ください。
 *
 */
class MeetingsMember extends AppModel {


}
