<?php

/* @var $this Shelf */
if ($this->hasField("name") && strlen($this->name)){
	echo $this->html($this->name);
	if ($this->storage){
		echo " in " . $this->storage->view("singleLine", false);
	}
}
elseif ($this->storage){
	echo $this->html(get_class($this)) . ' #' . $this->number . " in " . $this->storage->view("singleLine", false);
}
else {
	echo $this->html(get_class($this)) . ' #' . $this->DBid;
}
?>