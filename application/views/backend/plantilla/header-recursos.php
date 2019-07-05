<!DOCTYPE html>
<!--[if IE 8]> <html lang="es" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="es" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8">
<title><?php echo $title; ?> | Multitel RM</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="" name="description">
<meta content="" name="author">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>recursos/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>recursos/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>recursos/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>recursos/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!--<link href="<?php echo base_url();?>recursos/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>-->
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<?php if($recurso == 'index'){ ?>
<link href="<?php echo base_url();?>recursos/admin/pages/css/invoice.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>recursos/global/plugins/morris/morris.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>recursos/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<?php } if($recurso == 'agregar'){ // agregar usuario ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>recursos/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>recursos/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>recursos/admin/pages/css/todo.css"/>
<?php } if($recurso == 'tablas'){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>recursos/global/plugins/select2/select2.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>recursos/update/datatables/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>recursos/update/datatables/css/buttons.dataTables.min.css">
<?php } if($recurso == 'generar_facturas'){?>
<!--
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>recursos/global/plugins/clockface/css/clockface.css"/>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>recursos/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>recursos/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>recursos/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>recursos/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>recursos/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>-->
<link href="<?php echo base_url();?>recursos/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>recursos/admin/pages/css/profile-old.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>recursos/admin/pages/css/timeline.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>recursos/global/plugins/select2/select2.css"/>
<link href="<?php echo base_url();?>recursos/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>recursos/admin/pages/css/portfolio.css" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" href="<?php echo base_url();?>recursos/update/datatables/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>recursos/update/datatables/css/buttons.dataTables.min.css">

<?php } if($recurso == 'lista_usuarios'){ ?>
<link href="<?php echo base_url();?>recursos/admin/pages/css/about-us.css" rel="stylesheet" type="text/css"/>
<?php } if($recurso == 'perfil'){ ?>
<link href="<?php echo base_url();?>recursos/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>recursos/admin/pages/css/profile-old.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>recursos/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>

<?php } if($recurso == 'perfil_user'){ ?>
<link href="<?php echo base_url();?>recursos/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>recursos/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>recursos/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>

<?php } if($recurso == 'subir_imagenes'){ ?>
<link href="<?php echo base_url();?>recursos/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet"/>
<link href="<?php echo base_url();?>recursos/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet"/>
<link href="<?php echo base_url();?>recursos/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet"/>
<?php } ?>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
<link href="<?php echo base_url();?>recursos/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>recursos/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>recursos/admin/layout/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>recursos/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="<?php echo base_url();?>recursos/admin/layout/css/custom.css" rel="stylesheet" type="text/css">


<!-- END THEME STYLES -->
<link rel="icon" href="<?php echo base_url();?>cargas/img/favicon.png" type="image/x-icon" />
</head>
<!-- END HEAD -->