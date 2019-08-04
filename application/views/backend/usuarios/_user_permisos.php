<div class="tab-pane" id="tab_1_5">
	<form action="<?php echo base_url(); ?>usuarios/editar_permisos/<?php echo $row['usuarioID']; ?>" method="post">
		<table class="table table-light table-hover">
		<tr>
			<td>Acceso a modulo Clientes</td>
			<td>
				<label class="uniform-inline">
                <input type="radio" name="clientes" value="<?php echo $permiso['clientes']; ?>" checked  />
                <?php echo ucfirst($permiso['clientes']); ?></label>
                <?php if($permiso['clientes']=='denegado') { ?>
                <label class="uniform-inline">
				<input type="radio" name="clientes" value="permitido"/>
				Permitir </label>
                <?php } elseif($permiso['clientes']=='permitido') { ?>
				<label class="uniform-inline">
				<input type="radio" name="clientes" value="denegado"/>
				Denegar </label>
                <?php } ?>
			</td>
		</tr>
        <tr>
			<td>Acceso a modulo Pagos</td>
			<td>
				<label class="uniform-inline">
                <input type="radio" name="pagos" value="<?php echo $permiso['pagos']; ?>" checked  />
                <?php echo ucfirst($permiso['pagos']); ?></label>
                <?php if($permiso['pagos']=='denegado') { ?>
                <label class="uniform-inline">
				<input type="radio" name="pagos" value="permitido"/>
				Permitir </label>
                <?php } elseif($permiso['pagos']=='permitido') { ?>
				<label class="uniform-inline">
				<input type="radio" name="pagos" value="denegado"/>
				Denegar </label>
                <?php } ?>
			</td>
		</tr>
        <tr>
			<td>Acceso a modulo Servicio al cliente</td>
			<td>
				<label class="uniform-inline">
                <input type="radio" name="servicio_cliente" value="<?php echo $permiso['servicio_cliente']; ?>" checked  />
                <?php echo ucfirst($permiso['servicio_cliente']); ?></label>
                <?php if($permiso['servicio_cliente']=='denegado') { ?>
                <label class="uniform-inline">
				<input type="radio" name="servicio_cliente" value="permitido"/>
				Permitir </label>
                <?php } elseif($permiso['servicio_cliente']=='permitido') { ?>
				<label class="uniform-inline">
				<input type="radio" name="servicio_cliente" value="denegado"/>
				Denegar </label>
                <?php } ?>
			</td>
		</tr>
        <tr>
			<td>Acceso a modulo Logistica</td>
			<td>
				<label class="uniform-inline">
                <input type="radio" name="logistica" value="<?php echo $permiso['logistica']; ?>" checked  />
                <?php echo ucfirst($permiso['logistica']); ?></label>
                <?php if($permiso['logistica']=='denegado') { ?>
                <label class="uniform-inline">
				<input type="radio" name="logistica" value="permitido"/>
				Permitir </label>
                <?php } elseif($permiso['logistica']=='permitido') { ?>
				<label class="uniform-inline">
				<input type="radio" name="logistica" value="denegado"/>
				Denegar </label>
                <?php } ?>
			</td>
		</tr>
		</table>
		<!--end profile-settings-->
		<div class="margin-top-10">
        	<input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID']; ?>" />
        	<input type="submit" class="btn grey-cascade" value="Asignar permisos" />
		</div>
	</form>
	
	<?php
		
		$torres = $this->db->get_where('torres');

		$torres = $torres->result_array();

	?>

	<div class="portlet light" style="margin-top: 40px;">

		<div class="ver_permisos_torre">
			<h3>Permisos a Grupo de Usuarios segun torre</h3>
			<table class="table table-striped">
				<thead>
					<tr>
						<th></th>
						<th>Torre o Estación</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$permisos = $this->db->get_where('permisos_torre', array('usuarioID' => $row['usuarioID'] ));
						$permisos = $permisos->result_array();
						foreach ($permisos as $key => $per):

							$torre_name = $this->db->get_where('torres', array('torreID' => $per['torreID'] ));
							$torre_name = $torre_name->row_array();
					?>
						<tr>
							<td></td>
							<td><?php echo $torre_name['torre'] ?></td>
							<td><a href="<?php echo base_url().'usuarios/delete_permiso_torres/'. $per['id'] ?>" title="Quitar Permiso"><i class="fa fa-trash"></i></a></td>
						</tr>
					
					<?php endforeach ?>
				</tbody>
			</table>
		</div>

		<form method="post" action="<?php echo base_url().'usuarios/set_permiso_torres' ?>">
			<div class="form-group">
				<label class="control-label col-md-3">Lista de torres</label>
				<div class="col-md-6">
					<select class="form-control select2_category" name="torreID">
						<option value="">Seleccionar...</option>
                        <?php foreach($torres as $torr): ?>
                        	<?php
                        	$this->db->select('*');
							$this->db->from('distritos');
							$this->db->where('id', $torr['distritoID']);
							$query = $this->db->get_where();
							$dist = $query->row_array();
                        	?>
						<option value="<?php echo $torr['torreID']; ?>"><?php echo $torr['torre']; ?> ➟ <?php echo $dist['distrito']; ?></option>
                        <?php endforeach ?>
					</select>
				</div>
				<div class="col-md-3">
					<input type="hidden" name="usuarioID" value="<?php echo $row['usuarioID']; ?>" />
        			<input type="submit" class="btn grey-cascade" value="Asignar permisos" />
				</div>
			</div>
		</form>
		
	</div>	


</div>
