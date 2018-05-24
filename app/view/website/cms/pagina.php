<?php
$imagen=isset($oContentLang->media['imagen']['Url'])? '<img src="'.$URL_ROOT.$oContentLang->media['imagen']['Url'].'" />': NULL;
?>
<h1><?php echo $oContentLang->title;?></h1>
<div class="imagen_left">
	<?php echo $imagen;?>
</div>
<div class="texto_right">
	<?php echo $oContentLang->description;?>
</div>
<div class="clear"></div>
