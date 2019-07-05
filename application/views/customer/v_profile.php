<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Bienvenido: <?php echo $title; ?>, <?php echo $this->session->userdata('nombre'); ?> <small>Perfil del sistema</small></h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<div class="row profile">
				<div class="col-md-12">
                <?php
                        $mensaje = $this->session->flashdata('mensaje');
						if ($mensaje) {// alerta para cuando editamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>Imagen actualizada correctamente, si no actualiza, ¡LA PROXIMA VEZ QUE INICIE SESIÓN VERA SU IMAGEN!</strong>.
						</div>
						<?php } ?>
					<!--BEGIN TABS-->
					<div class="tabbable tabbable-custom tabbable-noborder">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab_1_1" data-toggle="tab">Perfil </a></li>
							<li><a href="#tab_1_3" data-toggle="tab">Mensajes </a></li>
                            <li><a href="#tab_1_2" data-toggle="tab">Avatar </a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									<div class="col-md-3">
										<ul class="list-unstyled profile-nav">
											<li>
                                            <?php if($this->session->userdata('foto_perfil')==''){ ?>
												<img src="<?php echo base_url(); ?>cargas/img/<?php echo $this->session->userdata('sexo')?>.jpg" class="img-responsive" alt=""/>
                                            <?php } else { ?>
                                            <img src="<?php echo base_url(); ?>cargas/perfil/cliente/<?php echo $this->session->userdata('foto_perfil')?>" class="img-responsive" alt=""/>
                                            <?php } ?>
											<a class="profile-edit" href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/subir_img_cliente/<?php echo $this->session->userdata('usuarioID'); ?>');" title="Editar">editar</a>
											</li>
											<li><a href="javascript:;"> <strong>DNI:</strong> <?php echo $this->session->userdata('usuario'); ?> </a></li>
											<li><a href="javascript:;"> <strong>Correo:</strong> <?php echo $this->session->userdata('correo'); ?> </a></li>
											<li><a href="javascript:;"> <strong>Plan: S/.</strong> <?php echo $this->session->userdata('cuotas'); ?> </a></li>
											<li><a href="javascript:;"> <strong>Cliente desde:</strong> <?php echo $this->session->userdata('fechaInst'); ?> <span><i class="fa fa-smile-o"></i></span></a></li>
										</ul>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-8 profile-info">
												<h1><?php echo $this->session->userdata('nombre'); ?></h1>
												<p> Estimada <?php echo $this->session->userdata('nombre'); ?>, pagar tus facturas ahora es mucho mas fácil, mas abajo estan tus facturas pendientes desde donde podras cancelarlo.</p>
												<p><a href="javascript:;">www.multitelrm.com </a></p>
												<ul class="list-inline">
													<li><i class="fa fa-map-marker"></i> <?php echo $this->session->userdata('direccion'); ?></li>
													<li><i class="fa fa-calendar"></i> <?php echo $this->session->userdata('fechaInst'); ?></li>
													<!--<li><i class="fa fa-briefcase"></i> Design</li>
													<li><i class="fa fa-star"></i> Top Seller</li>
													<li><i class="fa fa-heart"></i> BASE Jumping</li>-->
												</ul>
											</div>
										</div>
										<!--end row-->
										<div class="tabbable tabbable-custom tabbable-custom-profile">
											<ul class="nav nav-tabs">
                                            	<li class="active"><a href="#tab_1_11" data-toggle="tab"> Facturas </a></li>
                                                <li><a href="#tab_1_22" data-toggle="tab"> Bienvenido </a></li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane active" id="tab_1_11">
													<div class="portlet-body">
														<table class="table table-striped table-bordered table-advance table-hover">
														<thead>
														<tr>
															<th></th>
                                                            <th><i class="fa fa-briefcase"></i> Referencia</th>
															<th class="hidden-xs"><i class="fa fa-bookmark"></i> Descripción</th>
															<th><i class="fa fa-credit-card"></i> Transf. Bancaria</th>
															<th><i class="fa fa-money"></i> Cantidad</th>
															<th><i class="fa fa-calendar"></i> Fecha Vencimiento</th>
															<th><i class="fa fa-calendar-o"></i> Fecha de Pago</th>
															<th></th>
														</tr>
														</thead>
														<tbody>
														<?php $i=1; foreach($pagos as $row):// facturas de los clientes ?>
                                                        <tr>
															<td> <?php echo $i++;?></td>
                                                            <td><a href="javascript:;"><?php echo $row['referencia']; ?> </a></td>
															<td class="hidden-xs"> Pago correspondite por el mes de <?php echo $row['mes'];?></td>
															<td>#<?php echo $row['ope']; ?></td>
                                                            <td> <?php echo $row['moneda']; ?><?php echo $row['cuota']; ?> <br /><span class="label label-<?php if($row['estado']=='pagado'){echo 'success';} elseif($row['estado']=='pendiente'){echo 'warning';} elseif($row['estado']=='inpago'){echo 'danger';}; ?> label-sm"> <?php echo ucfirst($row['estado']); ?> </span></td>
                                                            <td> <?php echo $row['fecha_vencimiento']; ?></td>
                                                            <td> <?php echo $row['fecha_pago']; ?></td>
															<td><a class="btn default btn-xs <?php if($row['estado']=='pagado'){echo 'green';} elseif($row['estado']=='pendiente'){echo 'yellow';} elseif($row['estado']=='inpago'){echo 'red';}; ?>-stripe" href="<?php echo base_url();?>customer/factura/<?php echo $row['pagosID']; ?>">Ver </a></td>
														</tr>
                                                        <?php endforeach ?>
														</tbody>
														</table>
													</div>
												</div>
												<!--tab-pane-->
												<div class="tab-pane" id="tab_1_22">
													<div class="tab-pane active" id="tab_1_1_1">
														<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
															<ul class="feeds">
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-success">
																					<i class="fa fa-bell-o"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					 Puedes ver tus facturas en la siguiente pestaña. <span class="label label-danger label-sm">
																					¡hecha un vistazo! <i class="fa fa-share"></i>
																					</span>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			 <?php echo date('j M - Y') ?>
																		</div>
																	</div>
																</li>
																	
															</ul>
														</div>
													</div>
												</div>
												<!--tab-pane-->
											</div>
										</div>
									</div>
								</div>
                                
							</div>
							<!--tab_1_2-->
							<div class="tab-pane" id="tab_1_3">
								<div class="row profile-account">
									<div class="col-md-3">
										<ul class="ver-inline-menu tabbable margin-bottom-10">
											<li class="active"><a data-toggle="tab" href="#tab_1-1">
												<i class="fa fa-cog"></i> Enviar Mensaje </a>
												<span class="after"></span>
											</li>
											<li><a data-toggle="tab" href="#tab_4-4"><i class="fa fa-eye"></i> Mis Mensajes </a></li>
										</ul>
									</div>
									<div class="col-md-9">
										<div class="tab-content">
											<div id="tab_1-1" class="tab-pane active">
                                            	<div class="well">¿Que quiere comunicarse con nosotros?... Sientase libre de opinar, dejenos un mensaje, reportenos un problema, cuentenos una idea... </div>
												<form role="form" action="<?php echo base_url(); ?>customer/enviar" method="post">
													<div class="form-group">
														<label class="control-label">Elija destinatario</label>
														<select class="form-control" name="s_tecnico">
                                                        <option value="-">Seleccione...</option>
                                                        <?php foreach($usuarios as $fila): ?>
                                                        <?php if($fila['nivel']!='admin_sup'){ ?>
                                                        	<option value="<?php echo $fila['usuarioID'];?>"><?php echo $fila['nombre'];?> <?php echo $fila['apellido'];?></option>
                                                        <?php } ?>
                                                        <?php endforeach ?>
                                                        </select>
                                                        
													</div>
													<div class="form-group">
														<label class="control-label">Mensaje</label>
														<textarea name="s_problema" class="form-control" rows="5" placeholder="Su mensaje!!!"></textarea>
													</div>
													<div class="margiv-top-10">
                                                    	<input type="hidden" name="s_cliente" value="<?php echo $this->session->userdata('usuario'); ?>" />														<input type="hidden" name="s_fecha_visita" value="<?php echo date('d/m/Y'); ?>" />
                                                    	<input type="submit" class="btn default" value="Enviar Mensaje" />
														
													</div>
												</form>
											</div>
											<!--<div id="tab_2-2" class="tab-pane">
												<p>
													 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
												</p>
												
											</div>-->
											<div id="tab_4-4" class="tab-pane">
												
													<table class="table table-bordered table-striped">
													<?php foreach($mensajes as $soporte): ?>
                                                    <tr>
														<td><?php echo $soporte['s_problema']; ?></td>
														<td><span class="label label-<?php if($soporte['s_estado']=='abierto'){echo 'danger';} elseif($soporte['s_estado']=='cerrado'){echo 'success';} elseif($soporte['s_estado']=='proceso'){echo 'warning';}; ?> label-sm"><?php if($soporte['s_estado']=='abierto'){echo 'Enviado';} elseif($soporte['s_estado']=='cerrado'){echo 'Cerrado';} elseif($soporte['s_estado']=='proceso'){echo 'Contestado';}; ?></span><a class="btn default btn-xs <?php if($soporte['s_estado']=='abierto'){echo 'red';} elseif($soporte['s_estado']=='cerrado'){echo 'green';} elseif($soporte['s_estado']=='proceso'){echo 'yellow';}; ?>-stripe" href="<?php echo base_url(); ?>customer/soporte/<?php echo $soporte['soporteID']; ?>">Ver</a></td>
													</tr>
													<?php endforeach ?>
													</table>
													<!--end profile-settings-->
												
											</div>
										</div>
									</div>
									<!--end col-md-9-->
								</div>
							</div>
                            
                            <div id="tab_1_2" class="tab-pane">
												<form action="<?php echo base_url(); ?>imagenes/avatar_cliente_cliente/<?php echo $this->session->userdata('usuarioID'); ?>" method="post" enctype="multipart/form-data" role="form">
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                                                            <?php if($this->session->userdata('foto_avatar')==''){ ?>
															<img src="<?php echo base_url(); ?>cargas/img/no-avatar.jpg" alt=""/>
                                                            <?php } else { ?>
                                                            <img src="<?php echo base_url(); ?>cargas/avatar/cliente/<?php echo $this->session->userdata('foto_avatar'); ?>" alt=""/>
                                                            <?php } ?>
															</div>
															<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px;">
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
														<input type="hidden" name="usuarioID" value="<?php echo $this->session->userdata('usuarioID'); ?>" />
                                    					<input type="submit" class="btn grey-cascade" value="Subir Imagen" />
													</div>
												</form>
											</div>
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
