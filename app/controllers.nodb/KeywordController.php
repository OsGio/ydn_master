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
    * @param ( str ) $campaign_name キャンペーン名
    * @param ( arr ) $ad_group_name 広告グループ名
    * @param ( str ) $component_type コンポーネントの種類
    * @param ( str ) $send_flg 配信設定
    * @param ( str ) $send_status 配信状況
    * @param ( arr ) $match_type マッチタイプ
    * @param ( str to arr ) $keywords キーワード
    * @param ( str ) $custom_url カスタムURL
    * @param ( str ) $ad_group_cost 入札価格
    * @param ( arr ) $ad_ads_name 広告名
    * @param ( arr ) $ad_ads_title 広告タイトル
    * @param ( arr ) $ad_ads_note01 説明文１
    * @param ( arr ) $ad_ads_note02 説明文２
    * @param ( str ) $ad_ads_display_url 表示URL
    * @param ( str to arr ) $ad_ads_link_url リンク先URL
    * @param ( str ) $campaign_budget キャンペーン予算（日額）
    * @param ( str ) $start_day キャンペーン開始日
    * @param ( str ) $device_type デバイス
    * @param ( str ) $send_to 配信先
    * @param ( str ) $sp_budget_ratio スマートフォン入札価格調整率（%）
    * @param ( str ) $ad_ads_type 広告タイプ
    * @param ( str ) $career キャリア
    * @param ( str ) $priority_device 優先デバイス
    * @param ( str ) $campaign_id キャンペーンID
    * @param ( str ) $ad_group_id 広告グループID
    * @param ( str ) $keywords_id キーワードID
    * @param ( str ) $ad_ads_id 広告ID
    * @param ( str ) $err_msg エラーメッセージ
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
    private $ad_ads_link_url_tmp = null;
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
        //$this->AdGroup = App::make('adgroup');
        return $this;
    }

    public function getVal($attr=''){
		return $this->$attr;
	}

    //オリジナルのキャスト関数を呼び出し必要な値をセット
    public function setVal($posts){
        //self::castKeywords($posts);
        foreach($posts as $key => $val){
            if(in_array($key, $this->must)){
                if($key!=='ad_ads_link_url'){
                    $this->$key = $val;
                }
            }
        }
        self::castKeywords($posts);
    }

    //セルフチェックをして何もなかったらクローンに分割
    public function setClone($k){
        if(!self::selfCheck()){
            //construct時のAdAdsもクローン
            for($i=0; $i<$this->count_keywords; $i++)
            {
                $clone = clone $this;
                $clone->AdAds = clone $this->AdAds;
                $clone->keywords = $this->keywords[$k];
                $clone->ad_group_name = $this->ad_group_name[$k];
                $clone->AdAds->setAdGroupName($this->ad_group_name[$k]);
                $clone->AdAds->setLinkUrl($this->ad_ads_link_url[$i]);
                $clone->ad_ads_link_url = $this->ad_ads_link_url[$i];
                //必要項目をセットしたあとにAdAdsのクローンをここで行う
                $clone->AdAds = $clone->AdAds->setClone($i);
                //ad_ads_link_urlは使い終わったので除去
                $clone->ad_ads_link_url = null;
                $clones[] = $clone;
            }
        return $clones;
        }
        return null;
    }

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
        if(isset($match_type))
        {
            $mm = array();
            foreach($match_type as $m)
            {
                switch($m)
                {
                    case "exact":
                        $mm[] = "完全一致";break;
                        //$this->match_type = "完全一致";break;
                    case "phrase":
                        $mm[] = "フレーズ一致";break;
                        //$this->match_type = "フレーズ一致";break;
                    case "broad_plus":
                        $mm[] = "絞り込み部分一致";break;
                        //$this->match_type = "絞り込み部分一致";break;
                    case "broad":
                        $mm[] = "部分一致";break;
                        //$this->match_type = "部分一致";break;
                }
            }
            $this->match_type = $mm;
        }
        else
        {
            //エラー処理
            $match_type = "";
        }
        //改行コードで分割・配列化
        $keywords = explode("\n", $keyword);
        //数を挿入
        $this->count_keywords = count($keywords);
        //配列のまま保持
        $this->keywords = $keywords;
        $encoded = explode("\n", $encoded_url);
        for($i=0; $i<count($encoded); $i++)
        {
            if($encoded[$i]=="")
            {
                $urls = array_fill(0, ($this->count_keywords), $ad_ads_link_url);
            }
            else
            {
                $urls[] = $ad_ads_link_url .'?'. $encoded[$i];
            }
        }
        //tmpに格納
        $this->ad_ads_link_url_tmp = $urls;
        //要：どこかで消去
        $this->ad_ads_link_url = $urls;
        self::makeAdGroupName($keywords);
        return $keywords;
    }
    //近似しているグループネームをここで作成 & キーワード複製
    protected function makeAdGroupName($keywords){
        foreach($keywords as $k)
        {
            foreach($this->match_type as $m)
            {
                $ad_group_name[$m][] = $k. '('. $m .')';
                $key_temp[$m][] = $k;
                $this->ad_group_name = $ad_group_name;
                $this->keywords = $key_temp;
                $this->AdGroup[$m] = App::make('adgroup');
                $this->AdGroup[$m]->setAdGroupName($ad_group_name[$m]);
            }
        }
//var_dump($this->AdGroup);exit;
        //$this->AdAds->setAdGroupName($ad_group_name);
    }


}
