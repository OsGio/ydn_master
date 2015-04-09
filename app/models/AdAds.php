<?php

class AdAds extends Eloquent{

	public $campaign_name;
    public $ad_group_name;
    public $component_type = '広告';
    public $send_flg = 'オン';
    public $send_status = null;
    public $match_type = null;
    public $keywords = null;
    public $custom_url = null;
    public $ad_group_cost = null;
    public $ad_ads_name;
    public $ad_ads_title;
    public $ad_ads_note01;
    public $ad_ads_note02;
    public $ad_ads_display_url;
    public $ad_ads_link_url;
    public $campaign_budget = null;
    public $start_day = null;
    public $device_type = "PC|モバイル|スマートフォン";
    public $send_to = null;
    public $sp_budget_ratio = null;
    public $ad_ads_type = "テキスト（15・19-19）";
    public $career = null;
    public $priority_device = null;
    //public $campaign_id = null;
    public $ad_group_id = null;
    public $keywords_id = null;
    public $ad_ads_id = null;
    public $err_msg = null;
	public $cnt = 0;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'adadses';

	public $keys = array(
		'campaign_name', 'ad_group_name', 'component_type', 'send_flg', 'send_status', 'match_type', 'keywords',
		'custom_url', 'ad_group_cost', 'adads', 'title', 'note01', 'note02',
		'display_url','ad_ads_link_url','cam_budget','start_day','device_type','send_to',
		'sp_budget_ratio','ad_ads_type','career','priority_device','campaign_id','ad_group_id','keywords_id',
		'ad_ads_id','err_msg'
	);

	public function campaign()
	{
		return $this->belongsTo('Campaign');
	}

	public function keyword()
	{
		return $this->belongsTo('Keyword', 'cam_id', 'cam_id');
	}

	public function adgroup()
	{
		return $this->belongsTo('AdGroup', 'cam_id', 'cam_id');
	}

	public function getVal($var)
	{
		return $this->find(Session::get('cam_id'))->$var;
	}

	public function setVal($key, $val)
	{
		$this->$key = $val;
	}

	public function setKeyword($Keyword)
	{
		$this->keywords = $Keyword->keyword;
	}

	public function setAdgroup($AdGroup)
	{
		$this->ad_group_name = $AdGroup->adgroup;
	}

	public function setEncoded($Keyword)
	{
		if($Keyword->encoded)
		{
			$this->ad_ads_link_url = $this->link_url. '?k=' .$Keyword->encoded;
		}
		elseif(!$Keyword->encoded)
		{
			$this->ad_ads_link_url = $this->link_url;			
		}
	}

}
