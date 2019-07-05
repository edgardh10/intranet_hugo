<form class="form-horizontal" method="post" name="generar_factura" action="<?php echo base_url();?>gestion/actualizar_venta/<?php echo $venta['ventasID']; ?>">
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Nombre</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-user"></i>
											<input type="text" class="form-control" name="v_nombre" value="<?php echo $venta['v_nombre']; ?>">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Apellido</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-user"></i>
											<input type="text" name="v_apellido" class="form-control" value="<?php echo $venta['v_apellido']; ?>">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> DNI</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-credit-card"></i>
											<input type="text" name="v_dni" class="form-control" value="<?php echo $venta['v_dni']; ?>">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Teléfono</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-phone"></i>
											<input type="text" name="v_telefono" class="form-control" value="<?php echo $venta['v_telefono']; ?>">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Dirección</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-map-marker"></i>
											<input type="text" name="v_direccion" class="form-control" value="<?php echo $venta['v_direccion']; ?>">
										</div>
									</div>
								</div>
                                <?php if($venta['v_visita']=='si'){ ?>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Facilidades</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-suitcase"></i>
											<select class="form-control" name="v_facilidades">
                                            <option value="<?php echo $venta['v_facilidades']; ?>" selected="selected"><?php echo ucfirst($venta['v_facilidades']); ?> hay facilidades</option>
                                            <?php if($venta['v_facilidades']=='no'){ ?>
                                            <option value="si">Si hay facilidades</option>
                                            <?php } else { ?>
                                            <option value="no">No hay facilidades</option>
                                            <?php } ?>
				                            </select>
										</div>
									</div>
								</div>
                                <input type="hidden" name="v_visita" value="<?php echo $venta['v_visita']; // envia si es una visita de venta ?>" />
                                	<?php if($venta['v_facilidades']=='no'){ ?>
                                    <input type="hidden" name="v_fecha_visita" value="<?php echo $venta['v_fecha_visita']; ?>" />
                                <?php }} else { // envia si es una venta nueva ?>
                                <input type="hidden" name="v_facilidades" value="<?php echo $venta['v_facilidades']; ?>" />
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Visita</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-suitcase"></i>
											<select class="form-control" name="v_visita">
                                            <option value="<?php echo $venta['v_visita']; ?>" selected="selected"><?php echo ucfirst($venta['v_visita']); ?> Visitar</option>
                                            <?php if($venta['v_visita']=='no'){ ?>
                                            <option value="si">Si Visitar</option>
                                            <?php } else { ?>
                                            <option value="no">No Visitar</option>
                                            <?php } ?>
				                            </select>
										</div>
									</div>
								</div>
                                
                                <div class="form-group">
									<label for="inputEmail1" class="col-md-4 control-label"> Fecha de Visita</label>
									<div class="col-md-4 input-group">
                                    <span class="input-group-addon">
                                    	<i class="fa fa-calendar"></i>
                                    </span>
										<input type="text" name="v_fecha_visita" value="<?php echo $venta['v_fecha_visita']; ?>" class="form-control form-control-inline input-medium date-picker todo-taskbody-due" placeholder="__/__/____">
									</div>
								</div>
                                <?php } if($venta['v_facilidades']=='si'){ ?>
                                
                                <div class="form-group">
									<label for="inputEmail1" class="col-md-4 control-label"> Fecha de Instalación</label>
									<div class="col-md-4 input-group">
                                    <span class="input-group-addon">
                                    	<i class="fa fa-calendar"></i>
                                    </span>
										<input type="text" name="v_fecha_visita" value="<?php echo $venta['v_fecha_visita']; ?>" class="form-control form-control-inline input-medium date-picker todo-taskbody-due" placeholder="__/__/____">
									</div>
								</div>
                                <?php } if ($this->session->userdata('nivel') == 'admin_sup') { ?>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Asignar a</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-suitcase"></i>
											<select class="form-control" name="v_tecnicoID">
                                            <?php foreach($usuarios as $fila):  ?>
                                            	<option value="<?php echo $fila['usuarioID']; ?>" <?php if($venta['v_tecnicoID']== $fila['usuarioID']){ echo 'selected="selected"';} ?>><?php echo $fila['nombre']; ?> <?php echo $fila['apellido']; ?></option>
                                            <?php endforeach ?>
				                            </select>
										</div>
									</div>
								</div>
								<?php } else { ?>
								<input type="hidden" name="v_tecnicoID" value="<?php echo $venta['v_tecnicoID']; ?>">
								<?php } ?>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Comentario</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-chat"></i>
											<textarea name="v_comentario" class="form-control" rows="4"><?php echo $venta['v_comentario']; ?></textarea>
										</div>
									</div>
								</div>
                                <?php if($venta['v_visita']=='si'){ ?>
                                <input type="hidden" name="v_estado" value="cerrado" >                                
                                <?php } else { if($venta['v_estado']=='abierto'){ ?>
                                <input type="hidden" name="v_estado" value="proceso" >
                                <?php } else { ?>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Estado de la Venta</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-suitcase"></i>
											<select class="form-control" name="v_estado">
                                            <option value="<?php echo $venta['v_estado']; ?>" selected="selected">Venta en <?php echo ucfirst($venta['v_estado']); ?></option>
                                            <option value="cerrado">Cerrar venta</option>

				                            </select>
										</div>
									</div>
								</div>
                                <?php }} ?>
                                <?php if($venta['v_facilidades']=='si'){ ?>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Instalado</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-suitcase"></i>
											<select id="instalar" class="form-control" name="v_instalado" onchange="instalar()">
                                            <option value="<?php echo $venta['v_instalado']; ?>"><?php echo ucfirst($venta['v_instalado']); ?></option>
                                            <?php if($venta['v_instalado']=='no'){ ?>
                                            <option value="si">Si</option>
                                            <?php } else { ?>
                                            <option value="no">No</option>
                                            <?php } ?>
				                            </select>
										</div>
									</div>
								</div>

								<div id="pase_cliente" style="display: none;">
									<div class="form-group">
										<label for="inputEmail12" class="col-md-4 control-label"> Correo</label>
										<div class="col-md-7">
											<div class="input-icon">
												<i class="fa fa-envelope"></i>
												<input type="text" name="correo" class="form-control" value="">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail12" class="col-md-4 control-label"> Correo Control</label>
										<div class="col-md-7">
											<div class="input-icon">
												<i class="fa fa-envelope"></i>
												<input type="text" name="correo_control" class="form-control" value="">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail12" class="col-md-4 control-label"> Mensualidad</label>
										<div class="col-md-7">
											<div class="input-icon">
												<i class="fa fa-money"></i>
												<input type="text" name="correo" class="form-control" value="">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail12" class="col-md-4 control-label"> Sexo</label>
										<div class="col-md-7">
											<div class="input-icon">
												<i class="fa fa-life-ring"></i>
												<select class="form-control" name="sexo">
		                                            <option value="-1">Seleccione</option>
		                                            <option value="M">Masculino</option>
		                                            <option value="F">Femenino</option>
					                            </select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail12" class="col-md-4 control-label"> Distrito</label>
										<div class="col-md-7">
											<div class="input-icon">
												<i class="fa fa-map"></i>
												<select class="form-control" name="sexo">
		                                            <option value="-1">Seleccione</option>
		                                            <option value="M">Masculino</option>
		                                            <option value="F">Femenino</option>
					                            </select>
											</div>
										</div>
									</div>
								</div>

                                <?php } else { ?>
                                    <input type="hidden" name="v_instalado" value="no" />
									<?php } ?>
								
								
                                <div class="form-group">
									<div class="col-md-offset-2 col-md-10">
                                    
                                    
                                    
										<input type="hidden" name="ventasID" value="<?php echo $venta['ventasID']; ?>" />
                                        <input type="submit" class="btn blue" value="Actualizar Venta">
                                        
									</div>
								</div>
							</form>