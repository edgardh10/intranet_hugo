<div class="tab-pane active" id="tab_1_1">
	<form role="form" method="post" action="<?php echo base_url(); ?>usuarios/actualizar_user/<?php echo $row['usuarioID']; ?>">
		<div class="form-group">
			<label class="control-label"><strong>Nombre</strong></label>
			<input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre']; ?>"/>
		</div>
		<div class="form-group">
			<label class="control-label"><strong>Apellido</strong></label>
			<input type="text" name="apellido" class="form-control" value="<?php echo $row['apellido']; ?>"/>
		</div>
		
		<div class="form-group">
			<label class="control-label"><strong>Departamento</strong></label>
			<select name="distritoID" id="departamento" class="form-control">
                <?php foreach ($departamentos as $d): ?>
                    <option value="<?php echo $d['id'] ?>" <?php if($d['id'] == $departamento['id']) { echo 'selected'; } ?>><?php echo $d['departamento'] ?></option>
                <?php endforeach ?>
            </select>
		</div>
		<div class="form-group">
			<label class="control-label"><strong>Provincia</strong></label>
			<select name="provinciaID" id="provincia" class="form-control">
            	<option value="<?php echo $provincia['id'];?>"><?php echo $provincia['provincia'];?></option>
            </select>
		</div>
		<div class="form-group">
			<label class="control-label"><strong>Distrito</strong></label>
			<select name="distritoID" id="distrito" class="form-control">
            	<option value="<?php echo $row['distritoID'];?>"><?php echo $row['distrito'];?></option>
            </select>
		</div>

		
        <div class="form-group">
			<label class="control-label"><strong>Dirección</strong></label>
			<input type="text" name="direccion" class="form-control" value="<?php echo $row['direccion']; ?>"/>
		</div>
        <div class="form-group">
			<label class="control-label"><strong>Teléfono</strong></label>
			<input type="text" name="correo_control" class="form-control" value="<?php echo $row['correo_control']; ?>"/>
		</div>
        <div class="form-group">
			<label class="control-label"><strong>Correo</strong></label>
			<input type="text" name="correo" class="form-control" value="<?php echo $row['correo']; ?>"/>
		</div>
        <div class="form-group">
			<label class="control-label"><strong>Puesto</strong></label>
			<input type="text" name="puesto" class="form-control" value="<?php echo $row['puesto']; ?>"/>
		</div>
        <div class="form-group">
			<label class="control-label"><strong>Sueldo: S/. <?php echo $row['cuotas']; ?></strong></label>
			<input type="text" name="cuotas" class="form-control" value="<?php echo $row['cuotas']; ?>"/>
		</div>                                                    
		<div class="form-group">
			<label class="control-label"><strong>Nivel de acceso</strong></label>
			<select name="nivel_acceso" class="form-control select2_category">
				<?php
					$accesos = $niveles['nivel'];
					foreach ($accesos as $acceso) {		
				?>
				<option value="<?= $acceso; ?>" <?php if ($row['nivel'] == $acceso) { echo 'selected="selected"';} ?> ><?php if ($acceso == 'admin_sup') { echo 'Super Admin';} else { echo ucfirst($acceso);} ?></option>
				<?php } ?>
			</select>
		</div>

		<div class="margiv-top-10">
        	<input type="submit" value="Guardar Cambios" class="btn grey-cascade" />
		</div>
	</form>
</div>