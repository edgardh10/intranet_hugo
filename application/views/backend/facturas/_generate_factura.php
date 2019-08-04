<?php 
	
	$fecha_vencimiento = $_POST['fecha_vencimiento'];
	$mes = $_POST['mes'];
	$referencia = $_POST['referencia'];
	$prefijo = 'FAC-';

	foreach($generar_datos as $row){

 		$cuota = $row['cuotas'];

		$user_tv = $this->db->get_where('television' , array('usuarioID' => $row['usuarioID'], 'status' => 1 )); // verificamos si el usuario tiene un plan de tv

		if ( $user_tv->num_rows() == 1 ) { // si lo tiene, entonces agregamos el costo de su plan a la factura
			
			$user_tv = $user_tv->row_array();
			
			$cuota = $row['cuotas'] + $user_tv['cuota']; // cuota asignada: datos + tv

		}

	    $verify_data = array(
			'usuarioID' => $row['usuarioID'],
			'cuota' => $cuota,
			'fecha_vencimiento' => $fecha_vencimiento,
			'mes' => $mes,
			'referencia' => $prefijo.$referencia++
		);
	    $query = $this->db->get_where('pagos' , $verify_data);
	    if($query->num_rows() < 1) {
	        $this->db->insert('pagos' , $verify_data);
	    }
	}
?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
	<strong>¡Felicidades!</strong> las facturas se han generado Satisfactoriamente para el mes <strong><?php echo $_POST['mes'];?></strong>.
	<strong>Recuerde, Se han generado en la misma factura el costo del plan de TV para los que tienen plan.</strong>	
</div>