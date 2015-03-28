<?php

class Campaign extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'campaigns';


	public function keyword()
	{
		return $this->hasMany('Keyword', 'cam_id', 'id');
	}

	public function adgroup()
	{
		return $this->hasMany('AdGroup', 'cam_id', 'id');
	}

}
