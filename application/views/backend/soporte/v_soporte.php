<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title"><h1>Centro de <?php  echo $title; ?> <small>Puede ver información detallada, editar y más.</small></h1></div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase"> <?=$title?></span>
							</div>
							<div class="tools">
                            	<a href="<?php echo base_url();?>gestion/agregar"><button type="button" class="btn btn-default"><i class="fa fa-plus-square"></i> Agregar nuevo soporte</button></a>
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="tabbable tabs-left">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_6_1" data-toggle="tab"> Pendiente </a></li>
									<li><a href="#tab_6_3" data-toggle="tab"> Solucionado </a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_6_1">
										<div class="alert alert-warning">
										<strong><h2>Soporte para hoy <?php echo date('d/m/Y'); ?></h2></strong> </div>
										<div class="portlet-body">
                                        <?php
                        $agregar = $this->session->flashdata('agregar');
						if ($agregar) {// alerta para cuando editamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡Nuevo Soporte Ingresado satisfactoriamente!</strong>
						</div>
						<?php } ?>
                        <?php
                        $eliminar = $this->session->flashdata('eliminar');
						if ($eliminar) {// alerta para cuando eliminamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡Soporte eliminado del sistema correctamente!</strong>
						</div>
						<?php } ?>
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
                            	<th> Orden</th>
                                <th> DNI</th>
								<th> Cliente</th>
								<th> Problema</th>
								<th> Comentario</th>
								<th> Fecha</th>
                                <th> Estado</th>
							</tr>
							</thead>
							<tbody>
                            <?php foreach ($soporte_hoy as $row): ?>
							<tr>
                                <td><?php echo $row['soporteID'] ?></td>
                                <td>
									 <a href="<?php echo base_url().'clientes/perfil/'.$row['usuarioID'];?>" title="Detalle de <?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?>"><?php echo $row['usuario']; ?></a>
								</td>
								<td><?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?></td>
								<td><?php echo $row['s_problema']; ?></td>
								<td><?php echo $row['s_comentario']; ?></td>
                                <td><?php echo $row['s_fecha_visita']; ?></td>
                                <td><span class="label label-<?php if($row['s_estado']=='proceso'){echo 'warning';} else if($row['s_estado']=='abierto'){echo 'danger';}?> label-sm"><?php echo ucfirst($row['s_estado']); ?></span><a class="btn default btn-xs <?php if($row['s_estado']=='proceso'){echo 'yellow';} else if($row['s_estado']=='abierto'){echo 'red';}?>-stripe" href="<?php echo base_url().'gestion/actualizar/'.$row['soporteID'];?>">Ver </a></td>
							</tr>
							 <?php endforeach ?>
							</tbody>
							</table>
						</div>
									</div>
									<div class="tab-pane fade" id="tab_6_3">
                                    	<div class="alert alert-success">
                                        <h2>Soporte Solucionado</h2></div>
										<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_6">
							<thead>
							<tr>
                            	<th> </th>
                                <th> Orden</th>
                                <th> DNI</th>
								<th> Cliente</th>
								<th> Problema</th>
								<th> Comentario</th>
								<th> Fecha</th>
                                <td> Estado</td>
							</tr>
							</thead>
							<tbody>
                            <?php foreach ($soporte as $row): ?>
							<tr>
                                <td><input type="checkbox" /></td>
                                <td><?php echo $row['soporteID']; ?></td>
                                <td>
									 <a href="<?php echo base_url().'clientes/perfil/'.$row['usuarioID'];?>" title="Detalle de <?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?>"><?php echo $row['usuario']; ?></a>
								</td>
								<td><?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?></td>
								<td><?php echo $row['s_problema']; ?></td>
								<td><?php echo $row['s_comentario']; ?></td>
                                <td><?php echo $row['s_fecha_visita']; ?></td>
                                <td><span class="label label-success label-sm"><?php echo ucfirst($row['s_estado']); ?></span><a class="btn default btn-xs green-stripe" href="<?php echo base_url().'gestion/actualizar/'.$row['soporteID'];?>">Ver </a></td>
							</tr>
							 <?php endforeach ?>
							</tbody>
							</table>
						</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->