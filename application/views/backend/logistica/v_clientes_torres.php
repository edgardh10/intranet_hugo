<body>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Clientes por Torre <small>Segregación de datos</small></h1>
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
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
                                <tr>
                                    <th>Orden</th>
                                    <th>Cliente</th>
                                    <th>Torre</th>
                                    <th>Distrito</th>
                                </tr>
							</thead>
							<tbody>
                            <?php foreach($torres as $row): ?>
                                <tr>
                                    <td><?php echo $row['usuarioID']; ?></td>
                                    <td><a href="<?php echo base_url(); ?>clientes/perfil/<?php echo $row['usuarioID']; ?>"><?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?></a></td>
                                    <td><?php echo $row['torre']; ?></td>
                                    <td><?php echo $row['distrito']; ?></td>
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
