<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1><?php echo $row['nombre'];?> <?php echo $row['apellido'];?> <small>Detalle del Cliente</small></h1>
                 <?php
                        $asignar = $this->session->flashdata('asignar');
						if ($asignar) {// alerta para cuando editamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡La Modificación se ha realizado correctamente!</strong>.
						</div>
						<?php } ?>
                        <?php
                        $pass = $this->session->flashdata('pass');
						if ($pass) {// alerta para cuando editamos la contraseña ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡La clave se ha cambiado correctamente!</strong>.
						</div>
						<?php } ?>
                        <?php
                        $factura = $this->session->flashdata('factura');
						if ($factura) {// alerta para cuando editamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡La factura se ha creado correctamente!</strong>.
						</div>
						<?php } ?>
			</div>
			<!-- END PAGE TITLE -->
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
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									<div class="col-md-3">
										<ul class="list-unstyled profile-nav">
											<li><?php if($row['foto_perfil']==''){ ?><img src="<?php echo base_url();?>cargas/img/<?php echo $row['sexo'];?>.jpg" class="img-responsive" alt=""/><?php } else { ?><img src="<?php echo base_url();?>cargas/perfil/cliente/<?php echo $row['foto_perfil']; ?>" class="img-responsive" /><?php } ?><a class="profile-edit" href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/subir_img/<?php echo $row['usuarioID']; ?>');" title="Editar">editar</a></li>
											<li><a href="mailto:<?php echo $row['correo'];?>"><strong>Correo:</strong> <?php echo $row['correo'];?></a></li>
											<li><a href="javascript:;"><strong>Plan:</strong> S/. <?php echo $row['cuotas'];?></a></li>
                                            <li id="desplega_opciones"><a><strong>Estado:</strong> <b style="color:<?php if($row['control']=='activado'){echo 'green;';} elseif($row['control']=='cortado'){echo 'orange;';} elseif($row['control']=='retirado'){echo 'red;';} ?>"><?php if($row['control']=='activado'){echo 'Cliente Activo';} elseif($row['control']=='cortado'){echo 'Servicio Cortado';} elseif($row['control']=='retirado'){echo 'Cliente Retirado';} ?></b> </a></li>
                                            <li class="alert alert-warning hide" id="opciones_desactivacion">
                                            	
                                            	<form method="post" action="<?php echo base_url(); ?>clientes/cambiar_estado/<?= $row['usuarioID']; ?>">
                                            		<div class="form-group">
													<label class="col-md-12"><strong>Cambiar estado:</strong></label>
													<div class="col-md-12">
														<div class="radio-list">
															<label><input type="radio" name="control" value="activado" data-title="Activado" <?php if ($row['control']=='activado') {echo 'checked';
															} ?>/> Activado </label>		
															<label><input type="radio" name="control" value="cortado" data-title="Cortado" <?php if ($row['control']=='cortado') {echo 'checked';
															} ?>/> Cortado </label>
															<label><input type="radio" name="control" value="retirado" data-title="Retirado" <?php if ($row['control']=='retirado') {echo 'checked';
															} ?>/> Retirado </label>
														</div>
														<div id="form_gender_error">
														</div>
													</div>
												</div>
												<input class="btn btn-warning" type="submit" value="Cambiar estado">
                                            	</form>


                                            </li>
											<li><a href="javascript:;"><strong>Cliente desde:</strong> <?php echo $row['fechaInst'];?> <span><i class="fa fa-check"></i> </span></a>
											</li>
                                            <?php if($row['control']=='retirado'){ ?>
                                            	<?php if($this->session->userdata('nivel')=='admin_sup'){ ?>
                                            <li><a class="btn grey-cascade" href="#" onclick="confirm_modal('<?php echo base_url(); ?>modal/eliminar_cliente/<?php echo $row['usuarioID']; ?>');" title="Eliminar"><i class="fa fa-trash"></i> Eliminar del sistema</a></li>
                                            <?php }} ?>
										</ul>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-8 profile-info">
												<h1><?php echo $row['nombre'];?> ➟ DNI: <?php echo $row['usuario'];?> </h1>
												<p>A este cliente se le instalo el servicio el <?php echo $row['fechaInst'];?> y su domicilio queda en <?php echo $row['direccion'];?>, distrito de <?php echo $row['distrito'];?></p>
												<!--<p><a href="javascript:;">www.mywebsite.com </a></p>-->
												<ul class="list-inline">
													<li><i class="fa fa-map-marker"></i> <?php echo $row['distrito'];?></li>
													<li><i class="fa fa-calendar"></i> <?php echo $row['fechaInst'];?></li>
													<!--<li><i class="fa fa-briefcase"></i> Design</li>
													<li><i class="fa fa-star"></i> Top Seller</li>
													<li><i class="fa fa-heart"></i> BASE Jumping</li>-->
												</ul>
											</div>
											<!--end col-md-8-->
											<div class="col-md-4">
												<div class="portlet sale-summary">
													<div class="portlet-title">
														<div class="caption">Teléfonos de Contacto</div>
														<div class="tools"><a class="reload" href="javascript:;"></a></div>
													</div>
													<div class="portlet-body">
														<ul class="list-unstyled">
															<?php foreach($telefonos as $tel): ?>
                                                            <li><span class="sale-info"><?php switch($tel['tel_operador']){
																case 'm':
																	echo 'Movistar';
																	break;
																case 'rpm':
																	echo 'RPM';
																	break;
																case 'c':
																	echo 'Claro';
																	break;
																case 'rpc':
																	echo 'RPC';
																	break;
																case 'f':
																	echo 'Fijo';
																	break;
																case 'b':
																	echo 'Bitel';
																	break;
																case 'e':
																	echo 'Entel';
																	break;
																default:
																	echo "No hay telefono";
																} ?> <i class="fa fa-img-up"></i></span>
																<span class="sale-num"><a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/modal_actualizar_telefono/<?php echo $row['usuarioID']; ?>/<?php echo $tel['telefonoID']; ?>');" title="Editar"><?php echo $tel['tel_telefono']; ?></a> <a class="btn grey-cascade" href="#" onclick="confirm_modal('<?php echo base_url(); ?>modal/eliminar_telefono/<?php echo $tel['telefonoID']; ?>/<?php echo $row['usuarioID']; ?>');" title="Eliminar"><i class="fa fa-trash"></i></a></span>
															</li>
                                                            <?php endforeach ?>
														</ul>
                                                        	
													</div>
												</div>
                                                <a class="btn default pull-right" href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/modal_agregar_telefono/<?php echo $row['usuarioID']; ?>');" title="Editar"><i class="fa fa-phone"></i> Agregar</a>
                                                <?php 
                        $agregar = $this->session->flashdata('agregar');
						if ($agregar) { ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡Telefono agregado!</strong>
						</div>
						<?php } ?>
                        <?php
                        $editar = $this->session->flashdata('editar');
						if ($editar) {// alerta para cuando editamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡Telefono Editado!</strong>.
						</div>
						<?php } ?>
                        <?php
                        $eliminar = $this->session->flashdata('eliminar');
						if ($eliminar) {// alerta para cuando eliminamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡Telefono eliminado!</strong>
						</div>
						<?php } ?>
											</div>
											<!--end col-md-4-->
										</div>
										<!--end row-->
										<div class="tabbable tabbable-custom tabbable-custom-profile">
											<ul class="nav nav-tabs">
												<li class="active"><a href="#tab_1_11" data-toggle="tab">Facturas Pendientes </a></li>
												<li><a href="#tab_1_22" data-toggle="tab">Soporte </a></li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane active" id="tab_1_11">
													<div class="portlet-body">
														<table class="table table-striped table-bordered table-advance table-hover" id="facturas_perfil">
														<thead>
                                                        <tr>
															<th></th>
                                                            <th><i class="fa fa-briefcase"></i>Referencia</th>
															<th class="hidden-xs"><i class="fa fa-bookmark"></i>Descripción</th>
															<th><i class="fa fa-credit-card"></i>Transf. Bancaria</th>
															<th><i class="fa fa-money"></i>Cantidad</th>
															<th><i class="fa fa-calendar"></i>Fecha Vencimiento</th>
															<th><i class="fa fa-calendar-o"></i>Fecha de Pago</th>
															<th></th>
														</tr>	
														</thead>
														<tbody>
														<?php $i=1; foreach($facturas as $fac):// facturas de los clientes ?>
                                                        <tr>
															<td> <?php echo $i++;?></td>
                                                            <td><a href="<?php echo base_url();?>facturas/actualizar/<?php echo $fac['pagosID']; ?>"><?php echo 'FAC-' . $fac['pagosID']; ?> </a></td>
															<td class="hidden-xs"> Pago correspondite por el mes de <?php echo $fac['mes'];?></td>
															<td>#<?php echo $fac['ope']; ?></td>
                                                            <td> <?php echo $fac['moneda']; ?><?php echo $fac['cuota']; ?> <br /><span class="label label-<?php if($fac['estado']=='pagado'){echo 'success';} elseif($fac['estado']=='pendiente'){echo 'warning';} elseif($fac['estado']=='inpago'){echo 'danger';}; ?> label-sm"> <?php echo ucfirst($fac['estado']); ?> </span></td>
                                                            <td> <?php echo $fac['fecha_vencimiento']; ?></td>
                                                            <td> <?php echo $fac['fecha_pago']; ?></td>
															<td><a class="btn default btn-xs <?php if($fac['estado']=='pagado'){echo 'green';} elseif($fac['estado']=='pendiente'){echo 'yellow';} elseif($fac['estado']=='inpago'){echo 'red';}; ?>-stripe" href="<?php echo base_url();?>facturas/detalle/<?php echo $fac['pagosID']; ?>">Ver </a></td>
														</tr>
                                                        <?php endforeach ?>
														</tr>
														</tbody>
														</table>
													</div>
												</div>
												<!--tab-pane-->
												<div class="tab-pane" id="tab_1_22">
													<div class="tab-pane active" id="tab_1_1_1">
														<div class="clearfix"></div>
														<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">

															<ul class="feeds">
                                                            <?php $dir = 1; foreach($soporte as $sop): ?>
                                                            	<?php if($row['usuario']===$sop['s_cliente']) { ?>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-<?php if($sop['s_estado']=='cerrado'){ echo 'success';} elseif($sop['s_estado']=='abierto'){ echo 'danger';} elseif($sop['s_estado']=='proceso'){ echo 'warning';} ?>">
																					<i class="fa fa-bell-o"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc"> <?php echo $sop['s_problema']; ?> &nbsp;<span class="label label-<?php if($sop['s_estado']=='cerrado'){ echo 'success';} elseif($sop['s_estado']=='abierto'){ echo 'danger';} elseif($sop['s_estado']=='proceso'){ echo 'warning';} ?> label-sm"> <a class="set_hover_info" data-dir="dir_hover_<?= $dir;  ?>" style="color:white;" href="<?php echo base_url(); ?>gestion/actualizar/<?php echo $sop['soporteID']; ?>">Verificar <i class="fa fa-<?php if($sop['s_estado']=='cerrado'){ echo 'check';} elseif($sop['s_estado']=='abierto'){ echo 'share';} elseif($sop['s_estado']=='proceso'){ echo 'spinner';} ?>"></i></a>
																					</span>
																					<div id="dir_hover_<?= $dir;  ?>" class="hover_soporte">
																						
																						<h3>Información Técnica</h3>
																						<div class="info_soporte">

																							<?php foreach ($usuarios as $usx) {
																								if ($usx['usuarioID'] == $sop['s_tecnico']) {
																							?>
																							<p><strong>Tecnico:</strong> <?= $usx['nombre'] . ' ' . $usx['apellido'];?></p>
																							<?php }} ?>
																							<p><strong>Fecha:</strong> <?= $sop['s_fecha_visita']; ?></p>
																							<p><strong>Comentario:</strong> <?= $sop['s_comentario']; ?></p>
																							<p><strong>Visible al cliente:</strong> <?= $sop['s_visible']; ?></p>
																						</div>




																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			 <?php echo $sop['s_fecha']; ?>
																		</div>
																	</div>
																</li>
																<?php } $dir = $dir+1; ?>
															<?php endforeach ?>	
															</ul>
														</div>
													</div>
												</div>
												<!--tab-pane-->
											</div>
										</div>
                                    </div>
								</div>
							<!-- IMAGENES DE MAPAS Y MAS -->
                            	<div class="row">
									<div class="col-md-12">
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-map-marker font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Ubicación del Cliente</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
							</div>
						</div>
						<div id="map_cliente"></div>
						<div class="portlet-body">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_8_1" data-toggle="tab">Mapas de vivienda del Cliente </a></li>
								<li class="dropdown">
									<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
									Acciones <i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#tab_8_3" tabindex="-1" data-toggle="tab">Actualizar Mapa </a></li>
										<li><a href="#tab_8_4" tabindex="-1" data-toggle="tab">Actualizar Casa </a></li>
									</ul>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active in" id="tab_8_1">
									<?php if(($row['mapa'] == NULL) && ($row['fotoCasa'] == NULL)){ ?>
                                    <div class="alert alert-warning alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
										<strong>Aun no hay imagenes para este cliente</strong> Agrega desde acciones.
									</div>
                                    <?php } else { ?>
                                    <div class="filter-v1 margin-top-10">
									<ul class="mix-filter">
										<li class="filter" data-filter="all"> Los dos</li>
										<li class="filter" data-filter="mapa"> Mapa</li>
										<li class="filter" data-filter="casa"> Casa</li>
									</ul>
									<div class="row mix-grid thumbnails">
										<div class="col-md-6 col-sm-6 mix mapa">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo base_url(); ?>cargas/mapas/<?php echo $row['mapa']; ?>" alt="">
												<div class="mix-details">
													<h4>Mapa de domicilio del Cliente</h4>
													<p>El cliente vive en <?php echo $row['direccion']; ?></p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo base_url(); ?>cargas/mapas/<?php echo $row['mapa']; ?>" title="Mapa de domicilio de <?php echo $row['nombre']; ?>" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 mix casa">
											<div class="mix-inner">
												<img class="img-responsive" src="<?php echo base_url(); ?>cargas/casa/<?php echo $row['fotoCasa']; ?>" alt="">
												<div class="mix-details">
													<h4>Foto de Vivienda del Cliente</h4>
													<p>Ubicada en <?php echo $row['direccion']; ?> en el distrito de <?php echo $row['distrito']; ?>.</p>
													<a class="mix-link">
													<i class="fa fa-link"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo base_url(); ?>cargas/casa/<?php echo $row['fotoCasa']; ?>" title="Foto de la casa de <?php echo $row['nombre']; ?>" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								<!-- END FILTER -->
							</div>
									<?php } ?>
								</div>
								<div class="tab-pane" id="tab_8_3">
									<form method="post" action="<?php echo base_url(); ?>imagenes/mapas/<?php echo $row['usuarioID']; ?>" enctype="multipart/form-data">
                                <div class="form-group ">
										<label class="control-label col-md-3">Imagen para Mapa</label>
										<div class="col-md-9">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
												</div>
												<div>
													<span class="btn default btn-file">
													<span class="fileinput-new">
													Seleccionar imagen </span>
													<span class="fileinput-exists">
													Cambiar </span>
													<input type="file" name="userfile">
													</span>
													<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
													Cancelar </a>
												</div>
											</div>
										</div>
									</div>
                                    <input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID']; ?>" />
                                    <input type="submit" class="btn grey-cascade" value="Subir Imagen" />
                                </form>
								</div>
								<div class="tab-pane" id="tab_8_4">
									<form method="post" action="<?php echo base_url(); ?>imagenes/casa/<?php echo $row['usuarioID']; ?>" enctype="multipart/form-data">
                                <div class="form-group ">
										<label class="control-label col-md-3">Imagen para foto de Casa</label>
										<div class="col-md-9">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
												</div>
												<div>
													<span class="btn default btn-file">
													<span class="fileinput-new">
													Seleccionar imagen </span>
													<span class="fileinput-exists">
													Cambiar </span>
													<input type="file" name="userfile">
													</span>
													<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
													Cancelar </a>
												</div>
											</div>
										</div>
									</div>
                                    <input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID']; ?>" />
                                    <input type="submit" class="btn grey-cascade" value="Subir Imagen" />
                                </form>
								</div>
							</div>
						</div>
					</div>
