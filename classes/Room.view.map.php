<div class="room map" style="<?php
	$scaling = $args && is_array($args) && array_key_exists("scaling", $args)? (int) $args["scaling"]: 30;
	$displayHeight = $this->height * $scaling - 4;
	$displayWidth = $this->width * $scaling - 4;
	echo $this->html("height: " . $displayHeight . "px;");
	echo $this->html("width: " . $displayWidth . "px;");
	if (!$args || (is_array($args) && array_read_key("position", $args, false))){
		echo $this->html("top: " . ($this->top * $scaling) . "px;");
		echo $this->html("left: " . ($this->left * $scaling) . "px;");
	}
?>">
	<div class="name" style="<?php
		echo $this->html("line-height: " . $displayHeight . "px;");
	?>">
		<?php $this->view("link", true);?>
	</div>
	<?php
	if ($this->storages->count()){
	?>
	<ul class="storages">
		<?php
			$storageDisplays = array();
			$markedStorage = $args && is_array($args)? array_read_key("storage", $args, false): false;
			foreach ($this->storages as $storage){
				$foundDisplayIdx = false;
				foreach ($storageDisplays as $i => $display){
					if (
						$display["width"] === $storage->width &&
						$display["height"] === $storage->height &&
						$display["left"] === $storage->left &&
						$display["top"] === $storage->top
					){
						$storageDisplays[$i]["storages"][] = $storage;
						$foundDisplayIdx = $i;
						break;
					}
				}
				if ($foundDisplayIdx === false){
					$foundDisplayIdx = count($storageDisplays);
					$storageDisplays[] = array(
						"storages" => array($storage),
						"width" => $storage->width,
						"height" => $storage->height,
						"left" => $storage->left,
						"top" => $storage->top,
						"marked" => false
					);
				}
				if ($storage === $markedStorage){
					$storageDisplays[$foundDisplayIdx]["marked"] = true;
				}
			}
			foreach ($storageDisplays as $display){
				$storageDisplayWidth = $display["width"] * $scaling;
				$storageDisplayHeight = $display["height"] * $scaling;
				echo "<li class=\"" . (
						$display["marked"]?
						"marked":
						""
					) . "\" style=\"" . 
					$storage->html("width:" . $storageDisplayWidth . "px;") .
					$storage->html("height:" . $storageDisplayHeight . "px;") .
					$storage->html("top: " . (
						($displayHeight - $storageDisplayHeight) * $display["top"]
					) . "px;") . 
					$storage->html("left: " . (
						($displayWidth - $storageDisplayWidth) * $display["left"]
					) . "px;") . 
				"\"><span class=\"name\">";
				foreach ($display["storages"] as $storage){
					$storage->view("map|link", true);
					echo "<br>";
				}
				echo "</span></li>";
			}
		?>
	</ul>
	<?php
	}
	?>
</div>