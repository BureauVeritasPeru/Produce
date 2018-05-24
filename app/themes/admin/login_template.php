<!DOCTYPE html><!--[if lt IE 7 ]> <html class="no-js ie6" dir="ltr" lang="es"> <![endif]--><!--[if IE 7 ]>    <html class="no-js ie7" dir="ltr" lang="es"> <![endif]--><!--[if IE 8 ]>    <html class="no-js ie8" dir="ltr" lang="es"> <![endif]--><!--[if IE 9 ]>    <html class="no-js ie9" dir="ltr" lang="es"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--><html class="no-js" dir="ltr" lang="es"><!--<![endif]--><head>    <title>Login</title>    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">    <!-- Tell the browser to be responsive to screen width -->    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">    <link rel="shortcut icon" href="../assets/admin/favicon.ico" type="image/x-icon" />    <link rel="icon" href="../assets/admin/favicon.ico" type="image/ico" />    <!-- Bootstrap 3.3.5 -->    <link rel="stylesheet" href="../assets/admin/bootstrap/css/bootstrap.min.css">    <!-- Font Awesome -->    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">    <!-- Ionicons -->    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">    <!-- Theme style -->    <link rel="stylesheet" href="../assets/admin/dist/css/AdminLTE.min.css">    <link rel="stylesheet" href="../assets/admin/dist/css/skins/skin-blue.min.css">    <link rel="stylesheet" href="../assets/admin/css/custom.css">    <!-- iCheck for checkboxes and radio inputs -->    <link rel="stylesheet" href="../assets/admin/admin-plugins/iCheck/all.css">    <!-- jQuery 2.1.4 -->    <script src="../assets/admin/admin-plugins/jQuery/jQuery-2.1.4.min.js"></script>    <!-- jQuery UI 1.11.4 -->    <script src="../assets/admin/admin-plugins/jQueryUI/jquery-ui.min.js"></script>    <!-- iCheck 1.0.1 -->    <script src="../assets/admin/admin-plugins/iCheck/icheck.min.js"></script>    <!-- AdminLTE App -->    <script src="../assets/admin/dist/js/app.min.js"></script>    <!-- Slimscroll -->    <script src="../assets/admin/admin-plugins/slimScroll/jquery.slimscroll.min.js"></script>    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->    <script>        //$.widget.bridge('uibutton', $.ui.button);    </script>    <script src="../assets/admin/js/navigate.js" type="text/javascript"></script>    <script src="../assets/admin/js/custom.js" type="text/javascript"></script>    <!-- Bootstrap 3.3.5 -->    <script src="../assets/admin/bootstrap/js/bootstrap.min.js"></script>    <script type="text/javascript">        <?php echo $MODULE->clientScript; ?>    </script></head><style type="text/css">    .login-page, .register-page {        background:#efede3 url('../userfiles/trama.png') repeat 0 -19px;    }     .login-box, .register-box {        background-color: #fff;        padding: 13px;    }    .btn-primary {        background-color: #b40139;        border-color: #b40139;    }    .btn-primary:hover, .btn-primary:active, .btn-primary.hover {        background-color: #a00335;    }    .login-box, .register-box {        border: 0.5px dashed #c6ccd2;    }    .login-logo, .register-logo {        margin-bottom: 0px;     }</style><body class="hold-transition login-page">    <div class="login-box">        <div class="login-logo">            <img src="http://app.bureauveritas.com.pe/produce/userfiles/logo_bv_header.gif" style="width: 28% !important;">        </div>        <!-- /.login-logo -->        <div class="login-box-body">            <p class="login-box-msg">Sistema Administrativo Produce</p>             <form name="frmLogin" method="post">                <input type="hidden" name="Command" id="Command" />                <input type="hidden" name="moduleID" id="moduleID" value="<?php echo $MODULE->moduleID; ?>" />                <input type="hidden" name="FormView" id="FormView" value="<?php echo $MODULE->FormView; ?>" />                <?php if($MODULE->msgError){ ?>                <div class="alert alert-danger alert-dismissible">                    <h4>                        <i class="icon fa fa-ban"></i>                        Acceso Denegado                    </h4>                    <?php echo $MODULE->msgError;?>                </div>                <?php } ?>                <?php include("../app/view/admin/login.form.php");?>            </form>            <div class="social-auth-links text-center" style="display:none">                <p>- OR -</p>                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using                    Facebook</a>                    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using                        Google+</a>                    </div>                    <!-- /.social-auth-links -->                    <a href="#" class="" style="display:none">I forgot my password</a>                </div>                <!-- /.login-box-body -->            </div>            <!-- /.login-box -->            <!-- jQuery 2.1.4 -->            <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>            <!-- Bootstrap 3.3.5 -->            <script src="../../bootstrap/js/bootstrap.min.js"></script>            <!-- iCheck -->            <script src="../../plugins/iCheck/icheck.min.js"></script>            <script>            </script>        </body>        </html>