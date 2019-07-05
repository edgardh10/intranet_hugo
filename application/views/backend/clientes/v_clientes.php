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
								<span class="caption-subject font-green-sharp bold uppercase"><?php  echo $title; ?> </span>
							</div>
							<div class="tools">
                            	<a href="<?php echo base_url();?>clientes/agregar"><button type="button" class="btn btn-default"><i class="fa fa-plus-square"></i> Agregar Nuevo Cliente</button></a>
								<a href="javascript:;" class="collapse"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
                                <th> DNI</th>
								<th> Nombre</th>
								<th> Apellido</th>
								<th> Mensualidad</th>
								<th> Correo</th>
                                <th> Distrito</th>
							</tr>
							</thead>
							<tbody>
                            <?php foreach ($usuarios as $row): ?>
							<tr>
                                <td>
									 <a href="<?php echo base_url().'clientes/perfil/'.$row['usuarioID'];?>" title="Detalle de <?php echo $row['nombre'] ?> <?php echo $row['apellido'] ?>"><?php echo $row['usuario'] ?></a>
								</td>
								<td><?php echo $row['nombre'] ?></td>
								<td><?php echo $row['apellido'] ?></td>
								<td><?php echo $row['cuotas'] ?></td>
								<td><?php echo $row['correo'] ?></td>
								<td><?php echo $row['distrito'] ?></td>
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