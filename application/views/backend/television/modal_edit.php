<form method="post" action="<?php echo base_url(); ?>television/update/<?php echo $user['usuarioID']; ?>">
	<div class="form-group">
	    <label class="col-md-4 control-label">Plan</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-file"></i>
            </span>
			<input type="text" name="plan" class="form-control" value="<?php echo $plan['plan']; ?>" />
        </div>
	</div>
	
	<div class="form-group">
		<label class="col-md-4 control-label">Costo Mensual</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-money"></i>
            </span>
			<input type="text" name="cuota" class="form-control" value="<?php echo $plan['cuota']; ?>" />
        </div>
	</div>

	<div class="form-group">
		<label class="col-md-4 control-label">Fecha de Afiliación</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </span>
			<input type="text" name="fecha_afiliacion" class="form-control" value="<?php echo $plan['fecha_afiliacion']; ?>" disabled/>
        </div>
	</div>

	<div class="form-group">
	    <label class="col-md-4 control-label">Status</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-database"></i>
            </span>
			<select name="status" class="form-control">
                <option value="1" <?php if($plan['status'] == 1) { echo 'selected'; } ?>>Vigente</option>
				<option value="0" <?php if($plan['status'] == 0) { echo 'selected'; } ?>>No Vigente</option>
            </select>
        </div>
	</div>
    
  
  
  <input type="hidden" name="usuarioID" value="<?php echo $user['usuarioID']; ?>" />
  <input type="submit" class="btn green" value="Actualizar"  /> 
</form>