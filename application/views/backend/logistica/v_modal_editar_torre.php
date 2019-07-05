<form method="post" action="<?php echo base_url(); ?>logistica/editar_torre/<?php echo $torre['torreID']; ?>">
  <div class="form-group">
    <label class="col-md-4 control-label">Distrito</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-map-marker"></i>
            </span>
			<select name="distritoID" class="form-control">
            <?php foreach($distrito as $dis): ?>
            	<option value="<?php echo $dis['distritoID']; ?>" <?php if($torre['distritoID']==$dis['distritoID']){ echo 'selected="selected"';} ?>><?php echo $dis['distrito']; ?></option>
           <?php endforeach ?>
            </select>
        </div>
	</div>
    <div class="form-group">
    <label class="col-md-4 control-label">Torre</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-signal"></i>
            </span>
			<input type="text" name="torre" class="form-control" value="<?php echo $torre['torre']; ?>"/>
        </div>
	</div>
  
  
  <input type="hidden" name="torreID" value="<?php echo $torre['torreID']; ?>" />
  <input type="submit" class="btn green" value="Actualizar"  /> 
</form>