<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title"><h1>Tabla <?php  echo $title; ?> <small>Puede ver información detallada, editar y más.</small></h1></div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase"> <?=$title?></span>
							</div>
							<div class="tools">
                            	<a href="#" onclick="showAjaxModal('<?= base_url('modal/modal_add_plan/') ?>');"><button type="button" class="btn btn-default"><i class="fa fa-plus-square"></i> Agregar plan</button></a>
								<a href="javascript:;" class="collapse"></a>
								<a href="#portlet-config" data-toggle="modal" class="config"></a>
							</div>
						</div>
						<div class="portlet-body">
                        <div class="portlet-body">
                        <?php
                        $editar = $this->session->flashdata('editar');
						if ($editar) {// alerta para cuando editamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡El plan se ha actualizado correctamente!</strong>
						</div>
						<?php } ?>
                        <?php
                        $eliminar = $this->session->flashdata('eliminar');
						if ($eliminar) {// alerta para cuando eliminamos una marca ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡El plan se ha eliminado del sistema correctamente!</strong>
						</div>
						<?php } ?>
                        <?php 
                        $agregar = $this->session->flashdata('agregar');
						if ($agregar) { ?>
						   <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong>¡El plan se ha agregado Correctamente!</strong>
						</div>
						<?php } ?>
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
                            	<th> Item</th>
                                <th> Plan</th>
								<th> Precio</th>
								<th> Velocidad</th>
								<th> Tipo</th>
								<th> Descripcion</th>
								<th> Visible</th>
								<th> Fecha</th>
                                <th> </th>
							</tr>
							</thead>
							<tbody>
                            <?php $i = 1; foreach ($planes as $row):  ?>
							<tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row->plan; ?></td>
								<td>S/ <?php echo $row->precio; ?></td>
								<td><?php echo $row->velocidad; ?>MB</td>
								<td><?php if ($row->tipo == 1) { echo 'Comercial';} else { echo 'Doméstico';} ?></td>
								<td><?php echo $row->descripcion; ?></td>
								<td><?php if ($row->visible == 1) { echo 'Si';} else { echo 'No';} ?></td>
                                <td><?php echo $row->fecha; ?></td>
                                <td width="100"><a class="btn default red-stripe" href="#" onclick="showAjaxModal('<?= base_url('modal/modal_edit_plan/').$row->planesID; ?>');" title="Editar"><i class="fa fa-cogs"></i></a>
                                    	<a class="btn grey-cascade" href="#" onclick="confirm_modal('<?= base_url('modal/modal_delete_plan/').$row->planesID; ?>');" title="Eliminar"><i class="fa fa-trash"></i></a></td>
							</tr>
							 <?php $i++; endforeach ?>
							</tbody>
							</table>
						</div>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->