<?php

class AdGroup extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'adgroups';

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

}
