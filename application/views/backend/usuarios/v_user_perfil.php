<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Perfil del sistema <small><?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?></small></h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row margin-top-10">
				<div class="col-md-12">
                <?php
                        $elim_mensaje = $this->session->flashdata('elim_mensaje');
						if ($elim_mensaje) {// alerta para cuando editamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡El Mensaje de chat ha sido eliminado correctamente!</strong>.
						</div>
						<?php } ?>
				<?php
                        $mensaje = $this->session->flashdata('mensaje');
						if ($mensaje) {// alerta para cuando editamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡La Modificación se ha realizado correctamente!</strong>.
						</div>
						<?php } ?>
                        <?php
                        $eliminar = $this->session->flashdata('eliminar');
						if ($eliminar) {// alerta para cuando eliminamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡Usuario se ha eliminado del sistema correctamente!</strong>
						</div>
						<?php } ?>
                        <?php
                        $agregar = $this->session->flashdata('agregar');
						if ($agregar) {// alerta para cuando editamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡Se ha agregado usuario correctamente!</strong>.
						</div>
						<?php } ?>
                        <?php
                        $mensaje_acceso = $this->session->flashdata('mensaje_acceso');
						if ($mensaje_acceso) {// alerta para cuando editamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡Permiso agregado correctamente!</strong>.
						</div>
						<?php } ?>
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar" style="width: 250px;">
						<!-- PORTLET MAIN -->
						<div class="portlet light profile-sidebar-portlet">
							<!-- SIDEBAR USERPIC -->
							<div class="profile-userpic">
                            <?php if($row['foto_avatar']==''){ ?>
							<img src="<?php echo base_url();?>cargas/img/<?php echo $row['sexo']; ?>a.jpg" class="img-responsive" alt="">
                            <?php } else { ?>
                            <img src="<?php echo base_url();?>cargas/avatar/usuario/<?php echo $row['foto_avatar']; ?>" class="img-responsive" alt="">
                            <?php } ?>
							</div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
								<div class="profile-usertitle-name">
									 <?php echo $row['apellido']; ?>
								</div>
								<div class="profile-usertitle-job">
									 <?php echo $row['puesto']; ?>
								</div>
							</div>
							<!-- END SIDEBAR USER TITLE -->
							<!-- SIDEBAR BUTTONS -->
							<div class="profile-userbuttons">
								<a class="btn default" href="<?php echo base_url(); ?>usuarios/cuenta/<?php echo $row['usuarioID']; ?>">Editar</a>
                                <?php if($this->session->userdata('nivel') == 'admin_sup'){ ?>
                                
                                <a class="btn grey-cascade" href="#" onclick="confirm_modal('<?php echo base_url(); ?>modal/eliminar_user/<?php echo $row['usuarioID']; ?>');" title="Eliminar">Eliminar</a><?php } ?>
							</div>
							<!-- END SIDEBAR BUTTONS -->
							<!-- SIDEBAR MENU -->
							<div class="profile-usermenu">
								<ul class="nav">
                                <?php $active = 'perfil'; ?>
									<li class="<?php if($active=='perfil'){echo 'active';} ?>"><a href="<?php echo base_url(); ?>usuarios/perfil/<?php echo $row['usuarioID']; ?>"><i class="icon-home"></i>Perfil </a></li>
									<li class="<?php if($active=='cuenta'){echo 'active';} ?>"><a href="<?php echo base_url(); ?>usuarios/cuenta/<?php echo $row['usuarioID']; ?>"><i class="icon-settings"></i>Cuenta </a></li>
								</ul>
							</div>
							<!-- END MENU -->
						</div>
						<!-- END PORTLET MAIN -->
						<!-- PORTLET MAIN -->
						<div class="portlet light">
							<div>
								<h4 class="profile-desc-title">Acerca de <?php echo $row['nombre']; ?></h4>
								<span class="profile-desc-text"> Nuestro Personal </span>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-envelope"></i>
									<a href=""><?php echo $row['correo']; ?></a>
								</div>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-phone"></i>
									<a href=""><?php echo $row['correo_control']; ?></a>
								</div>
                                <div class="margin-top-20 profile-desc-link">
									<i class="fa fa-money"></i>
									<a href="">S/. <?php echo $row['cuotas']; ?></a>
								</div>
								<div class="margin-top-20 profile-desc-link">
									<i class="fa fa-suitcase"></i>
									<a href=""><?php echo $row['puesto']; ?></a>
								</div>
							</div>
						</div>
						<!-- END PORTLET MAIN -->
					</div>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<?php if($this->session->userdata('nivel')!='empleado'){ ?>
                            <div class="col-md-12">
                            <div class="portlet light">
                            	<div class="portlet-title tabbable-line">
                                <a class="btn grey-salsa" href="<?php echo base_url(); ?>usuarios/">Usuarios</a>
                                <a class="btn grey-salsa" href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/form_add_user/');" title="Agregar">Agregar nuevo usuario</a>
                                <a class="btn grey-salsa" href="<?php echo base_url(); ?>clientes/agregar/">Agregar nuevo Cliente</a>
                                <?php if(($permiso['usuarioID']=='') && ($row['nivel']!='admin_sup')){ ?>
                                <a href="" class="btn"><form method="post" action="<?php echo base_url(); ?>usuarios/permisos/<?php echo $row['usuarioID']; ?>">
                                	<input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID']; ?>" />
                                    <input class="btn grey-salsa" type="submit" value="Permisos" />
                                </form></a><?php } ?>
                                </div>
                                </div>
							</div>
                            <?php } ?>
							<div class="col-md-12">
								<!-- BEGIN PORTLET -->
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Tareas Pendientes </span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active"><a href="#tab_1_1" data-toggle="tab">Soporte </a></li>
                                            <li><a href="#tab_1_2" data-toggle="tab">Ventas </a></li>
                                            <li><a href="#tab_1_9" data-toggle="tab">Visitas </a></li>
                                            <li><a href="#tab_1_8" data-toggle="tab">Instalación </a></li>
                                            <li><a href="#tab_1_3" data-toggle="tab">Chat </a></li>
										</ul>
									</div>
									<div class="portlet-body">
										<!--BEGIN TABS-->
										<div class="tab-content">
											<div class="tab-pane active" id="tab_1_1">
												<div class="scroller" style="height: 320px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
													<ul class="feeds">
                                                    	<?php foreach($soporte as $sup): ?>
                                                        <li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-sm label-<?php if($sup['s_estado']=='abierto'){echo 'danger';} elseif($sup['s_estado']=='proceso'){echo 'warning';} ?>">
																			<i class="fa fa-bell-o"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			 <?php echo $sup['s_problema']; ?>. <a href="<?php echo base_url(); ?>gestion/actualizar/<?php echo $sup['soporteID']; ?>"><span class="label label-sm label-default">Solucionar <i class="fa fa-share"></i></span></a>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	 <?php echo $sup['s_fecha']; ?>
																</div>
															</div>
														</li>
                                                        <?php endforeach ?>
													</ul>
												</div>
											</div>
                                            
											<div class="tab-pane" id="tab_1_2">
												<div class="scroller" style="height: 337px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
													<ul class="feeds">
                                                    	<?php foreach($ventas as $vta): ?>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-sm label-<?php if($vta['v_estado']=='abierto'){echo 'danger';} elseif($vta['v_estado']=='proceso'){echo 'warning';} ?>">
																			<i class="fa fa-suitcase"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			 <?php echo $vta['v_nombre']; ?> <?php echo $vta['v_apellido']; ?> | <i class="fa fa-credit-card"></i><?php echo $vta['v_dni']; ?> | <i class="fa fa-calendar"></i><?php echo $vta['v_fecha_visita']; ?> | <i class="fa fa-map-marker"></i><?php echo $vta['v_direccion']; ?> <a href="<?php echo base_url(); ?>gestion/ventas"><span class="label label-sm label-default ">ver <i class="fa fa-share"></i></span></a>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	 <a class="btn default <?php if($vta['v_estado']=='abierto'){ echo 'red';} elseif($vta['v_estado']=='proceso'){ echo 'yellow';} ?>-stripe" href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/actualizar_venta/<?php echo $vta['ventasID']; ?>');" title="Editar"><i class="fa fa-cogs"></i></a>
																</div>
															</div>
														</li>
                                                        <?php endforeach ?>
													</ul>
												</div>
											</div>
                                            
                                            <div class="tab-pane" id="tab_1_9">
												<div class="scroller" style="height: 337px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
													<ul class="feeds">
                                                    	<?php foreach($visita as $vis): ?>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-sm label-<?php if($vis['v_estado']=='abierto'){echo 'danger';} elseif($vis['v_estado']=='proceso'){echo 'warning';} ?>">
																			<i class="fa fa-suitcase"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			 <?php echo $vis['v_nombre']; ?> <?php echo $vis['v_apellido']; ?> | <i class="fa fa-credit-card"></i><?php echo $vis['v_dni']; ?> | <i class="fa fa-calendar"></i><?php echo $vis['v_fecha_visita']; ?> | <i class="fa fa-map-marker"></i><?php echo $vis['v_direccion']; ?> <a href="<?php echo base_url(); ?>gestion/ventas"><span class="label label-sm label-default ">ver <i class="fa fa-share"></i></span></a>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	 <a class="btn default <?php if($vis['v_estado']=='abierto'){ echo 'red';} elseif($vis['v_estado']=='proceso'){ echo 'yellow';} ?>-stripe" href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/actualizar_venta/<?php echo $vis['ventasID']; ?>');" title="Editar"><i class="fa fa-cogs"></i></a>
																</div>
															</div>
														</li>
                                                        <?php endforeach ?>
													</ul>
												</div>
											</div>
                                            
                                            <div class="tab-pane" id="tab_1_8">
												<div class="scroller" style="height: 337px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
													<ul class="feeds">
                                                    	<?php foreach($instalacion as $inst): ?>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-sm label-<?php if($inst['v_estado']=='abierto'){echo 'danger';} elseif($inst['v_estado']=='proceso'){echo 'warning';} elseif($inst['v_estado']=='cerrado'){echo 'success';} ?>">
																			<i class="fa fa-suitcase"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			 <?php echo $inst['v_nombre']; ?> <?php echo $inst['v_apellido']; ?> | <i class="fa fa-credit-card"></i><?php echo $inst['v_dni']; ?> | <i class="fa fa-calendar"></i><?php echo $inst['v_fecha_visita']; ?> | <i class="fa fa-map-marker"></i><?php echo $inst['v_direccion']; ?> <a href="<?php echo base_url(); ?>gestion/ventas"><span class="label label-sm label-default ">ver <i class="fa fa-share"></i></span></a>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	 <a class="btn default <?php if($inst['v_estado']=='abierto'){ echo 'red';} elseif($inst['v_estado']=='proceso'){ echo 'yellow';} elseif($inst['v_estado']=='cerrado'){ echo 'green';} ?>-stripe" href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/actualizar_venta/<?php echo $inst['ventasID']; ?>');" title="Editar"><i class="fa fa-cogs"></i></a>
																</div>
															</div>
														</li>
                                                        <?php endforeach ?>
													</ul>
												</div>
											</div>
                                            
                                            <div class="tab-pane" id="tab_1_3">
												<div class="scroller" style="height: 320px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
													<ul class="feeds">
                                                    	<?php foreach($mensajes as $men): ?>
                                                        <li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-sm label-success">
																			<i class="fa fa-bell-o"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			 <?php echo $men['s_problema']; ?>. <a href="<?php echo base_url(); ?>gestion/conversacion/<?php echo $men['soporteID']; ?>"><span class="label label-sm label-default">Ver <i class="fa fa-share"></i></span></a>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	 <?php echo $men['s_fecha']; ?>
																</div>
															</div>
														</li>
                                                        <?php endforeach ?>
													</ul>
												</div>
											</div>
										</div>
										<!--END TABS-->
									</div>
								</div>
								<!-- END PORTLET -->
							</div>
						</div>
						
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
