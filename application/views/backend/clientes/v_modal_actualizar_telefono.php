<form method="post" action="<?php echo base_url(); ?>clientes/editar_telefono/<?php echo $tel['telefonoID']; ?>">
  <div class="form-group">
    <label class="col-md-4 control-label">Teléfono</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-fax"></i>
            </span>
			<input type="text" name="tel_telefono" class="form-control" value="<?php echo $tel['tel_telefono']; ?>" />
        </div>
	</div>
  <div class="form-group">
    <label class="col-md-4 control-label">Operador</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-database"></i>
            </span>
			<select name="tel_operador" class="form-control">
				<option value="<?php echo $tel['tel_operador']; ?>"><?php switch($tel['tel_operador']){
																case 'm':
																	echo 'Movistar';
																	break;
																case 'rpm':
																	echo 'RPM';
																	break;
																case 'c':
																	echo 'Claro';
																	break;
																case 'rpc':
																	echo 'RPC';
																	break;
																case 'f':
																	echo 'Fijo';
																	break;
																case 'b':
																	echo 'Bitel';
																	break;
																case 'e':
																	echo 'Entel';
																	break;
																} ?></option>
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
  <input type="submit" class="btn green" value="Actualizar"  /> 
</form>