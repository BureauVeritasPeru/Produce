
<header style="background-image:url('<?php echo $URL_ROOT.'/userfiles/fondo2.jpg'; ?>');padding-top:250px">
<div class="container-fluid center_div" >
    <?php

    switch ($oSectionLang->sectionID) {
        case 5:
            include("../app/view/website/section/chi.php");
            break;
        case 6:
            include("../app/view/website/section/reportes.php");
            break;
        case 8:
            include("../app/view/website/section/chd.php");
            break;    
        default:
            include("../app/view/website/section/index.php");
            break;
    }
?>
</div>

<div class="space"></div>
</header>
