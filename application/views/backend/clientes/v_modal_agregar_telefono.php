<form method="post" action="<?php echo base_url(); ?>clientes/agregar_telefono/<?php //echo $torre['torreID']; ?>">
  <div class="form-group">
    <label class="col-md-4 control-label">Teléfono</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-fax"></i>
            </span>
			<input type="text" name="tel_telefono" class="form-control" />
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
    
  
  
  <input type="hidden" name="usuarioID" value="<?php echo $user['usuarioID']; ?>" />
  <input type="submit" class="btn green" value="Ingresar"  /> 
</form>