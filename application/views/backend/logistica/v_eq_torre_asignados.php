<body>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Equipos segun torre <small>segun torre</small></h1>
			</div>
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
								<span class="caption-subject font-green-sharp bold uppercase"><?= $title ?></span>
							</div>
							<div class="tools">
                            	<a href="javascript:;" class="collapse"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body">
                        <?php $agregar = $this->session->flashdata('agregar');
						if ($agregar) { ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡El equipo se ha AGREGADO correctamente!</strong>
						</div>
						<?php } ?>
                        <?php $editar = $this->session->flashdata('editar');
						if ($editar) { ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡Se ha retornado Equipo a ALMACÉN!</strong>
						</div>
						<?php } ?>
                        <?php $eliminar = $this->session->flashdata('eliminar');
						if ($eliminar) { ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡El equipo ha sido ELIMINADO correctamente!</strong>
						</div>
						<?php } ?>
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
                                <tr>
                                    <th>Orden</th>
                                    <th>Marca</th>
                                    <th>N° MAC</th>
                                    <th>Numero Serie</th>
                                    <th>Proveedor</th>
                                    <th>Fecha Compra</th>
                                    <th>Torre</th>
                                    <th>Distrito</th>
                                    <td></td>
                                </tr>
							</thead>
							<tbody>
                            <?php foreach($equipo as $row): ?>
                                <tr>
                                    <td><?php echo $row['equiposID']; ?></td>
                                    <td><?php echo $row['marca']; ?></td>
                                    <td><?php echo $row['mac']; ?></td>
                                    <td><?php echo $row['numSerie']; ?></td>
                                    <td><?php echo $row['proveedor']; ?></td>
                                    <td><?php echo $row['fechaCompra']; ?></td>
                                    <td><?php echo $row['torre']; ?></td>
                                    <td><?php echo $row['distrito']; ?></td>
                                    <td>
                                    <a class="btn default" href="#" onClick="showAjaxModal('<?php echo base_url(); ?>modal/modal_volver_almacen/<?php echo $row['equiposID']; ?>');" title="Retornar a almacen"><i class="fa fa-mail-forward"></i></a>
                                    </td>
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