<!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>recursos/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>recursos/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo base_url();?>recursos/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url();?>recursos/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<?php if($recurso=='index'){ ?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>recursos/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/admin/layout/scripts/demo.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   Demo.init(); // init demo(theme settings page)
   //QuickSidebar.init(); // init quick sidebar
   //Index.init(); // init index page
   //Tasks.initDashboardWidget(); // init tash dashboard widget
});
</script> 
<?php } if($recurso == 'agregar'){ // agregar clientes ?>
<script type="text/javascript" src="<?php echo base_url();?>recursos/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>recursos/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>recursos/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>recursos/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url(); ?>recursos/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url(); ?>recursos/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>recursos/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>recursos/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>recursos/admin/pages/scripts/form-wizard.js"></script>
<script src="<?php echo base_url();?>recursos/admin/pages/scripts/todo.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
	FormWizard.init();
	Todo.init();
});
</script>

<?php } if($recurso == 'tablas'){?>
<script type="text/javascript" src="<?php echo base_url();?>recursos/global/plugins/select2/select2.min.js"></script>
<script src="<?php echo base_url();?>recursos/update/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>recursos/update/datatables/js/dataTables.bootstrap.min.js"></script>

<script src="<?php echo base_url();?>recursos/update/datatables/js/dataTables.buttons.min.js"></script>

<script src="<?php echo base_url();?>recursos/update/datatables/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>recursos/update/datatables/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>recursos/update/datatables/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>recursos/update/datatables/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>recursos/update/datatables/js/buttons.print.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>recursos/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/admin/pages/scripts/table-advanced.js"></script>
<script>
jQuery(document).ready(function() {
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
   TableAdvanced.init();
});
</script>
<?php } if($recurso == 'generar_facturas'){?>
<script type="text/javascript" src="<?php echo base_url();?>recursos/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>recursos/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>recursos/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>recursos/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>recursos/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url(); ?>recursos/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>recursos/global/plugins/jquery-mixitup/jquery.mixitup.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>recursos/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>recursos/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>

<script src="<?php echo base_url();?>recursos/update/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>recursos/update/datatables/js/dataTables.bootstrap.min.js"></script>

<script src="<?php echo base_url();?>recursos/update/datatables/js/dataTables.buttons.min.js"></script>

<script src="<?php echo base_url();?>recursos/update/datatables/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>recursos/update/datatables/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>recursos/update/datatables/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>recursos/update/datatables/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>recursos/update/datatables/js/buttons.print.min.js"></script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>recursos/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/admin/pages/scripts/components-pickers.js"></script>
<script src="<?php echo base_url();?>recursos/admin/pages/scripts/table-advanced.js"></script>
<script src="<?php echo base_url();?>recursos/update/jquery.pulsate.min.js"></script>
<script src="<?php echo base_url();?>recursos/update/megasystemas.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOqYWLusrsIz34L7tRk-9Gz6amIuXqf2o&v=3.26&callback=inicializar"
  type="text/javascript"></script>
<?php if (isset($renderMapas)) {
  echo '<script>' . $renderMapas . '</script>';
}  ?>
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">
		// PARA LAS IMAGENES
		var Portfolio = function () {
    return {//main function to initiate the module
        init: function () { $('.mix-grid').mixitup(); }
    };
}();
</script>
<script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
        Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		Demo.init(); // init demo features
		ComponentsPickers.init();
		Portfolio.init();
    TableAdvanced.init();
        }); 
    </script>
<!-- -->
<!-- END JAVASCRIPTS -->
<?php } if($recurso == 'lista_usuarios'){ ?>
<script src="<?php echo base_url();?>recursos/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
});
</script>
<!-- END JAVASCRIPTS -->
<?php } if(($recurso == 'perfil') || ($recurso == 'perfil_user')){ ?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>recursos/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/update/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>recursos/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/admin/pages/scripts/profile.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS prfile -->
<script>
jQuery(document).ready(function() {       
   	// initiate layout and plugins
   	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features\
	Profile.init(); // init page demo
});
</script>
<!-- END JAVASCRIPTS -->

<?php } if($recurso !== 'perfil_user'){ ?>
<script type="text/javascript">
$('.select2_category').select2({
              placeholder: "Select an option",
              allowClear: true
          });
</script>
<?php } ?>
<script type="text/javascript">
$('#desplega_opciones').click(function(e) {
    $('#opciones_desactivacion').toggle( "slow", function() {
      $('#opciones_desactivacion').removeClass('hide');
    });
});

function instalar(){
  $('#pase_cliente').hide();
  $('#instalar').change(function(){
      if($('#instalar').val() == 'si') {
          $('#pase_cliente').show(); 
      } else {
          $('#pase_cliente').hide(); 
      } 
  });
}

//instalar();

</script>
</body>
<!-- END BODY -->
</html>