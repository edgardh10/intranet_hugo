<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Administrar Torres <small>Edite, Agregue y elimine</small></h1>
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
								<span class="caption-subject font-green-sharp bold uppercase"><?= $title; ?></span>
							</div>
							<div class="tools">
                            	<a href="<?php echo base_url(); ?>logistica/clientes_torres" title="Asignados"><button class="btn grey-cascade">Asignados</button></a>
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
                            <strong>¡Felicidades!</strong> la Torre se ha actualizado con éxito.
						</div>
						<?php } ?>
                        <?php
                        $eliminar = $this->session->flashdata('eliminar');
						if ($eliminar) {// alerta para cuando eliminamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡Torre eliminada del sistema correctamente!</strong>
						</div>
						<?php } ?>
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th> Orden</th>
                                <th> Torre</th>
                                <th> Distrito</th>
                                <th> </th>
							</tr>
							</thead>
							<tbody>
								<?php foreach($torres as $row): ?>
                                <tr>
                                    <td> <?php echo $row['torreID']; ?></td>
                                    <td> <a href="<?php echo base_url(); ?>logistica/equipos_torre_asignado/<?php echo $row['torreID']; ?>"><?php echo $row['torre']; ?></a></td>
                                    <td> <?php echo $row['distrito']; ?></td>
                                    <td><a class="btn default" href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/modal_editar_torre/<?php echo $row['torreID']; ?>');" title="Editar"><i class="fa fa-cogs"></i></a>
                                    <?php if($this->session->userdata('nivel')=='admin_sup') { ?>
                                    	<a class="btn grey-cascade" href="#" onclick="confirm_modal('<?php echo base_url(); ?>modal/eliminar_torre/<?php echo $row['torreID']; ?>');" title="Eliminar"><i class="fa fa-trash"></i></a>
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
								<span class="caption-subject font-green-sharp bold uppercase">Agregar Torre</span>
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
                            <strong>¡Torre agregada con éxito!</strong>
						</div>
						<?php } ?>
							<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>logistica/agregar_torre/">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Distrito</label>
										<div class="col-md-9">
											<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-map-marker"></i>
												</span>
												<select name="distritoID" class="form-control">
                                                	<option value="-1"></option>
                                                	<?php foreach($distrito as $dis): ?>
                                                    <option value="<?php echo $dis['distritoID']; ?>"><?php echo $dis['distrito']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
											</div>
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-md-3 control-label">Torre</label>
										<div class="col-md-9">
											<div class="input-group">
												<span class="input-group-addon">
												<i class="fa fa-signal"></i>
												</span>
												<input type="text" name="torre" class="form-control" placeholder="Torre de transmisión">
											</div>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
                                        	<input type="hidden" name="procesar" value="1" />
											<input type="submit" class="btn green" value="Agregar Torre"  />
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