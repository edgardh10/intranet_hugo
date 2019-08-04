
<form method="post" action="<?php echo base_url(); ?>television/store/<?php echo $user['usuarioID']; ?>">
  	<div class="form-group">
	    <label class="col-md-4 control-label">Plan</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-file"></i>
            </span>
			<input type="text" name="plan" class="form-control" />
        </div>
	</div>
	
	<div class="form-group">
		<label class="col-md-4 control-label">Costo Mensual</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-money"></i>
            </span>
			<input type="text" name="cuota" class="form-control" />
        </div>
	</div>

	<div class="form-group">
		<label class="col-md-4 control-label">Fecha de Afiliación</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </span>
			<input type="text" name="fecha_afiliacion" readonly class="form-control form-control-inline input-medium date-picker_modal todo-taskbody-due" />
        </div>
	</div>

	<div class="form-group">
	    <label class="col-md-4 control-label">Status</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-database"></i>
            </span>
			<select name="status" class="form-control">
				<option value="-1">Seleccione</option>
                <option value="1">Vigente</option>
				<option value="0">No Vigente</option>
            </select>
        </div>
	</div>
    
  
  
  <input type="hidden" name="usuarioID" value="<?php echo $user['usuarioID']; ?>" />
  <input type="submit" class="btn green" value="Ingresar"  /> 
</form>
<script src="<?php echo base_url();?>recursos/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>recursos/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url();?>recursos/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>


<script type="text/javascript">
    $('.date-picker_modal').datepicker({
        rtl: false,
        orientation: "left",
        autoclose: true
    });
</script>