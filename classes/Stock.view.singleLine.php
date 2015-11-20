<?php

/* @var $this Stock */
if ($this->content){
	$this->content->view("singleLine", true);
	if ($this->brand){
		echo $this->html(" (" . $this->brand . ")");
	}
}
else {
	echo $this->html(get_class($this)) . ' #' . $this->DBid;
}
?>