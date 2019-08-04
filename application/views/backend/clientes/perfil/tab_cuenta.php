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
							<label class="control-label"><strong>DNI</strong></label>
							<?php if($this->session->userdata('nivel') == 'admin_sup' || $this->session->userdata('nivel') == 'sistemas'){ ?>
								<input name="usuario" type="text" maxlength="8" value="<?php echo $row['usuario'];?>" class="form-control"/>

							<?php } else {  ?>
								<input name="usuario" type="text" value="<?php echo $row['usuario'];?>" class="form-control" disabled/>

							<?php } ?>
						</div>
						<div class="form-group">
							<label class="control-label"><strong>Nombre</strong></label>
							<input name="nombre" type="text" value="<?php echo $row['nombre'];?>" class="form-control"/>
						</div>
						<div class="form-group">
							<label class="control-label"><strong>Apellido</strong></label>
							<input name="apellido" type="text" value="<?php echo $row['apellido'];?>" class="form-control"/>
						</div>
						<div class="form-group">
							<label class="control-label"><strong>Departamento</strong></label>
							<select name="distritoID" id="departamento" class="form-control">
	                            <?php foreach ($departamentos as $d): ?>
	                                <option value="<?php echo $d['id'] ?>" <?php if($d['id'] == $departamento['id']) { echo 'selected'; } ?>><?php echo $d['departamento'] ?></option>
	                            <?php endforeach ?>
                            </select>
						</div>
						<div class="form-group">
							<label class="control-label"><strong>Provincia</strong></label>
							<select name="provinciaID" id="provincia" class="form-control">
                            	<option value="<?php echo $provincia['id'];?>"><?php echo $provincia['provincia'];?></option>
                            </select>
						</div>
						<div class="form-group">
							<label class="control-label"><strong>Distrito</strong></label>
							<select name="distritoID" id="distrito" class="form-control">
                            	<option value="<?php echo $row['distritoID'];?>"><?php echo $row['distrito'];?></option>
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