<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1><?=$title ?> <small>Solo se debe generar una vez al mes</small></h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase"><?=$title ?></span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
                        <?php
						if ((isset($_POST["generar"]))) {
							$fecha_vencimiento = $_POST['fecha_vencimiento'];
							$mes = $_POST['mes'];
							$referencia = $_POST['referencia'];
							$prefijo = 'FAC-';
						 foreach($generar as $row){
						//inserting blank data for students attendance if unavailable
                                $verify_data    =   array(  'usuarioID' => $row['usuarioID'],
                                                            'cuota' => $row['cuotas'],
															'fecha_vencimiento' => $fecha_vencimiento,
															'mes' => $mes,
															'referencia' => $prefijo.$referencia++
															
															);
                                $query = $this->db->get_where('pagos' , $verify_data);
                                if($query->num_rows() < 1)
                                $this->db->insert('pagos' , $verify_data);
                                //showing the attendance status editing option
                                
						}?>
						<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								<strong>¡Felicidades!</strong> las facturas se han generado Satisfactoriamente para el mes <strong><?php echo $_POST['mes'];?></strong>.
							</div>
						<?php } else { ?>
                        
						<div class="portlet-body">
                        <div class="alert alert-warning alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								<strong>¡Atención!</strong> Al generar la factura se generara para todos los clientes, verifique bien para que mes es el que va generar y la fecha de vencimiento de tales facturas, de lo demás se encarga el sistema.
							</div>

							<hr>
                            
							<form class="form-horizontal" method="post" name="generar_factura" action="<?php echo base_url();?>facturas/generar">
								<div class="form-group">
									<label for="inputEmail1" class="col-md-2 control-label">Fecha de Vencimiento</label>
									<div class="col-md-4 input-group">
                                    <span class="input-group-addon">
                                    	<i class="fa fa-calendar"></i>
                                    </span>
										<input type="text" name="fecha_vencimiento" class="form-control form-control-inline input-medium date-picker todo-taskbody-due" readonly>
									</div>
								</div>
                                <div class="form-group">
										<label class="control-label col-md-2">Mes a Facturar</label>
										<div class="col-md-4">
											<div class="input-group input-medium date date-picker" data-date="<?php echo date('m/Y') ?>" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
												<input type="text" name="mes" class="form-control" readonly>
												<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<!-- /input-group -->
											<span class="help-block">
											Solamente mes y año </span>
										</div>
									</div>
								<div class="form-group">
									<div class="col-md-offset-2 col-md-10">
                                    	<input type="hidden" name="referencia" value="<?php // traemos la ultima referencia o factura
										$query = $this->db->query("SELECT referencia FROM pagos ORDER BY pagosID DESC LIMIT 0,1");
										if ($query->num_rows() > 0){
										$row = $query->row();
										$ultimo = $row->referencia;
										echo substr($ultimo,4)+5;// traemos la ultima referencia y lo agregamos 5
										} else {echo 1001;}?>"/>
                                        <input type="hidden" name="generar" value="generar" />  
										<input type="submit" class="btn blue" value="Generar Facturas">
                                        
									</div>
								</div>
							</form>
							<hr>
							
						</div>
					
                    	<?php } ?>
                    </div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
