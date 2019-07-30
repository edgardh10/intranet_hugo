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