<form class="form-horizontal" method="post" name="agregar_usuario" action="<?php echo base_url();?>usuarios/agregar_usuario/">
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Nombre</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-user"></i>
											<input type="text" class="form-control" name="nombre" value="" required="required">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Apellido</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-user"></i>
											<input type="text" name="apellido" class="form-control" value="" required="required">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Distrito</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-map-marker"></i>
											<select class="form-control" name="distritoID">
                                            	<option value="-1"></option>
                                            <?php foreach($distrito as $fila):  ?>
                                            	<option value="<?php echo $fila['distritoID']; ?>"><?php echo $fila['distrito']; ?></option>
                                            <?php endforeach ?>
				                            </select>
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Dirección</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-map-marker"></i>
											<input type="text" name="direccion" class="form-control" value="">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Puesto</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-suitcase"></i>
											<input type="text" name="puesto" class="form-control" value="">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Sueldo</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-money"></i>
											<input type="text" name="cuotas" class="form-control" value="">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Correo</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-envelope"></i>
											<input type="email" name="correo" class="form-control" value="" required="required">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Teléfono</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-phone"></i>
											<input type="text" name="correo_control" class="form-control" value="" required="required">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Sexo</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-sliders"></i>
											<select class="form-control" name="sexo" required>
                                                <option value="-1"></option>
                                                <option value="M">Masculino</option>
                                                <option value="F">Femenino</option>
				                            </select>
										</div>
									</div>
								</div>
                                <h4 style="text-align:center;"><strong>Datos de Acceso</strong></h4>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> DNI/ Usuario</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-user"></i>
											<input type="text" name="usuario" class="form-control" value="" required="required">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Contraseña</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-lock"></i>
											<input name="password" type="password" class="form-control" required="required"/>
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Nivel</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-puzzle-piece"></i>
											<select class="form-control" name="nivel">
                                            <option value="-1"></option>
                                            <option value="empleado">Técnico / Empleado</option>
                                            <?php if($this->session->userdata('nivel')=='admin_sup') { ?>
                                            <option value="admin">Administrador</option>
                                            <option value="admin_sup">Super Administrador</option>
                                            <?php } ?>
				                            </select>
										</div>
									</div>
								</div>
                                <div class="form-group">
									<div class="col-md-offset-2 col-md-10">
										<input type="hidden" name="responsable" value="<?php echo $this->session->userdata('nombre') ?>" />
                                        <input type="submit" class="btn blue" value="Ingresar usuario">
                                        
									</div>
								</div>
							</form>