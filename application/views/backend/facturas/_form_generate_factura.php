<div class="portlet-body">
    <div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
		<strong>¡Atención!</strong> Al generar la factura se generara para todos los clientes, verifique bien para que mes es el que va generar y la fecha de vencimiento de tales facturas, de lo demás se encarga el sistema.
	</div>
	<hr>
        
	<form class="form-horizontal" method="post" name="generar_factura" action="<?php echo base_url();?>facturas/generar">
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
			<div class="col-md-offset-2 col-md-10">
            	<input type="hidden" name="referencia" value="<?php // traemos la ultima referencia o factura
				$query = $this->db->query("SELECT referencia FROM pagos ORDER BY pagosID DESC LIMIT 0,1");
				if ($query->num_rows() > 0){
				$row = $query->row();
				$ultimo = $row->referencia;
				echo substr($ultimo,4)+5;// traemos la ultima referencia y lo agregamos 5
				} else {echo 1001;}?>"/>
                <input type="hidden" name="generar" value="generar" />  
				<input type="submit" class="btn blue" value="Generar Facturas">
                
			</div>
		</div>
	</form>
	<hr>
	
</div>