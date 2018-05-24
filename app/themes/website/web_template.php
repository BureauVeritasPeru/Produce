<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="title" content="<?php echo $PAGE->metaTag['title']; ?>">
    <meta name="keywords" content="<?php echo $PAGE->metaTag['keywords']; ?>">
    <meta name="description" content="<?php echo $PAGE->metaTag['description']; ?>">
    <meta name="distribution" content="Global">
    <meta name="city" content="Lima">
    <meta name="country" content="Peru">
    <meta property="og:title" content="<?php echo $PAGE->metaTag['title']; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo SEO::get_HTTPAssets();?>images/logo.png" />
    <meta property="og:description" content="<?php echo $PAGE->metaTag['description']; ?>" />
    <title><?php echo $PAGE->pageTitle;?></title>
    <link href='<?php echo $URL_BASE;?>images/favicon.ico' rel='shortcut icon' type='image/x-icon'>
    <!-- jQuery -->
    <script src="<?php echo $URL_BASE;?>js/jquery.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $URL_BASE;?>css/bootstrap.min.css" rel="stylesheet"> <!--bootstrap -->

    <!-- Custom Fonts en Web-->
    <link href="<?php echo $URL_BASE;?>css/font-awesome.min.css" rel="stylesheet" type="text/css"><!--icons-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- Theme CSS -->
    <link href="<?php echo $URL_BASE;?>css/agency.css" rel="stylesheet">
    <link href="<?php echo $URL_BASE;?>css/style.css" rel="stylesheet">
    <!-- JPages -->
    <link href="<?php echo $URL_BASE;?>css/jPages.css" rel="stylesheet">    <!--paginado-->
    <link href="<?php echo $URL_BASE;?>css/selectize.css" rel="stylesheet">   
    <link href="<?php echo $URL_BASE;?>css/bootstrap-datepicker.css" rel="stylesheet">  <!-- datepicker -->
    <link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo $URL_BASE;?>js/selectize.js"></script>

    
    <link href="<?php echo $URL_BASE;?>css/awesome-bootstrap-checkbox.css" rel="stylesheet"> <!--  radio y checkbox-->
    <link href="<?php echo $URL_BASE;?>css/bootstrap.vertical-tabs.min.css" rel="stylesheet"> <!--  radio y checkbox-->

    <!-- CSS  alertas --> 
    <link rel="stylesheet" href="<?php echo $URL_BASE;?>css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo $URL_BASE;?>css/alertify.min.css"/>

</head>
<body id="page-top" class="index">
    <div class="sombra"> <span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span></div>
    <?php
    include '../app/view/website/panel_top.php';
    ?>
    
    <?php
    if(isset($oContentLang))
        include '../app/view/website/panel_content.php';
    else{
        if(isset($oSectionLang))
            include '../app/view/website/panel_section.php';
        else
            include '../app/view/website/panel_home.php';
    }
    ?>
    
    <?php
    include '../app/view/website/panel_footer.php';
    ?>   
    <?php
    $msgErr=$PAGE->getErrorMessage();
    if($msgErr!="" && $WEBSITE["DEBUG_MODE"]) echo '<div style="color: #FF0000; padding:10px; background-color: #FFFAB5; font: 10px tahoma;">Error:<br />'.$msgErr.'</div>';
        ?>
        <script type="text/javascript">
            URL_BASE='<?php echo $URL_BASE;?>';
        </script>
        <script type="text/javascript">
/*  
	GOOGLE ANALYTICS CODE HERE 
    */
    $(function () {
        $("input[class*='only_float']").keypress(function (event) {

            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });


    });
    
</script>

<!-- Script -->


<!-- Bootstrap Core JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="<?php echo $URL_BASE;?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $URL_BASE;?>js/jquery.validation.js"></script>
<!-- Plugin JavaScript -->
<script src="<?php echo $URL_BASE;?>js/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="<?php echo $URL_BASE;?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo $URL_BASE;?>js/contact_me.js"></script>
<script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>

<!-- Theme JavaScript -->
<script src="<?php echo $URL_BASE;?>js/agency.js"></script>
<!-- Jpages -->
<script src="<?php echo $URL_BASE;?>js/jPages.js"></script>
<script src="<?php echo $URL_BASE;?>js/moment.js"></script>
<script src="<?php echo $URL_BASE;?>js/bootstrap-datepicker.js"></script>

<script src="<?php echo $URL_BASE;?>js/bootbox.min.js"></script>


<!-- JavaScript -->
<script src="<?php echo $URL_BASE;?>js/alertify.min.js"></script> 



</body>
</html>