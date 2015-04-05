<?php

class FunctionController extends BaseController {

	public $layout = "layouts.master";

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

	public $csv_header = array('キャンペーン名','広告グループ名','コンポーネントの種類','配信設定','配信状況','マッチタイプ','キーワード','カスタムURL',
								'入札価格','広告名','タイトル','説明文1','説明文2','表示URL','リンク先URL','キャンペーン予算（日額）','キャンペーン開始日',
								'デバイス','配信先','スマートフォン入札価格調整率（%）','広告タイプ','キャリア','優先デバイス',
								'キャンペーンID','広告グループID','キーワードID','広告ID','エラーメッセージ');


	public function postPreview()
	{
		$posts = $_POST;
		//キーワードを作成
		$Key = App::make('keyword');
		$Key->setVal($posts);
		//キーワードに紐づく広告作成
		$Key->AdAds->setVal($posts);

		//キーワード[マッチタイプ]の数だけ繰り返し
		foreach($Key->getVal('keywords') as $k => $v)
		{
			$clones_key = $Key->setClone($k);
		}

		foreach($Key->AdGroup as $ad)
		{
			$ad->setVal($posts);
			$clones_adgroup = $ad->setClone();
		}

		$Cam = App::make('campaign');
		$Cam->setVal($posts);
		$Campaign = $Cam->makeCampaign($clones_key, $clones_adgroup);

		//$Copy = serialize(clone($Campaign));
		$Copy = serialize($Campaign);

		Session::put('Cam', $Copy);

// print('<pre>');
// var_dump($Campaign->Keyword->AdAds);
// print('<pre>');
// exit;

		return View::make('preview', array('Cam' => $Campaign, 'header' => $this->csv_header));

	}


	public function postCsv()
	{
		$posts = $_POST;
		$fname = date('Y-m-d H:i:s');
		$data = mb_convert_encoding($posts['pre_csv'], 'SJIS');

	header("Content-disposition: attachment; filename=" . $fname . ".csv");
	header("Content-Type: text/csv; charset=Shift_JIS ");
	// echo mb_convert_encoding("テスト\n","SJIS", "UTF-8");
	print($data);

	exit;

	}


	public function postSaved()
	{
		$inputs = (Input::all()) ? Input::all() : null;
// print('input is ...');
// var_dump($inputs);
//$inputs = null;

		$Cam = unserialize(Session::get('Cam'));

		Session::forget('cnt');
		Session::flash('valid', $inputs);


		return View::make('preview', array('Cam' => $Cam, 'header' => $this->csv_header));

	}


	public function validateFlg(){
		$validator = Validator::make(
			array('ad_ads_title' => $ad_ads_title,
					'ad_ads_name' => $ad_ads_name,
					'ad_ads_note01' => $ad_ads_note01,
					'ad_ads_note02' => $ad_ads_note02,
					'ad_ads_display_url' => $ad_ads_display_url,
					'ad_ads_link_url' => $ad_ads_link_url),
			array('ad_ads_title' => 'required|max:15',
					'ad_ads_name' => 'required|max:50',
					'ad_ads_note01' => 'required|max:19',
					'ad_ads_note02' => 'required|max:19',
					'ad_ads_display_url' => 'required|max:29',
					'ad_ads_link_url' => 'required|max:1024')
	);
		if($validator->fails())
		{
			$failed = $validator->failed();
			return $failed;
		}
		return null;

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
