<div class="tab-pane active" id="tab_1_11">
	<div class="portlet-body">
		<table class="table table-striped table-bordered table-advance table-hover" id="facturas_perfil">
			<thead>
                <tr>
					<th></th>
                    <th><i class="fa fa-briefcase"></i>Referencia</th>
					<th class="hidden-xs"><i class="fa fa-bookmark"></i>Descripción</th>
					<th><i class="fa fa-credit-card"></i>Transf. Bancaria</th>
					<th><i class="fa fa-money"></i>Cantidad</th>
					<th><i class="fa fa-calendar"></i>Fecha Vencimiento</th>
					<th><i class="fa fa-calendar-o"></i>Fecha de Pago</th>
					<th></th>
				</tr>	
			</thead>
			<tbody>
				<?php $i=1; foreach($facturas as $fac):// facturas de los clientes ?>
                <tr>
					<td> <?php echo $i++;?></td>
                    <td><a href="<?php echo base_url();?>facturas/actualizar/<?php echo $fac['pagosID']; ?>"><?php echo 'FAC-' . $fac['pagosID']; ?> </a></td>
					<td class="hidden-xs"> Pago correspondite por el mes de <?php echo $fac['mes'];?></td>
					<td>#<?php echo $fac['ope']; ?></td>
                    <td> <?php echo $fac['moneda']; ?><?php echo $fac['cuota']; ?> <br /><span class="label label-<?php if($fac['estado']=='pagado'){echo 'success';} elseif($fac['estado']=='pendiente'){echo 'warning';} elseif($fac['estado']=='inpago'){echo 'danger';}; ?> label-sm"> <?php echo ucfirst($fac['estado']); ?> </span></td>
                    <td> <?php echo $fac['fecha_vencimiento']; ?></td>
                    <td> <?php echo $fac['fecha_pago']; ?>
                    	
                    	

                    </td>
					<td><a class="btn default btn-xs set_hover_info <?php if($fac['estado']=='pagado'){echo 'green';} elseif($fac['estado']=='pendiente'){echo 'yellow';} elseif($fac['estado']=='inpago'){echo 'red';}; ?>-stripe" href="<?php echo base_url();?>facturas/detalle/<?php echo $fac['pagosID']; ?>" data-dir="dir_hover_<?= $i;  ?>">Ver</a>
						
						<div id="dir_hover_<?= $i;  ?>" class="hover_soporte">
										
							<h3>Información Factura</h3>
							<div class="info_soporte">
								<p><strong>Fecha V.:</strong> <?= $fac['fecha_vencimiento']; ?></p>
								<p><strong>Monto:</strong> S/ <?= $fac['cuota']; ?></p>
								<ul class="list-unstyled">
									<li><strong>RUC #:</strong> 20451255412</li>
									<li><strong>Nombre Cuenta BCP:</strong> Cuenta Ahorros</li>
									<li><strong># Cuenta BCP:</strong> 191-17567070-0-13</li>
									<li><strong>SWIFT:</strong> 191-17567070-0-13</li>
								</ul>
							</div>
						</div>

					</td>
				</tr>
                <?php endforeach ?>
				</tr>
			</tbody>
		</table>
	</div>
</div>