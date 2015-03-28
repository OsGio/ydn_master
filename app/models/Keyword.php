<?php

class Keyword extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'keywords';

	public function campaign()
	{
		return $this->belongsTo('Campaign');
	}

	public function adgroup()
	{
		return $this->hasOne('AdGroup', 'cam_id', 'cam_id');
	}

	public function adads()
	{
		return	$this->hasMany('AdAds', 'cam_id', 'cam_id');
	}

}
