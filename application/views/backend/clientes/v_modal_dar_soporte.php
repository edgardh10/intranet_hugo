<form class="form-horizontal" method="post" action="<?php echo base_url();?>gestion/agregado/">
	<div class="form-group">
		<label class="col-md-4 control-label">Cliente</label>
		<div class="col-md-7 input-group">
			<span class="input-group-addon">
                <i class="fa fa-users"></i>
            </span>
            <select name="s_cliente" class="form-control" disabled="true">
                <option value="<?php echo $cliente['usuario'] ?>" selected><?php echo $cliente['nombre'] ?> <?php echo $cliente['apellido'] ?></option>
                
            </select>
		</div>
	</div>
    <div class="form-group">
		<label class="col-md-4 control-label">Seleccionar Técnico</label>
		<div class="col-md-7 input-group">
			<span class="input-group-addon">
                <i class="fa fa-wrench"></i>
            </span>
            <select name="s_tecnico" id="distrito" class="form-control">
                <option value=""></option>
                <?php foreach ($usuarios as $row): ?>
                <option value="<?php echo $row['usuarioID'] ?>"><?php echo $row['nombre'] ?> <?php echo $row['apellido'] ?></option>
                <?php endforeach ?>
            </select>
		</div>
	</div>
    <div class="form-group">
		<label for="inputEmail1" class="col-md-4 control-label">Fecha a realizar soporte</label>
		<div class="col-md-7 input-group">
        <span class="input-group-addon">
        	<i class="fa fa-calendar"></i>
        </span>
			<input type="text" name="s_fecha_visita" class="form-control form-control-inline input-medium date-picker todo-taskbody-due" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword1" class="col-md-4 control-label">Problema a reportar</label>
		<div class="col-md-7">
			<div class="input-icon right">
				<i class="fa fa-user"></i>
				<textarea name="s_problema" class="form-control" placeholder="Ingrese problema" rows="8"></textarea>
			</div>
		</div>
	</div>
    <div class="form-group">
		<label for="inputPassword1" class="col-md-4 control-label">Visible al Cliente</label>
		<div class="col-md-7 input-group">
			<span class="input-group-addon">
                <i class="fa fa-eye"></i>
            </span>
                <select name="s_visible" class="form-control">
					<option value="si">SI</option>
                    <option value="no">NO</option>
                </select>
			
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-offset-2 col-md-9">
        	<input type="hidden" name="procesar" value="1">
			<input type="submit" class="btn green pull-right" value="Ingresar nuevo soporte">
		</div>
	</div>
</form>