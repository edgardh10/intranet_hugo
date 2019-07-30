<div class="page-title">
	<h1><?php echo $row['nombre'];?> <?php echo $row['apellido'];?> <small>Detalle del Cliente</small></h1>
     <?php
            $asignar = $this->session->flashdata('asignar');
			if ($asignar) {// alerta para cuando editamos una marca ?>
			   <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <strong>¡La Modificación se ha realizado correctamente!</strong>.
			</div>
			<?php } ?>
            <?php
            $pass = $this->session->flashdata('pass');
			if ($pass) {// alerta para cuando editamos la contraseña ?>
			   <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <strong>¡La clave se ha cambiado correctamente!</strong>.
			</div>
			<?php } ?>
            <?php
            $factura = $this->session->flashdata('factura');
			if ($factura) {// alerta para cuando editamos una marca ?>
			   <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <strong>¡La factura se ha creado correctamente!</strong>.
			</div>
			<?php } ?>
</div>