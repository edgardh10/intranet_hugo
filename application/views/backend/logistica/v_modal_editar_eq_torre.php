<form method="post" action="<?php echo base_url(); ?>logistica/editar_eq_torre/<?php echo $equipo['equiposID']; ?>">
  
  
  <div class="form-group">
    <label class="col-md-4 control-label">Seleccionar Marca</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-ticket"></i>
            </span>
            <select name="marcasID" id="distrito" class="form-control">
                <?php foreach ($marcas as $mark): ?>
                <option value="<?php echo $mark['marcasID']; ?>" <?php if($equipo['marcasID']==$mark['marcasID']){echo 'selected="selected"';} ?>><?php echo $mark['marca']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
	</div>
    <div class="form-group">
    <label class="col-md-4 control-label">N° Mac</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-slack"></i>
            </span>
			<input type="text" name="mac" class="form-control" value="<?php echo $equipo['mac']; ?>"/>
        </div>
	</div>
    <div class="form-group">
    <label class="col-md-4 control-label">N° Serie</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-leaf"></i>
            </span>
			<input type="text" name="numSerie" class="form-control" placeholder="<?php 
			$this->db->select('numSerie');
			$this->db->from('equipos');
			$this->db->order_by('equiposID', 'desc');
			$this->db->limit(1);
			$query = $this->db->get();
			foreach ($query->result() as $row)
				{
				echo $row->numSerie;
				}
			 ?>" value="<?php echo $equipo['numSerie']; ?>" />
        </div>
	</div>
    <div class="form-group">
    <label class="col-md-4 control-label">Proveedor</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-puzzle-piece"></i>
            </span>
			<input type="text" name="proveedor" class="form-control" value="<?php echo $equipo['proveedor']; ?>"/>
        </div>
	</div>
  <div class="form-group">
        <label for="inputEmail1" class="col-md-4 control-label">Fecha de Compra</label>
        <div class="col-md-7 input-group">
        <span class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </span>
            <input type="text" name="fechaCompra" class="form-control" id="mask_date" placeholder="__/__/____" value="<?php echo $equipo['fechaCompra']; ?>">
        </div>
    </div>
    <div class="form-group">
    <label class="col-md-4 control-label">Asignar a torre</label>
        <div class="col-md-7 input-group">
            <span class="input-group-addon">
                <i class="fa fa-ticket"></i>
            </span>
            <select name="torreID" id="distrito" class="form-control">
            	<option value=""></option>
                <?php foreach ($torre as $torr): ?>
                <option value="<?php echo $torr['torreID']; ?>"><?php echo $torr['torre']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
	</div>
    <input type="hidden" name="asignado" value="1" />
    <input type="hidden" name="tipo" value="3" /><!-- 3 = eQUIPO DE TORRE -->
  <input type="submit" class="btn green" value="Actualizar Equipo"  /> 
</form>
