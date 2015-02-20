<?php

class AdGroupController extends BaseController {

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
    private $component_type = '広告グループ';
    private $send_flg = 'オン';
    private $send_status = null;
    private $match_type = null;
    private $keywords = null;
    private $custom_url = null;
    private $ad_group_cost;
    private $ad_ads_name = null;
    private $ad_ads_title = null;
    private $ad_ads_note01 = null;
    private $ad_ads_note02 = null;
    private $ad_ads_display_url = null;
    private $ad_ads_link_url = null;
    private $campaign_budget = null;
    private $start_day = null;
    private $device_type = "PC|モバイル|スマートフォン";
    private $send_to = null;
    private $sp_budget_ratio = null;
    private $ad_ads_type = null;
    private $career = null;
    private $priority_device = null;
    private $campaign_id = null;
    private $ad_group_id = null;
    private $keywords_id = null;
    private $ad_ads_id = null;
    private $err_msg = null;

    private $must = ['campaign_name', 'ad_group_name', 'ad_group_cost'];
    private $core = ['ad_group_name'];

    public $count_ad_group_name;


    /**
    * @param campaign_name キャンペーン名
    *
    */

    public function __construct(){
        return $this;
    }

    public function setVal($posts){
        foreach($posts as $key => $val){
            if(in_array($key, $this->must)){
                $this->$key = $val;
            }
        }
    }

    //セルフチェックをして何もなかったらクローンに分割
    public function setClone(){
        if(!self::selfCheck()){
            for($i=0; $i<$this->count_ad_group_name; $i++){
                $clone = clone $this;
                $clone->ad_group_name = $this->ad_group_name[$i];
                $clones[] = $clone;
            }
        return $clones;
        }
        return null;
    }

    public function setAdGroupName($ad_group_name){
        $this->count_ad_group_name = count($ad_group_name);
        $this->ad_group_name = $ad_group_name;
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


}
