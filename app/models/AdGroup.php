<?php

class AdGroup extends Eloquent{

	public $campaign_name;
    public $ad_group_name;
    public $component_type = '広告グループ';
    public $send_flg = 'オン';
    public $send_status = null;
    public $match_type = null;
    public $keywords = null;
    public $custom_url = null;
    public $ad_group_cost;
    public $ad_ads_name = null;
    public $ad_ads_title = null;
    public $ad_ads_note01 = null;
    public $ad_ads_note02 = null;
    public $ad_ads_display_url = null;
    public $ad_ads_link_url = null;
    public $campaign_budget = null;
    public $start_day = null;
    public $device_type = "PC|モバイル|スマートフォン";
    public $send_to = null;
    public $sp_budget_ratio = null;
    public $ad_ads_type = null;
    public $career = null;
    public $priority_device = null;
    public $campaign_id = null;
    public $ad_group_id = null;
    public $keywords_id = null;
    public $ad_ads_id = null;
    public $err_msg = null;
	public $origin;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'adgroups';

	public $keys = array(
		'campaign_name', 'adgroup', 'component_type', 'send_flg', 'send_status', 'match_type', 'keywords',
		'custom_url', 'cost', 'ad_ads_name', 'ad_ads_title', 'ad_ads_note01', 'ad_ads_note02',
		'ad_ads_display_url','encoded','cam_budget','start_day','device_type','send_to',
		'sp_budget_ratio','ad_ads_type','career','priority_device','campaign_id','ad_group_id','keywords_id',
		'ad_ads_id','err_msg'
	);

	public function campaign()
	{
		return $this->belongsTo('Campaign');
	}

	public function keyword()
	{
		return $this->hasOne('Keyword', 'cam_id', 'cam_id');
	}

	public function adads()
	{
		return	$this->hasMany('AdAds', 'cam_id', 'cam_id');
	}

	public function getVal($var)
	{
		return $this->find(Session::get('cam_id'))->$var;
	}

	public function setAdgmatch($m)
	{
		$this->adgroup = $this->origin. "($m)";
	}

}
