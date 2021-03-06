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

/*
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

var_dump($Key);exit;
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
*/

	public function postIndex()
	{
		$posts = $_POST;
		$Campaign = new Campaign;
		$Keyword = new Keyword;
		$AdGroup = new AdGroup;
		$AdAds = new AdAds;
		$Title = new Title;

		$campaign_id = null;
		extract($posts);
		// キャンペーンsave
		$Campaign->cam_name = $campaign_name;
		$Campaign->cam_budget = $campaign_budget;
		$Campaign->campaign_id = $campaign_id;
		$Campaign->save();

		$cam_id = $Campaign->max('id');

		//キーワードsave & 広告グループsave
		//match_typeをカンマ区切りのテキストに
		$matches = implode(',', $match_type);
		//改行コードを統一後配列化
		$order   = "/\r\n||\n||\r/";
		$keyword = str_replace($order, "\r\n", $keyword);
		$encoded_url = str_replace($order, "\r\n", $encoded_url);
		$keywords = explode("\r\n", $keyword);
		$encoded = explode("\r\n", $encoded_url);
		//エンコードの有無をチェクしキーワードとエンコードURLを対に
		if(implode('', $encoded)=='')
		{
			for($i=0; $i<count($keywords); $i++)
			{
				$Keyword_c = clone($Keyword);
				$Keyword_c->keyword = $keywords[$i];
				$Keyword_c->encoded = null;
				$Keyword_c->match_type = $matches;
				$Keyword_c->cam_id = $cam_id;
				$Keyword_c->campaign_id = $campaign_id;
				$Keyword_c->save();

				$key_id = $Keyword_c->id;

				$AdGroup_c = clone($AdGroup);
				if(preg_match('/\+/', $keywords[$i]))
				{
					$keywords[$i] = str_replace('+', '', $keywords[$i]);
				}
				$AdGroup_c->adgroup = $keywords[$i];
				$AdGroup_c->cost = $ad_group_cost;
				$AdGroup_c->cam_id = $cam_id;
				$AdGroup_c->campaign_id = $campaign_id;
				$AdGroup_c->save();

				$adg_id = $AdGroup_c->id;
			}
		}
		elseif(count($keywords)==count($encoded))
		{
			for($i=0; $i<count($keywords); $i++)
			{
				$key_and_enc[$i] = array(
					$keywords[$i],
					$encoded[$i]
				);
			}

			/* PHP ver 5.5 > */
			for($i=0; $i<count($keywords); $i++)
			{
				$Keyword_c = clone($Keyword);
				$Keyword_c->keyword = $keywords[$i];
				$Keyword_c->encoded = $encoded[$i];
				$Keyword_c->match_type = $matches;
				$Keyword_c->cam_id = $cam_id;
				$Keyword_c->campaign_id = $campaign_id;
				$Keyword_c->save();

				$key_id = $Keyword_c->id;

				$AdGroup_c = clone($AdGroup);
				if(preg_match('/ \+/', $keywords[$i]))
				{
					$keywords[$i] = str_replace('+', '', $keywords[$i]);
				}
				$AdGroup_c->adgroup = $keywords[$i];
				$AdGroup_c->cost = $ad_group_cost;
				$AdGroup_c->cam_id = $cam_id;
				$AdGroup_c->campaign_id = $campaign_id;
				$AdGroup_c->save();

				$adg_id = $AdGroup_c->id;
			}
		}
		else
		{
			return 'キーワードとエンコードURLの数が一致しません';
		}

/* PHP ver.5.5 <
		foreach($key_and_enc as list($k, $e))
		{
			$Keyword_c = clone($Keyword);
			$Keyword_c->keyword = $k;
			$Keyword_c->encoded = $e;
			$Keyword_c->match_type = $matches;
			$Keyword_c->cam_id = $cam_id;
			$Keyword_c->save();

			$key_id = $Keyword->id;

			$AdGroup_c = clone($AdGroup);
			$AdGroup_c->adgroup = $k;
			$AdGroup_c->cost = $ad_group_cost;
			$AdGroup_c->cam_id = $cam_id;
			$AdGroup_c->save();

			$adg_id = $AdGroup->id;
		}
*/
		//タイトルsave
		//一括登録の場合の配列化
		foreach($ad_ads_title_word as $word)
		{
			$word = str_replace($order, '\r\n', $word);
			$word = explode("\r\n", $word);
			$words[] = $word;
		}
		$ad_ads_title_word = array_flatten($words);

		//空の値を除去
		// $ad_ads_title_word = array_filter($ad_ads_title_word, function($val){
		// 	return $val;
		// });

		$cnt = 1;
		foreach($ad_ads_title_phrase as $p)
		{
			if(preg_match("/\{\{WORD\}\}/", $p))
			{
				foreach($ad_ads_title_word as $w)
				{
					$Title_c = clone($Title);
					$Title_c->phrase = $p;
					$Title_c->word = $w;
					$Title_c->cam_id = $cam_id;
					$Title_c->adads_id = $cnt;
					$Title_c->save();
					$cnt++;
				}
			}
			else
			{
				$Title_c = clone($Title);
				$Title_c->phrase = $p;
				$Title_c->word = 0;
				$Title_c->cam_id = $cam_id;
				$Title_c->adads_id = $cnt;
				$Title_c->save();
				$cnt++;
			}
		}

/* ver.1.0
		foreach($ad_ads_title_word as $w)
		{
			$Title_c = clone($Title);
			$Title_c->word = $w;
			// $Title_c->save();
			foreach($ad_ads_title_phrase as $t)
			{
				//置換するか否か
				//$phrase = preg_replace("/\{\{WORD\}\}/", $w, $ad_ads_title_phrase);
				//$Title_c = clone($Title);
				$Title_c->phrase = $t;
				$Title_c->cam_id = $cam_id;
				$Title_c->save();
			}
		}
*/
		//広告save
		$cnt = 1;
		for($i=0; $i<count($ad_ads_title); $i++)
		{
			$AdAds_c = clone($AdAds);
			$AdAds_c->title = $ad_ads_title[$i];
			$AdAds_c->adads = $ad_ads_name. "($cnt)"; //連番でユニーク重複回避

			if(preg_match("/\{\{WORD\}\}/", $ad_ads_note01))
			{
				$word = Title::where('cam_id', '=', $cam_id)->where('adads_id', '=', $cnt)->first();
				$word = $word->word;
				if($word == "0")
				{
					$ad_ads_replace01 = str_replace('{{WORD}}', '', $ad_ads_note01);
					$AdAds_c->note01 = $ad_ads_replace01;
				}
				else
				{
					$ad_ads_replace01 = str_replace('{{WORD}}', $word, $ad_ads_note01);
					$AdAds_c->note01 = $ad_ads_replace01;
				}
			}
			else
			{
				$AdAds_c->note01 = $ad_ads_note01;
			}
			if(preg_match("/\{\{WORD\}\}/", $ad_ads_note02))
			{
				$word = Title::where('cam_id', '=', $cam_id)->where('adads_id', '=', $cnt)->first();
				$word = $word->word;
				if($word =="0")
				{
					$ad_ads_replace02 = str_replace('{{WORD}}', '', $ad_ads_note02);
					$AdAds_c->note02 = $ad_ads_replace02;
				}
				else
				{
					$ad_ads_replace02 = str_replace('{{WORD}}', $word, $ad_ads_note02);
					$AdAds_c->note02 = $ad_ads_replace02;
				}
			}
			else
			{
				$AdAds_c->note02 = $ad_ads_note02;
			}
			$AdAds_c->display_url = $ad_ads_display_url;
			$AdAds_c->link_url = $ad_ads_link_url;
			$AdAds_c->cam_id = $cam_id;
			$AdAds_c->campaign_id = $campaign_id;
			$AdAds_c->save();

			$cnt++;
		}

/* ver.1.0
		foreach($ad_ads_title as $t)
		{
			$AdAds_c = clone($AdAds);
			$AdAds_c->title = $t;
			$AdAds_c->adads = $ad_ads_name. "($cnt)"; //連番でユニーク重複回避
			$AdAds_c->note01 = $ad_ads_note01;
			$AdAds_c->note02 = $ad_ads_note02;
			$AdAds_c->display_url = $ad_ads_display_url;
			$AdAds_c->link_url = $ad_ads_link_url;
			$AdAds_c->cam_id = $cam_id;
			$AdAds_c->save();

			$cnt++;
		}
*/
		//セッションで作成したキャンペーンIDを保持
		Session::put('cam_id', $cam_id);
		//match_type を セッションで保持
		Session::put('match_type', $match_type);
		// $page = App::make('PageController');
		// $page->getPreview();

		$validates = $this->validateFlg();
		//db名に置き換え
		if($validates!==null && is_array($validates))
		{
			foreach($validates as $key => $val)
			{
				switch($key)
				{
					case "ad_ads_title":
						$key = 'title';break;
					case "ad_ads_name":
						$key = 'adads';break;
					case "ad_ads_note01":
						$key = 'note01';break;
					case "ad_ads_note02":
						$key = 'note02';break;
					case "ad_ads_display_url":
						$key = 'display_url';break;
					case "ad_ads_link_url":
						$key = 'link_url';break;
				}
				$validated[$key] = $val;
			}
			Session::put('validated', $validated);
		}
		else
		{
			Session::put('validated', null);
		}

		//プレビュータイプ判別用
		Session::put('exec', 1);

		return Redirect::to('preview/');


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
		$posts = $_POST;
		extract($posts);
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
					//'note02' => 'required|max:19',
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


	public function postExKeywords()
	{
		$posts = $_POST;

		$Ex = new stdClass();

		extract($posts);

		//除外キーワードタイプ(=コンポーネントの種類)
		switch($ex_keyword_pattern)
		{
			case 'c':
			$Ex->ex_pattern = 'キャンペーンの対象外キーワード';break;
			case 'a':
			$Ex->ex_pattern = '広告グループの対象外キーワード';break;
		}

		//キャンペーンID
		$Ex->cam_id = $campaign_id;

		//キャンペーン名
		$Ex->cam_name = $campaign_name;

		//キーワードsave & 広告グループsave
		//match_typeをテキストに
		//$matches = implode(',', $match_type);
		foreach($match_type as $m)
		{
			switch($m)
			{
				case 'exact':
				$m = "完全一致";break;
				case 'phrase':
				$m = "フレーズ一致";break;
				case 'broad_plus':
				$m = "絞り込み部分一致";break;
				case 'broad':
				$m = "部分一致";break;
			}
			$matches[] = $m;
		}
		$Ex->match_type = $matches;

		//改行コードを統一後配列化
		$order   = "/\r\n||\n||\r/";
		$keyword = str_replace($order, "\r\n", $keyword);
		$keywords = explode("\r\n", $keyword);
		$Ex->keywords = $keywords;

		Session::put('exec', 2);
//var_dump($Ex);exit;
		return View::make('preview')->with('Ex', $Ex)->with('header', $this->csv_header);

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
