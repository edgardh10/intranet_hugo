<form action="<?php echo base_url(); ?>imagenes/perfil_cliente_cliente/<?php echo $this->session->userdata('usuarioID'); ?>" enctype="multipart/form-data" method="post" role="form">
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																<img src="<?php echo base_url(); ?>cargas/img/no-avatar.jpg" alt=""/>
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
                                                    	<input type="hidden" name="usuarioID" value="<?php echo $this->session->userdata('usuarioID'); ?>" />
                                    					<input type="submit" class="btn grey-cascade" value="Subir Imagen" />
													</div>
												</form>