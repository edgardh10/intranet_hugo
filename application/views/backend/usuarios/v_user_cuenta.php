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
                        $success = $this->session->flashdata('mensaje_acceso');
						if ($success) {// alerta para cuando editamos una marca ?>
						   <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡Se ha denegado el acceso a la torre seleccionada!</strong>.
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
                                <?php $active = 'cuenta'; ?>
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
							<div class="col-md-12">
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Administrar Cuenta</span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active"><a href="#tab_1_1" data-toggle="tab">Informacion Personal</a></li>
											<li><a href="#tab_1_2" data-toggle="tab">Imagen de Perfil</a></li>
											<li><a href="#tab_1_4" data-toggle="tab">Cambiar Avatar</a></li>
											<li><a href="#tab_1_3" data-toggle="tab">Cambiar contraseña</a></li>
                                            <?php if($this->session->userdata('nivel')=='admin_sup'){ ?>
											<?php if($permiso['permisoID']!=''){ ?>
											<li><a href="#tab_1_5" data-toggle="tab">Permisos</a></li>
                                            <?php }} ?>
                                            
										</ul>
									</div>
									<div class="portlet-body">
										<div class="tab-content">
											<!-- tab_1_1 -->
											<?php include '_tab_cuenta.php'; ?>
											<!-- CHANGE AVATAR TAB -->
											<div class="tab-pane" id="tab_1_2">
												<p>Imagen de perfil personal</p>
												<form action="<?php echo base_url(); ?>imagenes/perfil_user/<?php echo $row['usuarioID']; ?>" method="post" enctype="multipart/form-data" role="form">
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
															<?php if($row['foto_perfil']==''){ ?>
															<img src="<?php echo base_url(); ?>cargas/img/no-avatar.jpg" alt=""/>
                                                            <?php } else { ?>
                                                            <img src="<?php echo base_url(); ?>cargas/perfil/usuario/<?php echo $row['foto_perfil']; ?>" alt=""/>
                                                            <?php } ?>
															</div>
															<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
															</div>
															<div>
																<span class="btn default btn-file">
																<span class="fileinput-new">
																Seleccionar imagen </span>
																<span class="fileinput-exists">
																Cambiar </span>
																<input type="file" name="userfile">
																</span>
																<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">
																cancelar </a>
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
                                            
                                            <div class="tab-pane" id="tab_1_4">
											  <p>Cambiar avatar personal</p>
												<form action="<?php echo base_url(); ?>imagenes/avatar_user/<?php echo $row['usuarioID']; ?>" method="post" enctype="multipart/form-data" role="form">
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                                                            <?php if($row['foto_avatar']==''){ ?>
															<img src="<?php echo base_url(); ?>cargas/img/no-avatar.jpg" alt=""/>
                                                            <?php } else { ?>
                                                            <img src="<?php echo base_url(); ?>cargas/avatar/usuario/<?php echo $row['foto_avatar']; ?>" alt=""/>
                                                            <?php } ?>
															</div>
															<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
															</div>
															<div>
																<span class="btn default btn-file">
																<span class="fileinput-new">
																Seleccionar imagen </span>
																<span class="fileinput-exists">
																Cambiar </span>
																<input type="file" name="userfile">
																</span>
																<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">
																cancelar </a>
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
											<!-- END CHANGE AVATAR TAB -->
											<!-- CHANGE PASSWORD TAB -->
											<div class="tab-pane" id="tab_1_3">
												<form action="<?php echo base_url(); ?>usuarios/cambiar_pass/<?php echo $row['usuarioID']; ?>" method="post">
													<div class="form-group">
														<label class="control-label">Nueva Contraseña</label>
														<input type="password" name="password" class="form-control"/>
													</div>
													<div class="margin-top-10">
                                                    	<input type="submit" value="Cambiar Contraseña" class="btn grey-cascade" />
													</div>
												</form>
											</div>
											<!-- END CHANGE PASSWORD TAB -->
											<!-- PRIVACY SETTINGS TAB -->
											
												<!-- tab_1_5 -->
												<?php include '_user_permisos.php'; ?>
											<!-- END PRIVACY SETTINGS TAB -->
										</div>
									</div>
								</div>
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
