<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-map-marker font-green-sharp"></i>
					<span class="caption-subject font-green-sharp bold uppercase">Ubicación del Cliente</span>
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
				</div>
			</div>
			
			<!-- Mapa del cliente  -->
			<div id="map_cliente"></div>
			
			<div class="portlet-body">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#upload_images" data-toggle="tab">Subir imagenes para este cliente </a></li>
					<li><a href="#tab_8_1" data-toggle="tab">Mapas de vivienda del Cliente </a></li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						Acciones <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#tab_8_3" tabindex="-1" data-toggle="tab">Actualizar Mapa </a></li>
							<li><a href="#tab_8_4" tabindex="-1" data-toggle="tab">Actualizar Casa </a></li>
						</ul>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active in" id="upload_images">
						<!-- Subir_imagenes -->
			            <form method="post" action="<?php echo base_url(); ?>imagenes/gallery/<?php echo $row['usuarioID']; ?>" enctype="multipart/form-data">
		            		<div class="form-group ">
								<label class="control-label">Imagen para foto de Casa</label>
								<br>
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
									</div>
									<div>
										<span class="btn default btn-file">
										<span class="fileinput-new">
										Seleccionar imagen </span>
										<span class="fileinput-exists">
										Cambiar </span>
										<input type="file" name="userfile" required>
										</span>
										<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
										Cancelar </a>
									</div>
								</div>
							</div>
			                <input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID']; ?>" />
			                <input type="submit" class="btn grey-cascade" value="Subir Imagen" />
			            </form>

			            <div class="imagenes_user">
			            	<div class="filter-v1 margin-top-10">
				            	<div class="row mix-grid thumbnails">
				            	<?php foreach ($gallery as $key => $image): ?>
									<div class="col-md-3 col-sm-4 mix mapa">
										<div class="mix-inner">
											<img class="img-responsive" src="<?php echo base_url().'gallery/'.$image['image']; ?>" alt="">
											<div class="mix-details">
												<h4>Galeria de Imagenes</h4>
												<p style="color:#fff;">El cliente vive en <?php echo $row['direccion']; ?></p>
												
												<a class="mix-preview fancybox-button" href="<?php echo base_url(); ?>gallery/<?php echo $image['image']; ?>" title="Galeria de imagenes de <?php echo $row['nombre']; ?>" data-rel="fancybox-button">
												<i class="fa fa-search"></i>
												</a>
												<a class="mix-link delete_image" href="<?php echo base_url(); ?>imagenes/delete/<?php echo $image['id'] ?>">
													<i class="fa fa-trash"></i>
												</a>
											</div>
										</div>
									</div>
								<?php endforeach ?>
								</div>
			            	</div>
			            	
			            </div>

					</div>
					<div class="tab-pane" id="tab_8_1">
						<?php if(($row['mapa'] == NULL) && ($row['fotoCasa'] == NULL)){ ?>
		                <div class="alert alert-warning alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
							<strong>Aun no hay imagenes para este cliente</strong> Agrega desde acciones.
						</div>
		                <?php } else { ?>
		                    <div class="filter-v1 margin-top-10">
								<ul class="mix-filter">
									<li class="filter" data-filter="all"> Los dos</li>
									<li class="filter" data-filter="mapa"> Mapa</li>
									<li class="filter" data-filter="casa"> Casa</li>
								</ul>
								<div class="row mix-grid thumbnails">
									<div class="col-md-6 col-sm-6 mix mapa">
										<div class="mix-inner">
											<img class="img-responsive" src="<?php echo base_url(); ?>cargas/mapas/<?php echo $row['mapa']; ?>" alt="">
											<div class="mix-details">
												<h4>Mapa de domicilio del Cliente</h4>
												<p style="color: #fff;">El cliente vive en <?php echo $row['direccion']; ?></p>
												<a class="mix-preview fancybox-button" href="<?php echo base_url(); ?>cargas/mapas/<?php echo $row['mapa']; ?>" title="Mapa de domicilio de <?php echo $row['nombre']; ?>" data-rel="fancybox-button">
												<i class="fa fa-search"></i>
												</a>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-sm-6 mix casa">
										<div class="mix-inner">
											<img class="img-responsive" src="<?php echo base_url(); ?>cargas/casa/<?php echo $row['fotoCasa']; ?>" alt="">
											<div class="mix-details">
												<h4>Foto de Vivienda del Cliente</h4>
												<p style="color: #fff;">Ubicada en <?php echo $row['direccion']; ?> en el distrito de <?php echo $row['distrito']; ?>.</p>
												<a class="mix-preview fancybox-button" href="<?php echo base_url(); ?>cargas/casa/<?php echo $row['fotoCasa']; ?>" title="Foto de la casa de <?php echo $row['nombre']; ?>" data-rel="fancybox-button">
												<i class="fa fa-search"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
								<!-- END FILTER -->
							</div>
						<?php } ?>
					</div>
					<div class="tab-pane" id="tab_8_3">
						<form method="post" action="<?php echo base_url(); ?>imagenes/mapas/<?php echo $row['usuarioID']; ?>" enctype="multipart/form-data">
		            		<div class="form-group ">
								<label class="control-label col-md-3">Imagen para Mapa</label>
								<div class="col-md-9">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
										</div>
										<div>
											<span class="btn default btn-file">
											<span class="fileinput-new">
											Seleccionar imagen </span>
											<span class="fileinput-exists">
											Cambiar </span>
											<input type="file" name="userfile" required>
											</span>
											<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
											Cancelar </a>
										</div>
									</div>
								</div>
							</div>
			                <input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID']; ?>" />
			                <input type="submit" class="btn grey-cascade" value="Subir Imagen" />
			            </form>
					</div>
					<div class="tab-pane" id="tab_8_4">
						<form method="post" action="<?php echo base_url(); ?>imagenes/casa/<?php echo $row['usuarioID']; ?>" enctype="multipart/form-data">
		            		<div class="form-group ">
								<label class="control-label col-md-3">Imagen para foto de Casa</label>
								<div class="col-md-9">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
										</div>
										<div>
											<span class="btn default btn-file">
											<span class="fileinput-new">
											Seleccionar imagen </span>
											<span class="fileinput-exists">
											Cambiar </span>
											<input type="file" name="userfile" required>
											</span>
											<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
											Cancelar </a>
										</div>
									</div>
								</div>
							</div>
			                <input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID']; ?>" />
			                <input type="submit" class="btn grey-cascade" value="Subir Imagen" />
			            </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	.delete_image{
		bottom: 0;
    	right: -5px!important;
	}
	.mix-grid .mix a.mix-preview {
	    left: 50%;
	    margin-left: 5px;
	    right: 50%;
	    margin-right: 5px;
	    width: 45px;
	    transform: translate(-50%, -50%);
	}
</style>