<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Hacer el pago de la Factura <?php echo $row['referencia']; ?> Monto: <?php echo $row['cuota'];?> <small>Verificar datos</small></h1>
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
								<span class="caption-subject font-green-sharp bold uppercase"><?=$title ?> | Factura <?php echo $row['referencia']; ?></span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>

						<div class="portlet-body">
                        <div class="alert alert-warning alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								Estimado(a) <strong><?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?></strong> llene los datos correspondientes de su voucher BCP. el Monto a pagar es: <strong>S/. <?php echo $row['cuota'];?>.00</strong> por el periodo(mes): <strong><?php echo $row['mes'];?></strong>
							</div>

							<hr>
                            <!--<p>Cantidad a pagar: <?php echo $row['moneda'];?><?php echo $row['cuota'];?>.00</p>
                            <p>Mes a Pagar a pagar: <?php echo $row['mes'];?></p>-->
							<form class="form-horizontal" method="post" name="generar_factura" action="<?php echo base_url();?>customer/actualizar_factura/<?php echo $row['pagosID'];?>">
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-2 control-label">Cantidad a pagar:</label>
									<div class="col-md-4">
										<div class="input-icon">
											<i class="fa fa-money"></i>
											<input type="text" class="form-control" value="<?php echo $row['moneda'];?><?php echo $row['cuota'];?>.00" disabled="disabled">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-2 control-label">Mes a Pagar a pagar:</label>
									<div class="col-md-4">
										<div class="input-icon">
											<i class="fa fa-calendar"></i>
											<input type="text" class="form-control" value="<?php echo $row['mes'];?>" required="required" disabled="disabled"/>
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-2 control-label">N° Ope</label>
									<div class="col-md-4">
										<div class="input-icon">
											<i class="fa fa-credit-card"></i>
											<input type="text" class="form-control" name="ope" value="<?php echo $row['ope'];?>" required="required">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail1" class="col-md-2 control-label">Fecha de pago</label>
									<div class="col-md-4 input-group">
                                    <span class="input-group-addon">
                                    	<i class="fa fa-calendar"></i>
                                    </span>
										<input type="text" name="fecha_pago" class="form-control form-control-inline input-medium date-picker todo-taskbody-due" required="required">
									</div>
								</div>
                                <div class="form-group">
									<div class="col-md-offset-2 col-md-10">
                                    	
                                    	<input type="hidden" name="estado" value="pendiente" />
                                        <input type="hidden" name="pagosID" value="<?php echo $row['pagosID'];?>" />  
										<input type="submit" class="btn blue" value="Hacer Pago">
                                        
									</div>
								</div>
							</form>
							<hr>
							
						</div>
					
                    
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
