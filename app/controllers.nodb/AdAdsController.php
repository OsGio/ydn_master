<?php

class AdAdsController extends BaseController {

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

    /**
    * @param $campaign_name キャンペーン名
    * @param $ad_group_name 広告グループ名
    * @param $component_type コンポーネントの種類
    * @param $send_flg 配信設定
    * @param $send_status 配信状況
    * @param $match_type マッチタイプ
    * @param $keywords キーワード
    * @param $custom_url カスタムURL
    * @param $ad_group_cost 入札価格
    * @param $ad_ads_name 広告名
    * @param $ad_ads_title 広告タイトル
    * @param $ad_ads_note01 説明文１
    * @param $ad_ads_note02 説明文２
    * @param $ad_ads_display_url 表示URL
    * @param $ad_ads_link_url リンク先URL
    * @param $campaign_budget キャンペーン予算（日額）
    * @param $start_day キャンペーン開始日
    * @param $device_type デバイス
    * @param $send_to 配信先
    * @param $sp_budget_ratio スマートフォン入札価格調整率（%）
    * @param $ad_ads_type 広告タイプ
    * @param $career キャリア
    * @param $priority_device 優先デバイス
    * @param $campaign_id キャンペーンID
    * @param $ad_group_id 広告グループID
    * @param $keywords_id キーワードID
    * @param $ad_ads_id 広告ID
    * @param $err_msg エラーメッセージ
    */

    private $campaign_name;
    private $ad_group_name;
    private $component_type = '広告';
    private $send_flg = 'オン';
    private $send_status = null;
    private $match_type = null;
    private $keywords = null;
    private $custom_url = null;
    private $ad_group_cost = null;
    private $ad_ads_name;
    private $ad_ads_title;
    private $ad_ads_note01;
    private $ad_ads_note02;
    private $ad_ads_display_url;
    private $ad_ads_link_url;
    private $campaign_budget = null;
    private $start_day = null;
    private $device_type = "PC|モバイル|スマートフォン";
    private $send_to = null;
    private $sp_budget_ratio = null;
    private $ad_ads_type = "テキスト（15・19-19）";
    private $career = null;
    private $priority_device = null;
    private $campaign_id = null;
    private $ad_group_id = null;
    private $keywords_id = null;
    private $ad_ads_id = null;
    private $err_msg = null;

    private $must = ['campaign_name', 'ad_group_name', 'ad_ads_name', 'ad_ads_title', 'ad_ads_note01', 'ad_ads_note02', 'ad_ads_display_url', 'ad_ads_link_url'];
    private $core = ['ad_ads_title'];
    private $quantum = ['ad_ads_title_word', 'ad_ads_note01', 'ad_ads_note02'];

    public $count_ad_ads_title;
    public $count_ad_ads_title_word;
    public $ad_ads_title_word;
    public $ad_ads_title_phrase;


    /**
    * @param campaign_name キャンペーン名
    *
    */

    public function __construct(){
        return $this;
    }

    public function getVal($attr=''){
		return $this->$attr;
	}

    //オリジナルのキャスト関数を呼び出し必要な値をセット
    public function setVal($posts){
        //self::castAdAds($posts);
        foreach($posts as $key => $val){
            if(in_array($key, $this->must)){
                $this->$key = $val;
            }
        }
        self::castAdAds($posts);
//var_dump($this);exit;
    }

    //広告タイトルの数だけクローン作成
    public function setClone($pare_i){
         if(!self::selfCheck()){
            for($i=0; $i<$this->count_ad_ads_title_word; $i++){
                $clone = clone $this;
                $clone->ad_ads_title = $this->ad_ads_title[$i];

                $clone->ad_ads_name = $this->ad_ads_name[$i] . "(".($i+1).")";
                $clone->ad_ads_note01 = $this->ad_ads_note01[$i];
                $clone->ad_ads_note02 = $this->ad_ads_note02[$i];
                //代わりに上記を使用
                // for($q=0; $q<$this->count_ad_ads_title_word; $q++)
                // {
                //     $clone->ad_ads_name = $this->ad_ads_name[$q];
                //     $clone->ad_ads_note01 = $this->ad_ads_note01[$q];
                //     $clone->ad_ads_note02 = $this->ad_ads_note02[$q];
                // }
                $clones[] = $clone;
//                    $clone->core[$q] = $this->core[$q][$i];
                }


                // $clone->keywords = $this->keywords[$i];
                // $clone->ad_group_name = $this->ad_group_name[$i];

             }
        return $clones;
//        }
//        return null;
    }

    public function selfCheck(){
        foreach($this->must as $m)
        {
            $validator = Validator::make(
                array($m => $this->$m),
                array($m => 'required')
            );
            if($validator->fails())
            {
                $miss[] = $m;
            }
        }
        return (isset($miss)) ? $miss : null;
    }

    //専用キャストクラス
    protected function castAdAds($posts){
        extract($posts);
        //配列のまま格納
        $this->ad_ads_title_word = $ad_ads_title_word;
        $this->count_ad_ads_title = count($ad_ads_title);
        $this->count_ad_ads_title_word = count($ad_ads_title_word);
        foreach($ad_ads_title_word as $t){
            if(isset($ad_ads_name)){
                //$ad_ads_names[] = preg_replace('/\{\{WORD\}\}/', $t, $this->ad_ads_name);
                $ad_ads_names[] = preg_replace('/\{\{WORD\}\}/', $t, $ad_ads_name);
            }
            if(isset($ad_ads_note01)){
                //$ad_ads_notes01[] = preg_replace('/\{\{WORD\}\}/', $t, $this->ad_ads_note01);
                $ad_ads_notes01[] = preg_replace('/\{\{WORD\}\}/', $t, $ad_ads_note01);
            }
            if(isset($ad_ads_note02)){
                //$ad_ads_notes02[] = preg_replace('/\{\{WORD\}\}/', $t, $this->ad_ads_note02);
                $ad_ads_notes02[] = preg_replace('/\{\{WORD\}\}/', $t, $ad_ads_note02);
            }
        }
        //配列のまま格納
        $this->ad_ads_name = $ad_ads_names;
        $this->ad_ads_note01 = $ad_ads_notes01;
        $this->ad_ads_note02 = $ad_ads_notes02;
    }

    protected function makeAdGroupName($keywords){
        foreach($keywords as $k){
            $ad_group_name[] = $k. '($match_type)';
        }
        $this->ad_group_name = $ad_group_name;
    }

    public function setLinkUrl($url){
        $this->ad_ads_link_url = $url;
    }

    public function setAdGroupName($ad_group_name){
        $this->ad_group_name = $ad_group_name;
    }

}
