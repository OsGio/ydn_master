<?php namespace Illuminate\MyTraits;

trait Campaign {

	public function __construct(){
		return $this;
	}

	/**
	 * 必須項目チェック.
	 * @param ( arr )must 必須パラメーター
	 * @return ?( arr )ParamName : null
	 */
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
		if($miss)return $miss;
	}

	/**
	* @param ( arr )posts POSTデータ
	*/
	public function setParam($posts){
		foreach($this->must as $m)
		{
			if($posts[$m])$this->$m = $posts[$m];
		}
	}

}
