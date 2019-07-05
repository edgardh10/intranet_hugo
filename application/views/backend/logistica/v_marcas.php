<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Administrar Marcas <small>Edite, Agregue y elimine</small></h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Principales Marcas</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body">
                        <?php
                        $editar = $this->session->flashdata('editar');
						if ($editar) {// alerta para cuando editamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡Felicidades!</strong> la marca se ha actualizado con éxito.
						</div>
						<?php } ?>
                        <?php
                        $eliminar = $this->session->flashdata('eliminar');
						if ($eliminar) {// alerta para cuando eliminamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡Marca eliminada del sistema correctamente!</strong>
						</div>
						<?php } ?>
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th> Orden</th>
                                <th> Marca</th>
                                <th> </th>
							</tr>
							</thead>
							<tbody>
								<?php foreach($marcas as $row): ?>
                                <tr>
                                    <td> <?php echo $row['marcasID']; ?></td>
                                    <td> <?php echo $row['marca']; ?></td>
                                    <td><a class="btn default" href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/editar_marca/<?php echo $row['marcasID']; ?>');" title="Editar"><i class="fa fa-cogs"></i></a>
                                    <?php if($this->session->userdata('nivel')=='admin_sup') { ?>
                                    	<a class="btn grey-cascade" href="#" onclick="confirm_modal('<?php echo base_url(); ?>modal/eliminar_marca/<?php echo $row['marcasID']; ?>');" title="Eliminar"><i class="fa fa-trash"></i></a>
                                      <?php } ?>
                                    </td>
                                </tr>
                               <?php endforeach ?>
							</tbody>
							</table>
						</div>
					</div>
				</div>
                
                <div class="col-md-6">
                	<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Agregar Marca</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body form">
                        <?php 
                        $agregar = $this->session->flashdata('agregar');
						if ($agregar) { ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡Marca agregada con éxito!</strong>
						</div>
						<?php } ?>
							<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>logistica/agregar_marcas/">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Marca</label>
										<div class="col-md-9">
											<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-ticket"></i>
												</span>
												<input type="text" name="marca" class="form-control" placeholder="Marca de equipos">
											</div>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
                                        	<input type="hidden" name="procesar" value="1" />
											<input type="submit" class="btn green" value="Agregar Marca"  />
											<input name="Restablecer" type="reset" class="btn default" value="Cancelar"  />
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
                </div>
			</div>
			<!-- END PAGE CONTENT -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->