<?php

class KeywordController extends BaseController {

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
    private $component_type = 'キーワード';
    private $send_flg = 'オン';
    private $send_status = null;
    private $match_type;
    private $keywords;
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

    private $must = ['campaign_name', 'ad_group_name', 'match_type', 'keywords', 'ad_group_cost', 'ad_ads_link_url']; //ad_ads_link_urlは自身の必須項目ではないが子要素のため必要
    private $core = ['keywords', 'ad_group_name'];

    public $count_keywords;

    public $AdAds;
    public $AdGroup;

    /**
    * @param campaign_name キャンペーン名
    *
    */

    //AdAds, AdGroupコントローラーを生成
    public function __construct(){
        $this->AdAds = App::make('adads');
        $this->AdGroup = App::make('adgroup');
        return $this;
    }

    public function getVal($attr=''){
		return $this->$attr;
	}

    //オリジナルのキャスト関数を呼び出し必要な値をセット
    public function setVal($posts){
        self::castKeywords($posts);
        foreach($posts as $key => $val){
            if(in_array($key, $this->must)){
                $this->$key = $val;
            }
        }
    }

    //セルフチェックをして何もなかったらクローンに分割
    public function setClone(){
        if(!self::selfCheck()){
            //construct時のAdAdsもクローン
            for($i=0; $i<$this->count_keywords; $i++)
            {
                $clone = clone $this;
                $clone->AdAds = clone $this->AdAds;
                $clone->keywords = $this->keywords[$i];
                $clone->ad_group_name = $this->ad_group_name[$i];
                $clone->AdAds->setAdGroupName($this->ad_group_name[$i]);
                $clone->AdAds->setLinkUrl($this->ad_ads_link_url[$i]);
                //必要項目をセットしたあとにAdAdsのクローンをここで行う
                $clone->AdAds = $clone->AdAds->setClone();
                $clones[] = $clone;
            }
        return $clones;
        }
        return null;
    }
/*
    //セルフチェックをして何もなかったらクローンに分割
    public function setClone(){
        if(!self::selfCheck()){
            //cloneを外で定義 //construct時のAdAdsもクローン？
            for($i=0; $i<$this->count_keywords; $i++){
                if($i==0){
                    ${"clone".$i} = clone $this;
                }else{
                    ${"clone".$i} = clone ${"clone".($i-1)};
                }
                ${"clone".$i}->keywords = $this->keywords[$i];
                ${"clone".$i}->ad_group_name = $this->ad_group_name[$i];
                //${"clone".$i}->AdAds->setAdGroupName($this->ad_group_name[$i]);
                // $clone->AdAds->ad_group_name = $this->ad_group_name[$i];
                //ここでAdAdsをclone?
                ${"clone".$i}->AdAds->setLinkUrl($this->ad_ads_link_url[$i]); //AdAdsのmustであるad_ads_link_urlを挿入
                $clones[] = ${"clone".$i};
// var_dump(${"clone".$i}->ad_group_name);
            }
        for($i=0; $i<count($clones); $i++){
            $clones[$i]->AdAds->setAdGroupName(${"clone".$i}->ad_group_name);
        }
        return $clones;
        }
        return null;
    }
*/

    public function setAdAds($AdAds){
        $this->AdAds = $AdAds;
    }

    //自己必須項目チェック
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


    //クラス専用キャスト関数
    protected function castKeywords($posts){
        extract($posts);
        switch($match_type){
            case "exact":
                $this->match_type = "完全一致";break;
            case "phrase":
                $this->match_type = "フレーズ一致";break;
            case "broad_plus":
                $this->match_type = "絞り込み部分一致";break;
            case "broad":
                $this->match_type = "部分一致";break;
        }
        $keywords = explode("\n", $keyword);
        $this->count_keywords = count($keywords);
        $this->keywords = $keywords;
        $url = explode("\n", $ad_ads_link_url);
        $this->ad_ads_link_url = $url;
        self::makeAdGroupName($keywords);
        return $keywords;
    }
    //近似しているグループネームをここで作成
    protected function makeAdGroupName($keywords){
        foreach($keywords as $k){
            $ad_group_name[] = $k. '('. $this->match_type .')';
        }
        $this->ad_group_name = $ad_group_name;
        $this->AdGroup->setAdGroupName($ad_group_name);
        //$this->AdAds->setAdGroupName($ad_group_name);
    }


}
