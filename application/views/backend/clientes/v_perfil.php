<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<?php include 'perfil/perfil_title.php'; ?>
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row profile">
				<div class="col-md-12">
                	<?php
                        $mensaje = $this->session->flashdata('mensaje');
						if ($mensaje) {// alerta para cuando editamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡Imagen actualizada correctamente!</strong>.
						</div>
					<?php } ?>

					<?php
                        $success = $this->session->flashdata('success');
						if ($success) {// alerta para cuando editamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡La Imagen se ha subido correctamente!</strong>.
						</div>
					<?php } ?>

					<?php
                        $success = $this->session->flashdata('delete_image');
						if ($success) {// alerta para cuando editamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡La Imagen se ha borrado correctamente!</strong>.
						</div>
					<?php } ?>
					<!--BEGIN TABS-->
					<div class="tabbable tabbable-custom tabbable-noborder">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab_1_1" data-toggle="tab">Perfil</a></li>
							<li><a href="#tab_1_3" data-toggle="tab">Cuenta</a></li>
							<?php if($row['control']!='retirado') { ?><li><a href="#tab_1_4" data-toggle="tab">Generar Factura</a></li>
							
							<li><a id="pulsate1" href="#tab_soporte" data-toggle="tab">Ticket de Soporte</a></li>
							<li><a id="pulsate2" href="#tab_geolocalizacion" data-toggle="tab">Geolocalización</a></li>
							<?php } ?>
							<li><a href="#tab_1_6" data-toggle="tab">Detalles de conexión</a>
							</li>
						</ul>
						<div class="tab-content">
							
							<!--tab_1_1-->
							<?php include 'perfil/tab_perfil.php' ?>

							<!--tab_1_3-->
							<?php include 'perfil/tab_cuenta.php' ?>

							<div class="tab-pane" id="tab_soporte">
								<div class="portlet light">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-cogs font-green-sharp"></i>
											<span class="caption-subject font-green-sharp bold uppercase">Soporte para <?= $title; ?></span>
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse"></a>
											<a href="javascript:;" class="remove"></a>
										</div>
									</div>
									<div class="portlet-body">
										<form class="form-horizontal" method="post" action="<?php echo base_url();?>gestion/agregado/<?=$row['usuarioID'] ?>">
											<div class="form-group">
												<label class="col-md-2 control-label">Cliente</label>
												<div class="col-md-4 input-group">
													<span class="input-group-addon">
			                                            <i class="fa fa-users"></i>
			                                        </span>
			                                        <select name="s_cliente" class="form-control" disabled>
			                                            <option value="<?php echo $row['usuario'] ?>"><?php echo $row['nombre'] ?> <?php echo $row['apellido'] ?></option>
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
			                                            <?php foreach ($usuarios as $usr): ?>
			                                            <option value="<?php echo $usr['usuarioID'] ?>"><?php echo $usr['nombre'] ?> <?php echo $usr['apellido'] ?></option>
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
													<input type="hidden" name="s_cliente" value="<?php echo $row['usuario']; ?>">
			                                    	<input type="hidden" name="procesar" value="1">
													<input type="submit" class="btn green" value="Ingresar nuevo soporte">
												</div>
											</div>
											
										</form>
									</div>
								</div>
							</div>

							<div class="tab-pane" id="tab_geolocalizacion">
								<h3>Geolocalizacion de clientes</h3>
								<div class="wrap-map">
								<div id="map">
							      <div id="map_canvas"></div>
							      <div id="crosshair"></div>
							      <div class="form">
							          <ul>
							            <li><input class="form-control" type="text" id="address" placeholder="Escribe aquí tu lugar..." value="" class="input" /></li>
							            <li><input type="button" value="Buscar" onclick="geocode()" class="button btn btn-info" /></li>
							            <li><input type="button" value="Insertar marcador" onclick="addMarkerAtCenter()" class="button btn btn-danger" /></li>
							            <li>
							            	<form id="form_geoposition" method="post" action="<?php echo base_url();?>geolocalizacion/coords_user/<?php echo $row['usuarioID']; ?>">
							            		<input type="hidden" id="mgs_lat" name="user_lat" value="">
							            		<input type="hidden" id="mgs_lng" name="user_lng" value="">
							            		<input class="btn btn-success" type="submit" value="Guardar Posición">
							            	</form>
							            </li>
							            
							          </ul>
							        
							      </div>
							      <div class="coordinates">
							        <em class="lat">Latitud</em>
							        <em class="lon">Longitud</em>
							        <input type="text" id="lat" onclick="select()" />
									<input type="text" id="lng" onclick="select()" />
							      </div>
							      <div class="address">
							        <span id="formatedAddress">...</span>
							      </div>							      
								</div>
							</div>
							<div class="clearfix"></div>
						      <div>
						      	<button id="map_clear" class="btn btn-default pull-right">Limpiar mapa</button>
						      </div>
						      <div class="clearfix"></div>
							</div>

							<!--end tab-pane-->
							<div class="tab-pane" id="tab_1_4">
								<div class="row">
									<div class="col-md-12">
										
                                        <div class="portlet-body">
                        <div class="alert alert-warning alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								Generar Factura para <strong><?php echo $row['nombre'];?> <?php echo $row['apellido'];?></strong>
							</div>

							<hr>
                            
							<form class="form-horizontal" method="post" name="generar_factura" action="<?php echo base_url();?>clientes/individual">
								<div class="form-group">
									<label for="inputEmail1" class="col-md-2 control-label">Fecha de Vencimiento</label>
									<div class="col-md-4 input-group">
                                    <span class="input-group-addon">
                                    	<i class="fa fa-calendar"></i>
                                    </span>
										<input type="text" name="fecha_vencimiento" class="form-control form-control-inline input-medium date-picker todo-taskbody-due" readonly>
									</div>
								</div>
                                <div class="form-group">
										<label class="control-label col-md-2">Mes a Facturar</label>
										<div class="col-md-4">
											<div class="input-group input-medium date date-picker" data-date="<?php echo date('m/Y') ?>" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
												<input type="text" name="mes" class="form-control" readonly>
												<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<!-- /input-group -->
											<span class="help-block">
											Solamente mes y año </span>
										</div>
									</div>
                                    <div class="form-group">
										<label class="control-label col-md-2">Comentario</label>
										<div class="col-md-4">
											<div class="">
                                            	<textarea class="form-control" rows="3" name="mensaje" placeholder="Comentario breve al cliente..."></textarea>
												</div>
										</div>
									</div>
								<div class="form-group">
									<div class="col-md-offset-2 col-md-10">
                                    	<input type="hidden" name="referencia" value="FAC-<?php // traemos la ultima referencia o factura
										$query = $this->db->query("SELECT referencia FROM pagos ORDER BY pagosID DESC LIMIT 0,1");
										if ($query->num_rows() > 0){
										$linea = $query->row();
										$ultimo = $linea->referencia;
										echo substr($ultimo,4)+5;// traemos la ultima referencia y lo agregamos 5
										} else {echo 1001;}?>"/>
                                        <input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID'];?>" />
                                        <input type="hidden" name="cuota" value="<?php echo $row['cuotas'];?>" />                                        
                                        <input type="hidden" name="generar" value="generar" />  
										<input type="submit" class="btn blue" value="Generar Factura">
                                        
									</div>
								</div>
							</form>
							<hr>
							
						</div>
									</div>
								</div>
							</div>
							<!--end tab-pane-->
							<div class="tab-pane" id="tab_1_6">
								<div class="row">
									<div class="col-md-3">
										<ul class="ver-inline-menu tabbable margin-bottom-10">
											<li class="active"><a data-toggle="tab" href="#tab_1"><i class="icon-directions"></i> Torre </a>
												<span class="after"></span>
											</li>
											<li><a data-toggle="tab" href="#tab_2"><i class="fa fa-signal"></i> Transmisor </a></li>
											<li><a data-toggle="tab" href="#tab_3"><i class="fa fa-rss"></i>  Radio</a></li>
										</ul>
									</div>
									<div class="col-md-9">
										<div class="tab-content">
											<div id="tab_1" class="tab-pane active" style="text-align:center;"	>
												<?php if($torre['torre']==NULL){ ?>
                                                <!-- COMIENZA LA ASIGNACION DE TORRE -->
                                                <div class="tabbable tabs-left">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#tab_4_1" data-toggle="tab" aria-expanded="true"> Torre </a></li>
                                                        <li class=""><a href="#tab_4_2" data-toggle="tab" aria-expanded="false"> Agregar </a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active in" id="tab_4_1">
                                                            <div class="alert alert-warning alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                            <h2>Este cliente no tiene asignado una torre.</h2>
                                                            <p>Haga clic en <strong>agregar</strong> para asignarle una Torre a este cliente.</p>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tab_4_2">
                                                            <div class="well"> Elija de la lista de torres una que pertenezca a este cliente.</div>
                                                          <form method="post" action="<?php echo base_url(); ?>clientes/asignar_torre/<?php echo $row['usuarioID']; ?>">
												<div class="form-group">
													<label class="control-label col-md-3">Lista de torres</label>
													<div class="col-md-9">
														<select class="form-control select2_category" name="torreID">
															<option value="">Seleccionar...</option>
                                                            <?php foreach($torres as $torr): ?>
                                                            <?php if($row['distritoID']==$torr['distritoID']){ ?>
                                                          <option value="<?php echo $torr['torreID']; ?>"><?php echo $torr['torre']; ?> ➟ <?php echo $torr['distrito']; ?></option>
                                                          <?php } ?>
                                                            <?php endforeach ?>
														</select>
													</div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">&nbsp;</label>
													<div class="col-md-9">
                                                    <br />
													<input type="submit" value="Asignar Torre" class="btn grey-cascade" />
													</div>
												</div>
                                                			<!--<input type="hidden" name="asignado" value="1" />-->
                                                            <input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID']; ?>" />
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- TERMINA LA ASIGNACION DE TORRE -->
                                                <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>cargas/img/tower.png" alt="Torre de transmision" width="100" />
                                                <h2><?php echo $torre['torre']; ?> ➟ <?php echo $torre['distrito']; ?> </h2>
                                                <div class="well">Para cambiar de torre al cliente, primero desvinculelo de la torre actual
                                                <form method="post" action="<?php echo base_url(); ?>clientes/asignar_torre/<?php echo $row['usuarioID']; ?>">
                                                <input type="hidden" name="torreID" value="" />
                                                <input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID']; ?>" />
                                                <input type="submit" value="Desvincular" class="btn grey-cascade" />
                                                </form>
                                                </div>
                                                
                                                <?php } ?>
											</div>
											<div id="tab_2" class="tab-pane">
                                            	<?php if($transmisor['equiposID']==NULL) { ?>
                                                <!-- COMIENZA LA ASIGNACION DE TRANSMISOR -->
                                                <div class="tabbable tabs-left">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#tab_5_1" data-toggle="tab" aria-expanded="true"> Equipo </a></li>
                                                        <li class=""><a href="#tab_5_2" data-toggle="tab" aria-expanded="false"> Agregar </a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active in" id="tab_5_1">
                                                            <div class="alert alert-warning alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                            <h2>No hay Equipo Transmisor</h2>
                                                            <p>Haga clic en <strong>agregar</strong> para asignarle un equipo a este cliente.</p>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tab_5_2">
                                                            <div class="well"> Elija de la lista un equipo disponible del almacén para asignarle a este cliente.</div>
                                                          <form method="post" action="<?php echo base_url(); ?>clientes/asignar_transmisor/<?php echo $row['usuarioID']; ?>">
												<div class="form-group">
													<label class="control-label col-md-3">Transmisores en Almacén</label>
													<div class="col-md-9">
														<select class="form-control select2_category" name="equiposID">
															<option value="">Seleccionar...</option>
                                                            <?php foreach($transmisores as $trans): ?>
                                                          <option value="<?php echo $trans['equiposID']; ?>"><?php echo $trans['mac']; ?> ➟ <?php echo $trans['marca']; ?></option>
                                                            <?php endforeach ?>
														</select>
													</div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">&nbsp;</label>
													<div class="col-md-9">
                                                    <br />
													<input type="submit" value="Asignar Transmisor" class="btn grey-cascade" />
													</div>
												</div>
                                                			<input type="hidden" name="asignado" value="1" />
                                                            <input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID']; ?>" />
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- TERMINA LA ASIGNACION DE TRANSMISOR -->
                                                <?php } else { ?>
												<div class="timeline-item">
							<div class="timeline-badge">
								<img class="timeline-badge-userpic" src="<?php echo base_url(); ?>cargas/img/transmisor.png" alt="radio" width="150"  />
							</div>
							<div class="timeline-body">
								<div class="timeline-body-arrow">
								</div>
								<div class="timeline-body-head">
									<div class="timeline-body-head-caption">
										<span class="timeline-body-alerttitle font-red-intense"><h2>Equipo Transmisor Asignado</h2></span><br />
										
                                        <span class="timeline-body-alerttitle font-red-intense">Numero de Serie:</span>
										<span class="timeline-body-time font-grey-cascade"><?php echo $transmisor['numSerie']; ?></span><br />
                                        <span class="timeline-body-alerttitle font-red-intense">Marca:</span>
										<span class="timeline-body-time font-grey-cascade"><?php echo $transmisor['marca']; ?></span><br />
                                        <span class="timeline-body-alerttitle font-red-intense">Fecha de Compra:</span>
										<span class="timeline-body-time font-grey-cascade"><?php echo $transmisor['fechaCompra']; ?></span><br />
                                        <span class="timeline-body-alerttitle font-red-intense">N° MAC Asignado:</span>
										<span class="timeline-body-time font-grey-cascade"><?php echo $transmisor['mac']; ?></span><br />
                                        <span class="timeline-body-alerttitle font-red-intense">Proveedor:</span>
										<span class="timeline-body-time font-grey-cascade"><?php echo $transmisor['proveedor']; ?></span><br />
									</div>
									<div class="timeline-body-head-actions">
										<div class="btn-group">
											<button class="btn btn-circle grey-salsa btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
											Acciones <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right" role="menu">
												<li>
                                                <form method="post" action="<?php echo base_url(); ?>clientes/asignar_transmisor/<?php echo $row['usuarioID']; ?>">
												<input type="hidden" name="equiposID" value="<?php echo $transmisor['equiposID']; ?>" />
                                                <input type="hidden" name="asignado" value="0" />
                                                <input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID']; ?>" />
                                                <input type="hidden" name="volver" value="1" />
                                                <input type="submit" value="Volver a almacen" class="btn grey-cascade" />
                                            </form>
                                                
                                                </li>
                                                <li class="divider"></li>
											</ul>
										</div>
									</div>
								</div>
								<!--<div class="timeline-body-content">
									<span class="font-grey-cascade">
									You have new follower <a href="javascript:;">Ivan Rakitic</a>
									</span>
								</div>-->
							</div>
						</div>
												
                                                <?php } ?>
                                            </div>
											<div id="tab_3" class="tab-pane">
                                            	<?php if($radio['equiposID']==NULL) { ?>
                                                <!-- COMIENZA LA ASIGNACION DE RADIO -->
                                                <div class="tabbable tabs-left">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#tab_6_1" data-toggle="tab" aria-expanded="true"> Equipo </a></li>
                                                        <li class=""><a href="#tab_6_2" data-toggle="tab" aria-expanded="false"> Agregar </a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active in" id="tab_6_1">
                                                            <div class="alert alert-warning alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                            <h2>No hay Equipo Radio</h2>
                                                            <p>Haga clic en <strong>agregar</strong> para asignarle un equipo a este cliente.</p>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tab_6_2">
                                                            <div class="well"> Elija de la lista un equipo disponible del almacén para asignarle a este cliente.</div>
                                                          <form method="post" action="<?php echo base_url(); ?>clientes/asignar_radio/<?php echo $row['usuarioID']; ?>">
												<div class="form-group">
													<label class="control-label col-md-3">Radios en Almacén</label>
													<div class="col-md-9">
														<select class="form-control select2_category" name="mac">
															<option value="">Seleccionar...</option>
                                                            <?php foreach($radios as $rad): ?>
                                                          <option value="<?php echo $rad['mac']; ?>"><?php echo $rad['mac']; ?> ➟ <?php echo $rad['marca']; ?></option>
                                                            <?php endforeach ?>
														</select>
													</div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">&nbsp;</label>
													<div class="col-md-9">
                                                    <br />
													<input type="submit" value="Asignar Radio" class="btn grey-cascade" />
													</div>
												</div>
                                                			<input type="hidden" name="asignado" value="1" />
                                                            <input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID']; ?>" />
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- COMIENZA LA ASIGNACION DE RADIO -->
												<?php } else { ?>
                                                
												<div class="timeline-item">
							<div class="timeline-badge">
								<img class="timeline-badge-userpic" src="<?php echo base_url(); ?>cargas/img/radio.png" alt="radio" width="150"  />
							</div>
							<div class="timeline-body">
								<div class="timeline-body-arrow">
								</div>
								<div class="timeline-body-head">
									<div class="timeline-body-head-caption">
										<span class="timeline-body-alerttitle font-red-intense"><h2>Equipo Radio Asignado</h2></span><br />
										
                                        <span class="timeline-body-alerttitle font-red-intense">Numero de Serie:</span>
										<span class="timeline-body-time font-grey-cascade"><?php echo $radio['numSerie']; ?></span><br />
                                        <span class="timeline-body-alerttitle font-red-intense">Marca:</span>
										<span class="timeline-body-time font-grey-cascade"><?php echo $radio['marca']; ?></span><br />
                                        <span class="timeline-body-alerttitle font-red-intense">Fecha de Compra:</span>
										<span class="timeline-body-time font-grey-cascade"><?php echo $radio['fechaCompra']; ?></span><br />
                                        <span class="timeline-body-alerttitle font-red-intense">N° MAC Asignado:</span>
										<span class="timeline-body-time font-grey-cascade"><?php echo $radio['mac']; ?></span><br />
                                        <span class="timeline-body-alerttitle font-red-intense">Proveedor:</span>
										<span class="timeline-body-time font-grey-cascade"><?php echo $radio['proveedor']; ?></span><br />
									</div>
									<div class="timeline-body-head-actions">
										<div class="btn-group">
											<button class="btn btn-circle grey-salsa btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
											Acciones <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right" role="menu">
												<li>
                                            <form method="post" action="<?php echo base_url(); ?>clientes/asignar_radio/<?php echo $row['usuarioID']; ?>">
												<input type="hidden" name="mac" value="<?php echo $radio['mac']; ?>" />
                                                <input type="hidden" name="asignado" value="0" />
                                                <input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID']; ?>" />
                                                <input type="hidden" name="volver" value="1" />
                                                <input type="submit" value="Volver a almacen" class="btn grey-cascade" />
                                            </form>
                                                
                                                
                                                
                                                </li>
                                                <li class="divider"></li>
											</ul>
										</div>
									</div>
								</div>
								<!--<div class="timeline-body-content">
									<span class="font-grey-cascade">
									You have new follower <a href="javascript:;">Ivan Rakitic</a>
									</span>
								</div>-->
							</div>
						</div>
                        						
                                                <?php } ?>
                        <!-- fin de datos de torre -->
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--end tab-pane-->
						</div>
					</div>
					<!--END TABS-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->