<?php

/**
 * PHP class dummy
 *
 * @author kkapsner
 */
class Stock extends DBItemWrapper{
	public function getClassifications(){
		if ($this->content instanceof Chemical && count($this->content->classifications)){
			return $this->content->classifications;
		}
		else {
			return null;
		}
	}
}