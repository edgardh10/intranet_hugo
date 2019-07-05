<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Formulario <small><?= $title;?></small></h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light" id="form_wizard_1">
						<div class="portlet-title">
							<div class="caption">
								<span class="caption-subject font-green-sharp bold uppercase">
								<i class="fa fa-gift"></i> <?= $title;?> - <span class="step-title">Paso 1 de 4 </span>
								</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body form">
							<form action="<?php echo base_url();?>clientes/ingresado" class="form-horizontal" id="submit_form" method="POST">
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number"> 1 </span>
												<span class="desc"><i class="fa fa-check"></i> Inicio de Sesión </span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number"> 2 </span>
												<span class="desc"><i class="fa fa-check"></i> Datos de perfil </span>
												</a>
											</li>
											<li>
												<a href="#tab3" data-toggle="tab" class="step active">
												<span class="number"> 3 </span>
												<span class="desc"><i class="fa fa-check"></i> Datos de Gestión </span>
												</a>
											</li>
											<li>
												<a href="#tab4" data-toggle="tab" class="step">
												<span class="number"> 4 </span>
												<span class="desc"><i class="fa fa-check"></i> Confirmar </span>
												</a>
											</li>
										</ul>
										<div id="bar" class="progress progress-striped" role="progressbar">
											<div class="progress-bar progress-bar-success">
											</div>
										</div>
										<div class="tab-content">
											<div class="alert alert-danger display-none">
												<button class="close" data-dismiss="alert"></button>
												Hay algunos errores en la validación, revise mas abajo.
											</div>
											<div class="alert alert-success display-none">
												<button class="close" data-dismiss="alert"></button>
												La validación del formulario ha sido exitoso.
											</div>
											<div class="tab-pane active" id="tab1">
												<h3 class="block">Dar acceso al cliente</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Usuario / DNI <span class="required">
													* </span>
													</label>
													<div class="col-md-4 input-group">
                                                    <span class="input-group-addon">
                                                        	<i class="fa fa-user"></i>
                                                        </span>
														<input type="text" class="form-control" name="usuario"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Contraseña <span class="required">
													* </span>
													</label>
													<div class="col-md-4 input-group">
                                                    <span class="input-group-addon">
                                                        	<i class="fa fa-key"></i>
                                                        </span>
														<input type="password" class="form-control" name="password" id="submit_form_password"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Confirmaar su Contraseña <span class="required">
													* </span>
													</label>
													<div class="col-md-4 input-group">
                                                    <span class="input-group-addon">
                                                        	<i class="fa fa-key"></i>
                                                        </span>
														<input type="password" class="form-control" name="rpassword"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Correo <span class="required">
													* </span>
													</label>
													<div class="col-md-4 input-group">
                                                    	<span class="input-group-addon">
                                                        	<i class="fa fa-envelope"></i>
                                                        </span>
														<input type="text" class="form-control" name="correo"/>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Ingrese Información personal</h3>
                                                <div class="form-group">
													<label class="control-label col-md-3">Nombre <span class="required">
													* </span>
													</label>
													<div class="col-md-4 input-group">
                                                    <span class="input-group-addon">
                                                        	<i class="fa fa-bars"></i>
                                                        </span>
														<input type="text" class="form-control" name="nombre"/>
													</div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Apellido <span class="required">
													* </span>
													</label>
													<div class="col-md-4 input-group">
                                                    <span class="input-group-addon">
                                                        	<i class="fa fa-bars"></i>
                                                        </span>
														<input type="text" class="form-control" name="apellido"/>
													</div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Distrito <span class="required">
													* </span>
													</label>
													<div class="col-md-4 input-group">
                                                    <span class="input-group-addon">
                                                        	<i class="fa fa-photo"></i>
                                                        </span>
														<select name="distritoID" id="distrito" class="form-control">
															<option value=""></option>
															<?php foreach ($distrito as $row): ?>
                                                            <option value="<?php echo $row['distritoID'] ?>"><?php echo $row['distrito'] ?></option>
                                                            <?php endforeach ?>
														</select>
													</div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Direccion <span class="required">
													* </span>
													</label>
													<div class="col-md-4 input-group">
                                                    <span class="input-group-addon">
                                                        	<i class="fa fa-map-marker"></i>
                                                        </span>
														<input type="text" class="form-control" name="direccion"/>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Genero <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<div class="radio-list">
															<label><input type="radio" name="sexo" value="M" data-title="Masculino"/> Masculino </label>
															<label><input type="radio" name="sexo" value="F" data-title="Femenino"/> Femenino </label>
														</div>
														<div id="form_gender_error">
														</div>
													</div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Correo Control <span class="required">
													* </span>
													</label>
													<div class="col-md-4 input-group">
                                                    <span class="input-group-addon">
                                                        	<i class="fa fa-envelope-o"></i>
                                                        </span>
														<input type="text" class="form-control" name="correo_control"/>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab3">
												<h3 class="block">Datos de pago y otros</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Mensualidad <span class="required">
													* </span>
													</label>
													<div class="col-md-4 input-group">
                                                    <span class="input-group-addon">
                                                        	<i class="fa fa-money"></i>
                                                        </span>
														<input type="text" class="form-control" name="cuotas"/>
													</div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Fecha de Instalación <span class="required">
													* </span>
													</label>
													<div class="col-md-4 input-group">
                                                    <span class="input-group-addon">
                                                        	<i class="fa fa-calendar"></i>
                                                        </span>
														<input type="text" name="fechaInst" class="form-control form-control-inline input-medium date-picker todo-taskbody-due" placeholder="Fecha de Inst...">
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab4">
												<h3 class="block">Confirma datos de la Cuenta del Cliente</h3>
												<h4 class="form-section">Cuenta</h4>
												<div class="form-group">
													<label class="control-label col-md-3">Usuario:</label>
													<div class="col-md-4"><p class="form-control-static" data-display="usuario"></p></div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Correo:</label>
													<div class="col-md-4"><p class="form-control-static" data-display="correo"></p></div>
												</div>
												<h4 class="form-section">Perfil</h4>
												<div class="form-group">
													<label class="control-label col-md-3">Nombre:</label>
													<div class="col-md-4"><p class="form-control-static" data-display="nombre"></p></div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Apellido:</label>
													<div class="col-md-4"><p class="form-control-static" data-display="apellido"></p></div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Distrito:</label>
													<div class="col-md-4"><p class="form-control-static" data-display="distritoID"></p></div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Dirección:</label>
													<div class="col-md-4"><p class="form-control-static" data-display="direccion"></p></div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Genero:</label>
													<div class="col-md-4"><p class="form-control-static" data-display="sexo"></p></div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Correo Control:</label>
													<div class="col-md-4"><p class="form-control-static" data-display="correo_control"></p></div>
												</div>
												<h4 class="form-section">Pago</h4>
												<div class="form-group">
													<label class="control-label col-md-3">Mensualidad:</label>
													<div class="col-md-4"><p class="form-control-static" data-display="cuotas"></p></div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Fecha de Instalación:</label>
													<div class="col-md-4"><p class="form-control-static" data-display="fechaInst"></p></div>
												</div>
												<input type="hidden" name="nivel" value="cliente" />
                                                <input type="hidden" name="responsable" value="M. Lozano" />
											</div>
										</div>
									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<a href="javascript:;" class="btn default button-previous">
												<i class="m-icon-swapleft"></i> Regresar </a>
												<a href="javascript:;" class="btn blue button-next">
												Continuar <i class="m-icon-swapright m-icon-white"></i>
												</a>
												<input type="submit" value="Enviar" class="btn green button-submit" /> 
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->