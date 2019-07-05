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
            	
                <div class="col-md-12 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet light">
						<div class="portlet-title line">
							<div class="caption">
								<i class="fa fa-comments"></i>Chat con <?php echo $row['nombre']; ?>
							</div>
							<div class="tools">
                            	<a href="#" onclick="confirm_modal('<?php echo base_url(); ?>modal/eliminar_mensaje/<?php echo $row['soporteID']; ?>');" title="Eliminar"><button type="button" class="btn grey-cascade"><i class="fa fa-trash"></i> Eliminar</button></a>
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
                            <form method="post" action="<?php echo base_url(); ?>gestion/agregar_conversacion/">
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
            	
            
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->