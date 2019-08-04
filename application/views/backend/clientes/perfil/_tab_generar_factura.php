<div class="tab-pane" id="tab_1_4">
	<div class="row">
		<div class="col-md-12">
        	<div class="portlet-body">
				<div class="alert alert-warning alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
					Generar Factura para <strong><?php echo $row['nombre'];?> <?php echo $row['apellido'];?></strong>
				</div>
				<hr>

				<form class="form-horizontal" method="post" name="generar_factura" action="<?php echo base_url();?>clientes/individual">
					<div class="form-group">
						<label for="inputEmail1" class="col-md-2 control-label">Fecha de Vencimiento</label>
						<div class="col-md-4 input-group">
					        <span class="input-group-addon">
					        	<i class="fa fa-calendar"></i>
					        </span>
							<input type="text" name="fecha_vencimiento" class="form-control form-control-inline input-medium date-picker todo-taskbody-due" readonly>
						</div>
					</div>
				    <div class="form-group">
						<label class="control-label col-md-2">Mes a Facturar</label>
						<div class="col-md-4">
							<div class="input-group input-medium date date-picker" data-date="<?php echo date('m/Y') ?>" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
								<input type="text" name="mes" class="form-control" readonly>
								<span class="input-group-btn">
								<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
								</span>
							</div>
							<!-- /input-group -->
							<span class="help-block">
							Solamente mes y año </span>
						</div>
					</div>
			        <div class="form-group">
						<label class="control-label col-md-2">Comentario</label>
						<div class="col-md-4">
							<div class="">
			                	<textarea class="form-control" rows="3" name="mensaje" placeholder="Comentario breve al cliente..."></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-10">
				        	<input type="hidden" name="referencia" value="FAC-<?php // traemos la ultima referencia o factura
							$query = $this->db->query("SELECT referencia FROM pagos ORDER BY pagosID DESC LIMIT 0,1");
							if ($query->num_rows() > 0){
							$linea = $query->row();
							$ultimo = $linea->referencia;
							echo substr($ultimo,4)+5;// traemos la ultima referencia y lo agregamos 5
							} else {echo 1001;}?>"/>
				            <input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID'];?>" />
				            <input type="hidden" name="cuota" value="<?php echo $row['cuotas'];?>" />                                        
				            <input type="hidden" name="generar" value="generar" />  
							<input type="submit" class="btn blue" value="Generar Factura">
						</div>
					</div>
				</form>
				<hr>
			</div>
		</div>
	</div>
</div>