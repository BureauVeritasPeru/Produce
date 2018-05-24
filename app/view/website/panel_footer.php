<?php
$sectionID=3;
$langID=$PAGE->langID;
$parentContentID=0; //root
$lPie=CmsContentLang::getWebList($parentContentID, $sectionID, $langID);

?>
<?php if (WebLogin::isLogged()){ ?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Produce 2017</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                     <?php
                     foreach( $lPie as $oEnlaceRedes ){ 
                        $oLink=SEO::get_ContentLink($oEnlaceRedes); ?>
                        <li><a href="<?php echo $oLink->url; ?>" target="<?php echo $oLink->target; ?>"><i class="fa fa-<?php echo $oEnlaceRedes->subTitle; ?>"></i></a>
                        </li>
                        <?php } ?>   
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li>Diseñado por : Bureau Veritas
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <?php } ?>

