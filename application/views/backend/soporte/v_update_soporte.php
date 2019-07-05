<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1><strong>Asunto:</strong> <?php echo $row['s_problema']; ?> <small><?php echo $row['s_fecha_visita']; ?></small></h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row ">
            	<div class="col-md-12">
                <div class="note note-warning">
								<?php if($row['s_fecha_visita'] == NULL){ ?>
                                <h4 class="block"><strong>Nota:</strong></h4>
                                <p>Darle solución a <strong><?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?></strong> via online a la brevedad</p>
                                <?php } else { ?>
                                <h4 class="block">Fecha de visita a <strong><?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?></strong> para soporte: <strong><?php echo $row['s_fecha_visita']; ?></strong>. Dirección: <strong><?php echo $row['direccion']; ?></strong></h4>
                                <p><strong><?php echo $row['s_comentario']; ?></strong></p>
                                <?php } ?>
							</div>
                 </div>
                <div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet light">
						<div class="portlet-title line">
							<div class="caption">
								<i class="fa fa-comments"></i>Chat con <?php echo $row['nombre']; ?>
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
								<a href="" class="reload"></a>
								<a href="" class="fullscreen"></a>
								<a href="" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body" id="chats">
							<div class="scroller" style="height: 352px;" data-always-visible="1" data-rail-visible1="1">
								<ul class="chats">
									<?php foreach($chat as $con): ?>
                                    <?php if($con['nivel']=='cliente'){ ?>
                                    <li class="out">
											<?php if($con['foto_avatar']==''){ ?>
                                        		<img class="avatar" alt="" src="<?php echo base_url(); ?>cargas/img/<?php echo $con['sexo'];?>a.jpg"/>
                                        	<?php } else { ?>
                                            	<img class="avatar" alt="" src="<?php echo base_url(); ?>cargas/avatar/cliente/<?php echo $con['foto_avatar'];?>"/>
                                            <?php } ?>
                                     <?php } else { ?>
                                     <li class="in">
										<?php if($con['foto_avatar']==''){ ?>
                                        		<img class="avatar" alt="" src="<?php echo base_url(); ?>cargas/img/<?php echo $con['sexo'];?>a.jpg"/>
                                        	<?php } else { ?>
                                            	<img class="avatar" alt="" src="<?php echo base_url(); ?>cargas/avatar/usuario/<?php echo $con['foto_avatar'];?>"/>
                                            <?php } ?>
                                     <?php } ?>   
										<div class="message">
											<span class="arrow"></span>
											<a href="javascript:;" class="name"><?php echo $con['nombre']; ?> </a>
											<span class="datetime">el <?php $date = new DateTime($con['t_fecha']); echo $date->format('d/m/Y').' a las '.$date->format('G:ia');?></span>
											<span class="body"><?php echo $con['t_comentario']; ?>. </span>
										</div>
									</li>
                                    <?php endforeach ?>
								</ul>
							</div>
                            <?php if($row['s_estado']!='cerrado'){ ?>
							<div class="chat-form">
                            <form method="post" action="<?php echo base_url(); ?>gestion/agregar_chat/">
								<div class="input-cont">
                                
									<input class="form-control" type="text" name="t_comentario" placeholder="Escribe aquí..."/>
                                    <input type="hidden" name="ticketsID" value="<?php echo $row['soporteID'];  ?>" />
                                    <input type="hidden" name="t_usuario" value="<?php echo $this->session->userdata('usuario'); ?>" />
								</div>
								<div class="btn-cont">
									<span class="arrow">
									</span><input type="submit" class="btn blue icn-only" value="Enviar ">
								</div>
                            </form>
							</div>
                            
                            <?php } ?>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>

            <?php if($row['s_estado']!='cerrado'){ ?>
				<div class="col-md-6">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Editar soporte de <?php echo $row['nombre']; ?> </span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="expand"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body display-hide">
							<form class="form-horizontal" method="post" action="<?php echo base_url();?>gestion/update_soporte/<?php echo $row['soporteID']; ?>">
                                <div class="form-group">
									<label class="col-md-4 control-label">Seleccionar Técnico</label>
									<div class="col-md-7 input-group">
										<span class="input-group-addon">
                                            <i class="fa fa-wrench"></i>
                                        </span>
                                        <select name="s_tecnico" id="distrito" class="form-control">
                                            <?php foreach ($usuarios as $fila): ?>
                                            <option value="<?php echo $fila['usuarioID']; ?>" <?php if($fila['usuarioID']==$row['s_tecnico']){echo 'selected="selected"';} ?>><?php echo $fila['nombre']; ?> <?php echo $fila['apellido']; ?></option>
                                            <?php endforeach ?>
                                        </select>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail1" class="col-md-4 control-label">Fecha a realizar soporte</label>
									<div class="col-md-7 input-group">
                                    <span class="input-group-addon">
                                    	<i class="fa fa-calendar"></i>
                                    </span>
										<input type="text" name="s_fecha_visita" value="<?php echo $row['s_fecha_visita']; ?>" class="form-control form-control-inline input-medium date-picker todo-taskbody-due" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword1" class="col-md-4 control-label">Comentario adicional</label>
									<div class="col-md-7">
										<div class="input-icon right">
											<i class="fa fa-user"></i>
											<textarea name="s_comentario" class="form-control" placeholder="Ingrese problema" rows="5"><?php echo $row['s_comentario']; ?></textarea>
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputPassword1" class="col-md-4 control-label">Visible al Cliente</label>
									<div class="col-md-7 input-group">
										<span class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </span>
                                            <select name="s_visible" class="form-control">
                                            	<option selected="selected" value="<?php echo $row['s_visible']; ?>"><?php echo ucfirst($row['s_visible']); ?></option>
                                            <?php if($row['s_visible']=='no'){ ?>
												<option value="si">Si</option>
                                            <?php } if($row['s_visible']=='si'){ ?>
                                                <option value="no">No</option>
                                            <?php } ?>
                                            </select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-2 col-md-10">
                                    	<input type="hidden" name="s_estado" value="proceso" />
                                        <input type="hidden" name="soporteID" value="<?php echo $row['soporteID']; ?>" />
                                    	<input type="hidden" name="procesar" value="1">
										<input type="submit" class="btn green" value="Actualizar soporte">
									</div>
								</div>
							</form>
                            
                        </div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			<?php } else { ?>
                <div class="col-md-6">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Datos de soporte a <?php echo $row['nombre']; ?> </span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="expand"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body">
                                <p><strong>Técnico:</strong> <?php foreach ($usuarios as $fila): ?>
											<?php if($fila['usuarioID']==$row['s_tecnico']){echo $fila['nombre'].' '.$fila['apellido'];} ?>	
										<?php endforeach ?><p>
                                <p><strong>Fecha Realizada:</strong> <?php echo $row['s_fecha_visita']; ?>
                                
                                <p><strong>Comentario:</strong> <?php echo $row['s_comentario']; ?>
                                
								<p><strong>Visible al cliente:</strong> <?php echo ucfirst($row['s_visible']); ?>
                                <p><strong>Generado:</strong> <?php echo ucfirst($row['s_fecha']); ?></p>
                                <p style="font-size:30px; font-family:Arial, Helvetica, sans-serif; color:green">Soporte Cerrado / Solucionado</p>
                        </div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
            <?php } ?>
            
            	<div class="col-md-6">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Mas acciones </span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body">
                        <style type="text/css">
						.michelon {float:left; position:relative; margin:0 0 0 10px;}
						</style>
                            <?php if($row['s_estado']!='cerrado'){ ?>
                            <form method="post" action="<?php echo base_url();?>gestion/cierra_soporte/<?php echo $row['soporteID']; ?>">
                            <input type="hidden" name="soporteID" value="<?php echo $row['soporteID']; ?>" />
                            <input type="hidden" name="s_estado" value="cerrado" />
                            <input type="submit" class="btn grey-cascade michelon" value="Cerrar"></button>
                            </form>
                            <?php } ?>
                            <?php if($this->session->userdata('nivel')=='admin_sup') { ?>
                            <a class="btn grey-cascade michelon" href="#" onclick="confirm_modal('<?php echo base_url(); ?>modal/eliminar_soporte/<?php echo $row['soporteID']; ?>');" title="Eliminar"><i class="fa fa-trash"></i> Eliminar</a><?php } ?>
						</div>
                        <div style="clear:both"></div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
            
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->