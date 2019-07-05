<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1><?= $title; ?> <small></small></h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="portlet light">
				<div class="portlet-body">
					<!-- Meer Our Team -->
					<div class="headline">
						<h3>Nuestro Personal</h3>
					</div>
					<div class="row thumbnails">
						<?php foreach ($usuarios as $row): ?>
                        <div class="col-md-3">
							<div class="meet-our-team">
								<h3><a href="<?php echo base_url(); ?>usuarios/perfil/<?php echo $row['usuarioID']; ?>"><?php echo $row['apellido'] ?>, <?php echo $row['nombre'] ?></a> <small> <?php echo $row['puesto'] ?></small></h3>
								<?php if($row['foto_perfil']==''){ ?>
                                <img src="<?php echo base_url(); ?>cargas/img/<?php echo $row['sexo'] ?>.jpg" alt="" class="img-responsive"/>
                                <?php } else { ?>
                                <img src="<?php echo base_url(); ?>cargas/perfil/usuario/<?php echo $row['foto_perfil'] ?>" alt="" class="img-responsive"/>
                                <?php } ?>
								<div class="team-info">
									<p>
										 Personal de Multitel RM Comprometido con el servicio al cliente, y con los estandares de calidad de la empresa.
									</p>
									<ul class="social-icons pull-right">
										<li>
											<a href="javascript:;" data-original-title="twitter" class="twitter">
											</a>
										</li>
										<li>
											<a href="javascript:;" data-original-title="facebook" class="facebook">
											</a>
										</li>
										<li>
											<a href="javascript:;" data-original-title="linkedin" class="linkedin">
											</a>
										</li>
										<li>
											<a href="javascript:;" data-original-title="Goole Plus" class="googleplus">
											</a>
										</li>
										<li>
											<a href="javascript:;" data-original-title="skype" class="skype">
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
                        <?php endforeach ?>
                        
                        
					</div>
					<!--/thumbnails-->
					<!-- //End Meer Our Team -->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->



