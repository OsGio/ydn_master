<?php

class Campaign extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'campaigns';

	public $campaign_name;
    public $ad_group_name = null;
    public $component_type = 'キャンペーン';
    public $send_flg = 'オン';
    public $send_status = null;
    public $match_type = null;
    public $keywords = null;
    public $custom_url = null;
    public $ad_group_cost = null;
    public $ad_ads_name = null;
    public $ad_ads_title = null;
    public $ad_ads_note01 = null;
    public $ad_ads_note02 = null;
    public $ad_ads_display_url = null;
    public $ad_ads_link_url = null;
    public $campaign_budget;
    public $start_day = null;
    public $device_type = "PC|モバイル|スマートフォン";
    public $send_to = "すべて";
    public $sp_budget_ratio = 0;
    public $ad_ads_type = null;
    public $career = null;
    public $priority_device = null;
    //public $campaign_id = null;
    public $ad_group_id = null;
    public $keywords_id = null;
    public $ad_ads_id = null;
    public $err_msg = null;

	public $keys = array(
		'cam_name', 'ad_group_name', 'component_type', 'send_flg', 'send_status', 'match_type', 'keywords',
		'custom_url', 'ad_group_cost', 'ad_ads_name', 'ad_ads_title', 'ad_ads_note01', 'ad_ads_note02',
		'ad_ads_display_url','ad_ads_link_url','cam_budget','start_day','device_type','send_to',
		'sp_budget_ratio','ad_ads_type','career','priority_device','campaign_id','ad_group_id','keywords_id',
		'ad_ads_id','err_msg'
	);

	public function keyword()
	{
		return $this->hasMany('Keyword', 'cam_id', 'id');
	}

	public function adgroup()
	{
		return $this->hasMany('AdGroup', 'cam_id', 'id');
	}

	public function adads()
	{
		return $this->hasMany('AdAds', 'cam_id', 'id');
	}

	public function getVal($var)
	{
		return $this->find(Session::get('cam_id'))->$var;
	}

}
