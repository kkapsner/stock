<?php
if ($class === "Room"){
	$temp->content .= DBItem::getByConditionCLASS($class)->view("stream|map", false);
}
else {
	$temp->content .= DBItem::getByConditionCLASS($class)->view(false, false);
}
?>