</div>
								</div>
                            <!-- FIN DE IMAGENES DE MAPAS Y MAS -->
                            </div>
							<!--tab_1_2-->
							<div class="tab-pane" id="tab_1_3">
								<div class="row profile-account">
									<div class="col-md-3">
										<ul class="ver-inline-menu tabbable margin-bottom-10">
											<li class="active">
												<a data-toggle="tab" href="#tab_1-1"><i class="fa fa-cog"></i> Información personal </a>
												<span class="after"></span>
											</li>
											<li><a data-toggle="tab" href="#tab_2-2"><i class="fa fa-picture-o"></i> Cambiar avatar </a></li>
											<li><a data-toggle="tab" href="#tab_3-3"><i class="fa fa-lock"></i> Cambiar contraseña </a></li>
										</ul>
									</div>
									<div class="col-md-9">
										<div class="tab-content">
											<div id="tab_1-1" class="tab-pane active">
												<form method="post" action="<?php echo base_url().'clientes/actualizar/'.$row['usuarioID'];?>">
													<div class="form-group">
														<label class="control-label"><strong>Nombre</strong></label>
														<input name="nombre" type="text" value="<?php echo $row['nombre'];?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label"><strong>Apellido</strong></label>
														<input name="apellido" type="text" value="<?php echo $row['apellido'];?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label"><strong>Distrito</strong></label>
														<select name="distritoID" class="form-control">
                                                        <option value="<?php echo $row['distritoID'];?>"><?php echo $row['distrito'];?></option>
                                                        <?php foreach ($distrito as $dist): ?>
                                                            <option value="<?php echo $dist['distritoID'] ?>"><?php echo $dist['distrito'] ?></option>
                                                            <?php endforeach ?>
                                                        
                                                        </select>
													</div>
													<div class="form-group">
														<label class="control-label"><strong>Dirección</strong></label>
													  <input name="direccion" type="text" value="<?php echo $row['direccion'];?>" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label"><strong>Mensualidad</strong></label>
													  <input name="cuotas" type="text" value="<?php echo $row['cuotas'];?>" class="form-control"/>
													</div>
                                                    <div class="form-group">
														<label class="control-label"><strong>Correo</strong></label>
													  <input name="correo" type="email" value="<?php echo $row['correo'];?>" class="form-control"/>
													</div>
                                                    <div class="form-group">
														<label class="control-label"><strong>Correo Control</strong></label>
													  <input name="correo_control" type="text" value="<?php echo $row['correo_control'];?>" class="form-control"/>
													</div>
                                                     <div class="form-group">
														<label class="control-label"><strong>Estado del cliente ➟ <span style="color:red;">Retirado/Desactivar = Cliente que ya no pertenece a la empresa(Desactivado)</span></strong></label>
														<select name="control" class="form-control">
                                                        <option value="<?php echo $row['control'];?>"><?php echo ucfirst(strtolower($row['control']));?></option>
                                                        <?php if($row['control']=='retirado'){ ?>
                                                        <option value="activado">Activar</option>
                                                        <?php } elseif($row['control']=='activado'){ ?>
                                                        <option value="retirado">Desactivar</option>
                                                        <option value="cortado">Cortar</option>
                                                         <?php } elseif($row['control']=='cortado'){ ?>
                                                         <option value="activado">Activar</option>
                                                        <option value="retirado">Desactivar</option>
                                                        <?php } ?>
                                                        </select>
													</div>
                                                    <input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID'];?>">
													<div class="margiv-top-10">
														<input name="Enviar" type="submit" class="btn green" value="Guardar Cambios" data-toggle="modal" href="#static">
                                                        <input type="button" value="Cancelar" class="btn default">
												  </div>
                                                      
												</form>
											</div>
											<div id="tab_2-2" class="tab-pane">
												<form action="<?php echo base_url(); ?>imagenes/avatar_cliente/<?php echo $row['usuarioID']; ?>" enctype="multipart/form-data" method="post" role="form">
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
															<?php if($row['foto_avatar']==''){ ?>
                                                            <img src="<?php echo base_url(); ?>cargas/img/no-avatar.jpg" alt=""/>
                                                            <?php } else { ?>
                                                            <img src="<?php echo base_url(); ?>cargas/avatar/cliente/<?php echo $row['foto_avatar']; ?>" alt=""/>
                                                            <?php } ?>
															</div>
															<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
															</div>
															<div>
																<span class="btn default btn-file">
																<span class="fileinput-new">
																Seleccione imagen </span>
																<span class="fileinput-exists">
																Cambiar </span>
																<input type="file" name="userfile">
																</span>
																<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">
																Cancelar </a>
															</div>
														</div>
														<div class="clearfix margin-top-10">
															
														</div>
													</div>
													<div class="margin-top-10">
														<input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID']; ?>" />
                                    					<input type="submit" class="btn grey-cascade" value="Subir Imagen" />
													</div>
												</form>
											</div>
											<div id="tab_3-3" class="tab-pane">
												<form action="<?php echo base_url(); ?>clientes/cambiar_clave/<?php echo $row['usuarioID']; ?>" method="post">
													<div class="form-group">
														<label class="control-label">Nueva Contraseña</label>
														<input type="password" class="form-control" name="password"/>
													</div>
													<div class="margin-top-10">
                                                    	<input type="submit" value="Cambiar Contraseña" class="btn green" />
													</div>
												</form>
											</div>
										</div>
									</div>
									<!--end col-md-9-->
								</div>
							</div>

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