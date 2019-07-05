<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title"><h1>Tabla <?php  echo $title; ?> <small>administrar.</small></h1></div>
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
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
							</div>
						</div>
						<div class="portlet-body">
                        <div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
                            	<th> Orden</th>
                                <th> DNI</th>
								<th> Cliente</th>
								<th> Teléfono</th>
								<th> Dirección</th>
								<th> Visitado</th>
                                <th> Comentario</th>
                                <th> Facilidades</th>
								<th> Tecnico</th>
								<th> Fecha</th>
                                <th> </th>
							</tr>
							</thead>
							<tbody>
                            <?php foreach ($ventas as $row): 
                            if($row['v_estado']=='cerrado' && $row['v_facilidades']!='si'){ ?>
							<tr>
                                <td><?php echo $row['ventasID']; ?></td>
                                <td><?php echo $row['v_dni']; ?></td>
								<td><?php echo $row['v_nombre']; ?> <?php echo $row['v_apellido'] ?></td>
								<td><?php echo $row['v_telefono']; ?></td>
								<td><?php echo $row['v_direccion']; ?></td>
                                <td><?php echo ucfirst($row['v_visita']); ?></td>
								<td><?php echo $row['v_comentario']; ?></td>
                                <td><?php echo ucfirst($row['v_facilidades']); ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['v_fecha']; ?></td>
                                <td><a class="btn grey-cascade" href="#" onclick="confirm_modal('<?php echo base_url(); ?>modal/eliminar_venta/<?php echo $row['ventasID']; ?>');" title="Eliminar"><i class="fa fa-trash"></i></a></td>
							</tr>
							 <?php } endforeach ?>
							</tbody>
							</table>
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