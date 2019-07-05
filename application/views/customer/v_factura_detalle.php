<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Detalle de Factura: <?php echo $row['referencia'];?> <small> de <?php echo $title; ?></small></h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="portlet light">
				<div class="portlet-body">
					<div class="invoice">
						<div class="row invoice-logo">
							<div class="col-xs-6 invoice-logo-space">
								<img src="<?php echo base_url(); ?>cargas/img/logo_m.png" class="img-responsive" alt=""/>
							</div>
							<div class="col-xs-6 note note-<?php if($row['estado']=='pagado'){echo 'success';} elseif($row['estado']=='inpago'){echo 'danger';} else if($row['estado']=='pendiente'){echo 'warning';} ?>">
								<p>REF: #<?php echo $row['referencia'];?> / <?php echo $row['fecha_vencimiento'];?> <span class="muted">Estado de la Factura: <strong><?php echo ucfirst($row['estado']);?></strong></span></p>
							</div>
						</div>
						<hr/>
						<div class="row">
							<div class="col-xs-4">
								<h3><strong>Cliente:</strong></h3>
								<ul class="list-unstyled">
									<li><strong>DNI #:</strong> <?php echo $row['usuario'];?></li>
								  <li><strong>Nombre:</strong> <?php echo $row['nombre'];?> <?php echo $row['apellido'];?></li>
									<li><strong>Dirección:</strong> <?php echo $row['direccion'];?>,</li>
									<li><?php echo $row['distrito'];?>,</li>
                                    <li>Lima, Perú.</li>
								</ul>
							</div>
							<div class="col-xs-4">
								<h3><strong>MultitelRM S.A.C</strong></h3>
								<ul class="list-unstyled">
									<li>Servicios de Internet dedicado a sectores con alto potencial, estamos posicionados en el mercado por nuestro servicio y buena calidad.</li>
								</ul>
							</div>
							<div class="col-xs-4 invoice-payment">
								<h3><strong>Detalles de Pago:</strong></h3>
								<ul class="list-unstyled">
									<li><strong>RUC #:</strong> 20451255412</li>
									<li><strong>Nombre Cuenta BCP:</strong> Cuenta Ahorros</li>
									<li><strong># Cuenta BCP:</strong> 191-17567070-0-13</li>
									<li><strong>SWIFT:</strong> 191-17567070-0-13</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>#</th>
									<th>Item</th>
									<th class="hidden-480">Descripción</th>
									<th class="hidden-480">Cantidad</th>
									<th class="hidden-480">Monto</th>
									<th>Total</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>1</td>
									<td>Servicio de Internet</td>
									<td class="hidden-480">Servicio de internet por el mes de <?php echo $row['mes'];?></td>
									<td class="hidden-480">1 mes</td>
									<td class="hidden-480">S/. <?php echo $row['cuota'];?>.00</td>
									<td>S/. <?php echo $row['cuota'];?>.00</td>
								</tr>
<!--								<tr>
									<td>
										 2
									</td>
									<td>
										 Furniture
									</td>
									<td class="hidden-480">
										 Office furniture purchase
									</td>
									<td class="hidden-480">
										 15
									</td>
									<td class="hidden-480">
										 $169
									</td>
									<td>
										 $4169
									</td>
								</tr>
								<tr>
									<td>
										 3
									</td>
									<td>
										 Foods
									</td>
									<td class="hidden-480">
										 Company Anual Dinner Catering
									</td>
									<td class="hidden-480">
										 69
									</td>
									<td class="hidden-480">
										 $49
									</td>
									<td>
										 $1260
									</td>
								</tr>
								<tr>
									<td>
										 3
									</td>
									<td>
										 Software
									</td>
									<td class="hidden-480">
										 Payment for Jan 2013
									</td>
									<td class="hidden-480">
										 149
									</td>
									<td class="hidden-480">
										 $12
									</td>
									<td>
										 $866
									</td>
								</tr>
-->								</tbody>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="well">
									<address>
									<strong>Multitel RM S.A.C</strong><br/>
									Mz 136 Lt 28 comite 10, <br/>
									Enrique Milla Ochoa<br/>
                                    Los Olivos, Lima, Peru.<br />
									<abbr title="Phone">Tel:</abbr> (511) 528-8403 </address>
									<address><strong>Hugo Meza</strong><br/>hmeza@multitelrm.com
									</address>
								</div>
							</div>
							<div class="col-xs-8 invoice-block">
								<ul class="list-unstyled amounts">
									<li><strong>Sub - Total:</strong> S/. <?php echo $row['cuota'];?>.00</li>
									<li><strong>Descuento:</strong> 0.00 </li>
									<li><strong>IGV:</strong> -----</li>
									<li><strong>Total a Pagar:</strong> S/. <?php echo $row['cuota'];?>.00</li>
								</ul>
                               <p style="text-align:left;"><strong>Comentario:</strong> <?php echo $row['mensaje'];?></p>
								<br/>
								<a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">Imprimir <i class="fa fa-print"></i></a>
                                <?php if($this->session->userdata('nivel')=='admin_sup'){ ?>
								<a class="btn btn-lg red hidden-print margin-bottom-5">Eliminar <i class="fa fa-trash"></i></a>
                                <?php } ?>
                              <?php if($row['estado']!='pagado'){ ?>
                             <a class="btn btn-lg green hidden-print margin-bottom-5" data-toggle="modal" href="<?php echo base_url(); ?>customer/actualizar/<?php echo $row['pagosID']; ?>"><?php if($row['estado']=='pendiente'){echo 'Editar pago ';} else {echo 'Pagar ';} ?><i class="fa fa-money"></i></a>
                              <?php } ?>
						  </div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
