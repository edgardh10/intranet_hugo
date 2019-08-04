<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.1.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>MultitelRM | Iniciar Sesión</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>recursos/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>recursos/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>recursos/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>recursos/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url();?>recursos/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>recursos/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url();?>recursos/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>recursos/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>recursos/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="<?php echo base_url();?>recursos/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>recursos/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="icon" href="<?php echo base_url();?>cargas/img/favicon.png" type="image/x-icon" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="<?php echo base_url();?>">
	<img src="<?php echo base_url();?>cargas/img/logo_m.png" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" method="post" role="form" action="<?php echo base_url();?>login/new_user">
		<h3 class="form-title">Inicia Sesión	</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Ingresa tu usuario y contraseña. </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Usuario</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Usuario" name="usuario"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Contraseña</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" name="password"/>
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			<input type="checkbox" name="remember" value="1"/> Recordarme </label>
			<input type="submit" class="btn blue pull-right" value="Login"><i class="m-icon-swapright m-icon-white"></i>
		</div>
		
		<div class="create-account">
			
		</div>
	</form>
	<!-- END LOGIN FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 <?php echo date('Y'); ?> &copy; <a href="http://www.megasystemas.com" href="_blank" style="color: #fff;">Megasystemas</a>
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>recursos/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>recursos/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo base_url();?>recursos/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>recursos/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>recursos/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>recursos/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/admin/pages/scripts/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
  Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
 	Login.init();
  	Demo.init();
       // init background slide images
       $.backstretch([
        "<?php echo base_url();?>recursos/admin/pages/media/bg/1.jpg",
        "<?php echo base_url();?>recursos/admin/pages/media/bg/2.jpg",
        "<?php echo base_url();?>recursos/admin/pages/media/bg/3.jpg",
        "<?php echo base_url();?>recursos/admin/pages/media/bg/4.jpg"
        ], {
          fade: 1000,
          duration: 8000
    }
    );
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>