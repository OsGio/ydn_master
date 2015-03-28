<?php

class Title extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'titles';


	public function campaign()
	{
		return $this->belongsTo('Campaign', 'id', 'cam_id');
	}

	public function keyword()
	{
		return $this->belongsTo('Keyword', 'cam_id', 'cam_id');
	}

	public function adgroup()
	{
		return $this->belongsTo('AdGroup', 'cam_id', 'cam_id');
	}

	public function adads()
	{
		return $this->belongsTo('AdAds', 'adads_id', 'id');
	}

}
