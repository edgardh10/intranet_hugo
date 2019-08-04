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
				<li><a href="javascript:;"><strong>Cliente desde:</strong> <?php echo $row['fechaInst'];?> <span><i class="fa fa-check"></i> </span></a></li>
				<li><a href="javascript:void(0)" onclick="showAjaxModal('<?php echo base_url(); ?>television/modal/<?php echo $row['usuarioID']; ?>');" title="Editar">Añadir Plan de Tv</a></li>
                <?php if($row['control']=='retirado'){ ?>
                	<?php if($this->session->userdata('nivel')=='admin_sup'){ ?>
                <li><a class="btn grey-cascade" href="#" onclick="confirm_modal('<?php echo base_url(); ?>modal/eliminar_cliente/<?php echo $row['usuarioID']; ?>');" title="Eliminar"><i class="fa fa-trash"></i> Eliminar del sistema</a></li>
                <?php }} ?>
			</ul>
		</div>
		<?php
			$user_tv = $this->db->get_where('television' , array('usuarioID' => $row['usuarioID'], 'status' => 1 ));
			// $user_tv = $user_tv->row_array();
		?>
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-8 profile-info">
					<h1><?php echo $row['nombre'];?> ➟ DNI: <?php echo $row['usuario'];?> 
						<span style="float: right;">
							<?php if ($row['cuotas'] != 0): ?>
								<i class="fa fa-globe" aria-hidden="true" style="font-size: 30px;"></i>
							<?php endif ?>
							<?php if ($user_tv->num_rows() == 1): ?>
								<i class="fa fa-desktop" aria-hidden="true" style="font-size: 26px;"></i>
							<?php endif ?>
							
						</span>
					</h1>
					<p>A este cliente se le instalo el servicio el <?php echo $row['fechaInst'];?> y su domicilio queda en <?php echo $row['direccion'];?>, distrito de <?php echo $row['distrito'];?></p>
					<ul class="list-inline">
						<li><i class="fa fa-map-marker"></i> <?php echo $row['distrito'];?></li>
						<li><i class="fa fa-calendar"></i> <?php echo $row['fechaInst'];?></li>
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
					<!-- tab_1_11 -->
					<?php include '_tab_perfil_facturas_pendientes.php'; ?>
					<!--tab-pane-->
					<!-- tab_1_22 -->
					<?php include '_tab_perfil_soporte.php'; ?>
					<!--tab-pane-->
				</div>
			</div>
        </div>
	</div>
	<!-- IMAGENES DE MAPAS Y MAS -->
	<?php include '_imagenes_y_mapas.php'; ?>
    <!-- FIN DE IMAGENES DE MAPAS Y MAS -->
</div>