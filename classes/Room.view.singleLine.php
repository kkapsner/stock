<?php

/* @var $this Room */
#echo '<span title="' . $this->html(get_class($this)) . ' #' . $this->DBid . '">';
if ($this->hasField("name") && strlen($this->name)){
	echo $this->html(preg_replace("/\\s+/", " ", $this->number) . " - " . preg_replace("/\\s+/", " ", $this->name));
}
else {
	echo $this->html(get_class($this)) . ' #' . $this->DBid;
}
#echo '</span>';

?>