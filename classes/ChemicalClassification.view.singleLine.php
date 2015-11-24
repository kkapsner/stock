<?php

/* @var $this ChemicalClassification */
if ($this->nameEN){
	echo $this->html($this->nameEN . " (" . $this->name . ")");
}
else {
	echo $this->html($this->name);
}