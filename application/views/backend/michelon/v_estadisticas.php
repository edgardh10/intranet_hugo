<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Clientes por distrito</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body flip-scroll">
							<table class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
							<tr>
								<th>Distrito</th>
								<th class="numeric">Cantidad</th>
							</tr>
							</thead>
							<tbody>
                            <?php foreach($distrito as $row): ?>
							<tr>
								<td><?php echo $row['distrito']; ?></td>
								<td class="numeric"><?php echo $row['cantidad']; ?></td>
							</tr>
                            <?php endforeach ?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
                
                <div class="col-md-6">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Estado de equipos</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body flip-scroll">
							<table class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
							<tr>
								<th>Equipo</th>
                                <th>Estado</th>
								<th class="numeric">Cantidad</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach($equipos as $row): ?>
                                <tr>
                                    <td><?php if($row['tipo']==1){echo 'Receptores';} elseif($row['tipo']==2){echo 'Routers';} elseif($row['tipo']==3){echo 'Equipos de Torre';} ?></td>
                                    <td><?php if($row['asignado']==1){echo 'Asignados';} elseif($row['asignado']==0){echo 'En almacén';} ?></td>
                                    <td class="numeric"><?php echo $row['cantidad']; ?></td>
                                </tr>
                                <?php endforeach ?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
                
                <div class="col-md-6">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Ingresos por mes</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body flip-scroll">
							<table class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
							<tr>
								<th>Mes</th>
								<th class="numeric">Ingreso</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach($ingresos as $row): ?>
                            
                                <tr>
                                    <td><?php
                                    $mes = substr($row['mes'], -8, 2);
									$anio = substr($row['mes'], -4);
									switch($mes){case '01' : echo 'Enero - '; break; case '02' : echo 'Febrero - '; break; case '03' : echo 'Marzo - '; break; case '04' : echo 'Abril - '; break; case '05' : echo 'Mayo - '; break; case '06' : echo 'Junio - '; break; case '07' : echo 'Julio - '; break; case '08' : echo 'Agosto - '; break; case '09' : echo 'Septiembre - '; break; case '10' : echo 'Octubre - '; break; case '11' : echo 'Noviembre - '; break; case '12' : echo 'Diciembre - '; break;}; echo $anio;
									
									?></td>
                                    <td class="numeric">S/. <?php echo $row['total']; ?></td>
                                </tr>
                                <?php endforeach ?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
                
                <div class="col-md-6">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Receptores por distrito</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body flip-scroll">
							<table class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
							<tr>
								<th>Distrito</th>
                                <th>Equipo</th>
								<th class="numeric">Cantidad</th>
							</tr>
							</thead>
							<tbody>
                                    <?php foreach($receptores as $row): ?>
                                <tr>
                                    <td><?php echo $row['distrito']; ?></td>
                                    <td><?php echo $row['marca']; ?></td>
                                    <td class="numeric"><?php echo $row['cantidad']; ?></td>
                                </tr>
                                <?php endforeach ?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
                
                <div class="col-md-6">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Routers por distrito</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body flip-scroll">
							<table class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
							<tr>
								<th>Distrito</th>
                                <th>Equipo</th>
								<th class="numeric">Cantidad</th>
							</tr>
							</thead>
							<tbody>
								<?php foreach($router as $row): ?>
                                <tr>
                                    <td><?php echo $row['distrito']; ?></td>
                                    <td><?php echo $row['marca']; ?></td>
                                    <td class="numeric"><?php echo $row['cantidad']; ?></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
							</table>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
                
                <div class="col-md-6">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase">Clientes por torre</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body flip-scroll">
							<table class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
							<tr>
								<th>Torre</th>
								<th class="numeric">Cantidad</th>
							</tr>
							</thead>
							<tbody>
								<?php foreach($torre as $row): ?>
                                <tr>
                                    <td><?php echo $row['torre']; ?></td>
                                    <td class="numeric"><?php echo $row['cantidad']; ?></td>
                                </tr>
                                <?php endforeach ?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
                
                
                
                </div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
