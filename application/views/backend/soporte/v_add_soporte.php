<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1><?= $title; ?> <small>Asiganar tareas de soporte</small></h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase"><?= $title; ?></span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body">
							<form class="form-horizontal" method="post" action="<?php echo base_url();?>gestion/agregado/">
								<div class="form-group">
									<label class="col-md-2 control-label">Seleccionar Cliente</label>
									<div class="col-md-4 input-group">
										<span class="input-group-addon">
                                            <i class="fa fa-users"></i>
                                        </span>
                                        <select name="s_cliente" id="distrito" class="form-control">
                                            <option value=""></option>
                                            <?php foreach ($clientes as $row): ?>
                                            <option value="<?php echo $row['usuario'] ?>"><?php echo $row['nombre'] ?> <?php echo $row['apellido'] ?></option>
                                            <?php endforeach ?>
                                        </select>
									</div>
								</div>
                                <div class="form-group">
									<label class="col-md-2 control-label">Seleccionar Técnico</label>
									<div class="col-md-4 input-group">
										<span class="input-group-addon">
                                            <i class="fa fa-wrench"></i>
                                        </span>
                                        <select name="s_tecnico" id="distrito" class="form-control">
                                            <option value=""></option>
                                            <?php foreach ($usuarios as $row): ?>
                                            <option value="<?php echo $row['usuarioID'] ?>"><?php echo $row['nombre'] ?> <?php echo $row['apellido'] ?></option>
                                            <?php endforeach ?>
                                        </select>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail1" class="col-md-2 control-label">Fecha a realizar soporte</label>
									<div class="col-md-4 input-group">
                                    <span class="input-group-addon">
                                    	<i class="fa fa-calendar"></i>
                                    </span>
										<input type="text" name="s_fecha_visita" class="form-control form-control-inline input-medium date-picker todo-taskbody-due" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword1" class="col-md-2 control-label">Problema a reportar</label>
									<div class="col-md-4">
										<div class="input-icon right">
											<i class="fa fa-user"></i>
											<textarea name="s_problema" class="form-control" placeholder="Ingrese problema" rows="8"></textarea>
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputPassword1" class="col-md-2 control-label">Visible al Cliente</label>
									<div class="col-md-4 input-group">
										<span class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </span>
                                            <select name="s_visible" class="form-control">
												<option value="si">SI</option>
                                                <option value="no">NO</option>
                                            </select>
										
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-2 col-md-10">
                                    	<input type="hidden" name="procesar" value="1">
										<input type="submit" class="btn green" value="Ingresar nuevo soporte">
									</div>
								</div>
							</form>
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
