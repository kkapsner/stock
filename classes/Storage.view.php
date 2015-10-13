<?php
/* @var $this Storage */
?>
<article class="DBItem <?php echo $this->specifier->getClassName();?>">
	<h1><?php $this->view("singleLine", true);?></h1>
	<table>
<?php
$this->emit(new Event("view.fields.start", $this));
foreach (DBItemField::parseClass(get_class($this)) as $item){
	/* @var $item DBItemField */
	if ($item->displayable){
		if ($item->name === "room"){
			if ($this->room){
				echo "<tr><td>location</td><td>";
				$this->room->view("map", true, array("storage" => $this));
				echo "</td></tr>";
			}
		}
		else {
			echo "<tr><td>" . $this->html($item->displayName) . "</td><td>";
			$item->view(false, true, $this);
			echo "</td></tr>";
		}
		$this->emit(new Event("view.field." . $item->name, $this));
	}
}
$this->emit(new Event("view.fields.end", $this));
?>