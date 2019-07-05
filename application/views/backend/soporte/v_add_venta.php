<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1><?=$title ?> <small>ventas</small></h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase"><?=$title ?></span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>

						<div class="portlet-body">
                        <!--<div class="alert alert-warning alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								Editar la Factura de <strong></strong> solamente, si es necesario.
							</div>-->
							<form class="form-horizontal" method="post" name="generar_factura" action="<?php echo base_url();?>gestion/ingresar_venta/">
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-2 control-label"> Nombre</label>
									<div class="col-md-4">
										<div class="input-icon">
											<i class="fa fa-user"></i>
											<input type="text" class="form-control" name="v_nombre" value="" required>
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-2 control-label"> Apellido</label>
									<div class="col-md-4">
										<div class="input-icon">
											<i class="fa fa-user"></i>
											<input type="text" name="v_apellido" class="form-control" value="" required>
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-2 control-label"> DNI</label>
									<div class="col-md-4">
										<div class="input-icon">
											<i class="fa fa-credit-card"></i>
											<input type="text" name="v_dni" maxlength="8" class="form-control" value="" required>
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-2 control-label"> Teléfono</label>
									<div class="col-md-4">
										<div class="input-icon">
											<i class="fa fa-phone"></i>
											<input type="text" name="v_telefono" class="form-control" value="" required>
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-2 control-label"> Dirección</label>
									<div class="col-md-4">
										<div class="input-icon">
											<i class="fa fa-map-marker"></i>
											<input type="text" name="v_direccion" class="form-control" value="" required>
										</div>
									</div>
								</div>
								<?php if ($this->session->userdata('nivel') == 'admin_sup') { ?>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-2 control-label"> Vendedor</label>
									<div class="col-md-4">
										<div class="input-icon">
											<i class="fa fa-suitcase"></i>
											<select class="form-control" name="v_tecnicoID">
                                            <option value="" selected="selected"></option>
                                            <?php foreach($usuarios as $row):  ?>
                                            	<option value="<?php echo $row['usuarioID']; ?>"><?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?></option>
                                            <?php endforeach ?>
				                            </select>
										</div>
									</div>
								</div>
								<?php } else { ?>
								<input type="hidden" name="v_tecnicoID" value="<?php echo $this->session->userdata('usuarioID'); ?>">
								<?php } ?>
								<div class="form-group">
									<label for="inputEmail1" class="col-md-2 control-label">Fecha</label>
									<div class="col-md-4 input-group">
                                    <span class="input-group-addon">
                                    	<i class="fa fa-calendar"></i>
                                    </span>
										<input type="text" name="v_fecha" class="form-control form-control-inline input-medium date-picker todo-taskbody-due" readonly required>
									</div>
								</div>
                                <div class="form-group">
									<div class="col-md-offset-2 col-md-10">
										<input type="submit" class="btn blue" value="Ingresar Venta">
                                        
									</div>
								</div>
							</form>
							<hr>
							
						</div>
					
                    
                    </div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
