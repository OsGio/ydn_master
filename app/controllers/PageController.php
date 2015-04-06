<?php

class PageController extends BaseController {


	public $csv_header = array('キャンペーン名','広告グループ名','コンポーネントの種類','配信設定','配信状況','マッチタイプ','キーワード','カスタムURL',
								'入札価格','広告名','タイトル','説明文1','説明文2','表示URL','リンク先URL','キャンペーン予算（日額）','キャンペーン開始日',
								'デバイス','配信先','スマートフォン入札価格調整率（%）','広告タイプ','キャリア','優先デバイス',
								'キャンペーンID','広告グループID','キーワードID','広告ID','エラーメッセージ');

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

	public function getIndex()
	{
		return View::make('index');
	}

	public function getExKeywords()
	{
		return View::make('excepts_keywords');
	}

	public function getAddAdgroup()
	{
		return View::make('add_adgroup');
	}

	public function getAddAds()
	{
		return View::make('add_adads');
	}

	public function getPreview()
	{
		$cam_id = Session::get('cam_id');
		$match_type = Session::get('match_type');
		foreach($match_type as &$m)
		{
			switch($m)
			{
				case 'exact':
					$m = '完全一致';break;
				case 'phrase':
					$m = 'フレーズ一致';break;
				case 'broad_plus':
					$m = '絞り込み部分一致';break;
				case 'broad':
					$m = '部分一致';break;
			}
		}
		$Campaign = Campaign::find($cam_id);
		$AdGroup = Campaign::find($cam_id)->adgroup;
		foreach($AdGroup as $adg)
		{
			$adg->campaign_name = $Campaign->cam_name;
			$adg->origin = $adg->adgroup;
		}
		$Keyword = Campaign::find($cam_id)->keyword;
		foreach($Keyword as $key)
		{
			$key->campaign_name = $Campaign->cam_name;
		}
		$AdAds = Campaign::find($cam_id)->adads;
		foreach($AdAds as $ads)
		{
			$ads->campaign_name = $Campaign->cam_name;
		}

		return View::make('preview', compact('Campaign', 'AdGroup', 'Keyword', 'AdAds'))->with('header', $this->csv_header)->with('match_type', $match_type);
	}


}
