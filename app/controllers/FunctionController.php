<?php

class FunctionController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/** Postデータ
	* @param ( str )campaign_name キャンペーン名
	* @param ( str )campaign_budget キャンペーン予算
	* @param ( str )ad_group_cost 入札価格
	* @param ( arr )match_type マッチタイプ
	* @param ( str )cross_keyword01 クロスキーワード01
	* @param ( str )cross_keyword02 クロスキーワード02
	* @param ( str )cross_keyword03 クロスキーワード03
	* @param ( str )keyword クロスキーワード
	* @param ( str )url_encode エンコードURL
	* @param ( arr )ad_ads_title_word タイトルワード
	* @param ( arr )title_word_num ワード文字数
	* @param ( arr )ad_ads_title_phrase タイトルフレーズ
	* @param ( str )title_phrase_num フレーズ数
	* @param ( str )ad_ads_name 広告名
	* @param ( str )ad_ads_note01 説明文１
	* @param ( str )ad_ads_note02 説明文２
	* @param ( str )ad_ads_display_url 表示URL
	* @param ( str )ad_ads_link_url リンクURL
	* @param ( str )ad_ads_listing_type リスティングタイプ
	*/
	public function postIndex()
	{
		$posts = $_POST;

$Cam = App::make('campaign');
$err = $Cam->selfCheck();
var_dump($err);exit;

$Ad = App::make('adgroup');
$err = $Ad->selfCheck();






		foreach($posts as $key => $val)
		{
			if($val==""){ $posts[$key] = null; }
		}
		extract($posts);
		$keyword = str_replace(array("\r\n", "\r", "\n"), ' ', $keyword);
//var_dump($keyword);exit;
		$csv_header = array('キャンペーン名','広告グループ名','コンポーネントの種類','配信設定','配信状況','マッチタイプ','キーワード','カスタムURL','入札価格','広告名','タイトル','説明文1','説明文2','表示URL','リンク先URL','キャンペーン予算（日額）','キャンペーン開始日',
							'デバイス','配信先','スマートフォン入札価格調整率（%）','広告タイプ','キャリア','優先デバイス','キャンペーンID','広告グループID','キーワードID','広告ID','エラーメッセージ');
		$csv_compo_camp = array($campaign_name,null,'キャンペーン','オン',null,null,null,null,null,null,null,null,null,null,null,$campaign_budget,null,'PC|モバイル|スマートフォン|タブレット','すべて',0,null,null,null,null,null,null,null,null);
		$csv_compo_adgroup = array($campaign_name,$keyword."($match_type[0])",'広告グループ','オン',null,null,null,null,$ad_group_cost,null,null,null,null,null,null,null,null,'PC|モバイル|スマートフォン|タブレット',null,null,null,null,null,null,null,null,null,null);
		$csv_compo_ads = array($campaign_name,$keyword."($match_type[0])",'広告','オン',null,null,null,null,null,$ad_ads_name,$ad_ads_title,$ad_ads_note01,$ad_ads_note02,$ad_ads_display_url,$ad_ads_link_url,null,null,'PC|モバイル|スマートフォン|タブレット',null,null,'テキスト（15・19-19）',null,null,null,null,null,null,null);
		$csv_compo_keywords = array($campaign_name,$keyword."($match_type[0])",'キーワード','オン',null,$match_type[0],$keyword,null,$ad_group_cost,null,null,null,null,null,null,null,null,'PC|モバイル|スマートフォン|タブレット',null,null,null,null,null,null,null,null,null,null);
		//バリデーション項目数チェック

		//$csv = array($csv_header, $csv_compo_camp, $csv_compo_adgroup, $csv_compo_keywords);
		//SJISに変換
		//$interenc = mb_internal_encoding();
		//mb_convert_variables("SJIS", "", $csv);

		$filename = $campaign_name. '.csv';

//		header("Content-Type: application/octet-stream");
//		header("Content-Disposition: attachment; filename=$filename");
		$csv = implode(",", $csv_header). "\n";
		$csv .= implode(",", $csv_compo_camp). "\n";
		$csv .= implode(",", $csv_compo_adgroup). "\n";
		$csv .= implode(",", $csv_compo_ads). "\n";
		$csv .= implode(",", $csv_compo_keywords). "\n";
		$csv = mb_convert_encoding($csv, "SJIS");
		print $csv;

	}

	public function getExceptsKeywords()
	{
		return View::make('excepts_keywords');
	}

	public function getAdsGroup()
	{
		return View::make('ads_group');
	}

	public function getAddAds()
	{
		return View::make('add_ads');
	}


}
