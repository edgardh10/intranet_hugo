<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title"><h1>Lista de <?php  echo $title; ?> <small>Puede ver información detallada, editar y más.</small></h1></div>
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
								<i class="fa fa-users font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase"><?php  echo $title; ?></span>
							</div>
							<div class="tools">
                            	<a href="javascript:;" class="collapse"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
                                <th> Referencia</th>
								<th> Cliente</th>
								<th> Monto</th>
								<th> Mes</th>
                                <th> OPE BCP</th>
                                <th> Fecha Vencimiento</th>
                                <th> Fecha Pago</th>
                                <th> </th>
							</tr>
							</thead>
							<tbody>
                            <?php foreach ($facturas as $row): ?>
							<tr>
                                <td><?php echo 'FAC-' . $row['pagosID'] ?></td>
								<td><a href="<?php echo base_url().'clientes/perfil/'.$row['usuarioID'];?>" title="Detalle de <?php echo $row['nombre'] ?> <?php echo $row['apellido'] ?>"><?php echo $row['nombre'] ?> <?php echo $row['apellido'] ?></a></td>
								<td><?php echo $row['cuota'] ?></td>
								<td><?php echo $row['mes'] ?></td>
								<td><?php echo $row['ope'] ?></td>
                                <td><?php echo $row['fecha_vencimiento'] ?></td>
								<td><?php echo $row['fecha_pago'] ?></td>
                                <td><a href="<?php echo base_url().'facturas/detalle/'.$row['pagosID'];?>" title="Detalle de la factura" class="btn btn-xs default"><i class="fa fa-search"></i> Ver</a></td>
							</tr>
							 <?php endforeach ?>
							</tbody>
							</table>
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