
<div class="alert alert-info fade in alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>!Atención!</strong> Vas a migrar este prospecto a <strong>cliente</strong>, sin embargo, te advertimos que rellenes toda la información faltante y una vez finalizada el proceso de migración, se borrara el prospecto y se convertira en cliente.
</div>

<form class="form-horizontal" method="post" name="generar_factura" action="<?php echo base_url();?>gestion/migrar_venta_cliente/<?php echo $venta['ventasID']; ?>">
    
    
    <div class="form-group">
		<label for="inputEmail12" class="col-md-4 control-label"> Teléfono</label>
		<div class="col-md-7">
			<div class="input-icon">
				<i class="fa fa-phone"></i>
				<input type="text" name="tel_telefono" class="form-control" value="<?php echo $venta['v_telefono']; ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
    	<label class="col-md-4 control-label">Operador</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-database"></i>
            </span>
			<select name="tel_operador" class="form-control">
				<option value="-1"></option>
                <option value="m">Movistar</option>
				<option value="c">Claro</option>
				<option value="b">Bitel</option>
				<option value="e">Entel</option>
				<option value="rpm">RPM</option>
				<option value="rpc">RPC</option>
				<option value="f">Fijo</option>
            </select>
        </div>
	</div>
    <div class="form-group">
		<label for="inputEmail12" class="col-md-4 control-label"> Dirección</label>
		<div class="col-md-7">
			<div class="input-icon">
				<i class="fa fa-map-marker"></i>
				<input type="text" name="v_direccion" class="form-control" value="<?php echo $venta['v_direccion']; ?>">
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="inputEmail12" class="col-md-4 control-label"> Distrito</label>
		<div class="col-md-7">
			<div class="input-icon">
				<i class="fa fa-map"></i>
				<select class="form-control" name="distritoID">
                	<option value="-1"></option>
                <?php foreach($distrito as $fila):  ?>
                	<option value="<?php echo $fila['distritoID']; ?>"><?php echo $fila['distrito']; ?></option>
                <?php endforeach ?>
                </select>
			</div>
		</div>
	</div>
    
    <div class="form-group">
		<label for="inputEmail1" class="col-md-4 control-label"> Fecha de Instalación</label>
		<div class="col-md-4 input-group">
        <span class="input-group-addon">
        	<i class="fa fa-calendar"></i>
        </span>
			<input type="text" name="v_fecha_visita" value="<?php echo $venta['v_fecha_visita']; ?>" class="form-control form-control-inline input-medium date-picker todo-taskbody-due" placeholder="__/__/____">
		</div>
	</div>

	<div class="form-group">
		<label for="inputEmail12" class="col-md-4 control-label"> Correo</label>
		<div class="col-md-7">
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input type="text" name="correo" class="form-control" value="">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail12" class="col-md-4 control-label"> Correo Control</label>
		<div class="col-md-7">
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input type="text" name="correo_control" class="form-control" value="">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail12" class="col-md-4 control-label"> Mensualidad</label>
		<div class="col-md-7">
			<div class="input-icon">
				<i class="fa fa-money"></i>
				<input type="text" name="mensualidad" class="form-control" value="">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail12" class="col-md-4 control-label"> Sexo</label>
		<div class="col-md-7">
			<div class="input-icon">
				<i class="fa fa-life-ring"></i>
				<select class="form-control" name="sexo">
                    <option value="-1">Seleccione</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
			</div>
		</div>
	</div>
    <div class="form-group">
		<div class="col-md-offset-2 col-md-10">
		<input type="hidden" name="v_nombre" value="<?php echo $venta['v_nombre']; ?>">
    	<input type="hidden" name="v_apellido" value="<?php echo $venta['v_apellido']; ?>">
    	<input type="hidden" name="v_dni" value="<?php echo $venta['v_dni']; ?>">
        
        <input type="submit" class="btn blue" value="Migrar a cliente">
            
		</div>
	</div>
</form>