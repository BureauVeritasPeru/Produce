<?php
$oContent=CmsContentLang::getItem($oItem->contentID, $oItem->sectionID, $oItem->langID);
$url=XMLParser::getValue($oContent->media, 'imagen');
$imagen=!empty($url)? $URL_ROOT.'/userfiles/'.$url: NULL;
?>

<header style="background-image:url('<?php echo $imagen; ?>')">
<div class="container">
    <div class="intro-text">
    	<img class="img" src="<?php echo $URL_ROOT; ?>assets/admin/images/logo_bureau.jpg" style="width:12%;margin-bottom:24px;" >
        <div class="intro-lead-in"><?php echo $oItem->title; ?></div>
        <div class="intro-heading"><?php echo $oItem->subTitle; ?></div>
        <a href="#Servicios" class="page-scroll btn btn-xl"><?php echo $oItem->subTitle2; ?></a>
    </div>
</div>
</header>