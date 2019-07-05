<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Editar la Factura <?php echo $row['referencia']; ?> de <?=$title ?> <small>Verificar datos</small></h1>
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
								Editar la Factura de <strong><?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?></strong> solamente, si es necesario.
							</div>

							<hr>
                            
							<form class="form-horizontal" method="post" name="generar_factura" action="<?php echo base_url();?>facturas/actualizar_factura/<?php echo $row['pagosID'];?>">
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-2 control-label">N° Ope</label>
									<div class="col-md-4">
										<div class="input-icon">
											<i class="fa fa-credit-card"></i>
											<input type="text" class="form-control" name="ope" value="<?php echo $row['ope'];?>">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-2 control-label">Monto</label>
									<div class="col-md-4">
										<div class="input-icon">
											<i class="fa fa-money"></i>
											<input type="text" name="cuota" class="form-control" value="<?php echo $row['cuota'];?>">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-2 control-label">Comentario</label>
									<div class="col-md-4">
										<div class="input-icon">
											<i class="fa fa-comment"></i>
											<textarea class="form-control" name="mensaje" placeholder="Escriba un comentario"><?php echo $row['mensaje'];?></textarea>
										</div>
									</div>
								</div>	
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-2 control-label">Estado</label>
									<div class="col-md-4">
										<div class="input-icon">
											<i class="fa fa-filter"></i>
                                            <select name="estado" class="form-control">
                                            	<option value="<?php echo $row['estado'];?>" selected="selected"><?php echo ucfirst($row['estado']);?></option>
												<?php if($row['estado']=='inpago'){ ?>
                                                <option value="pendiente">Pendiente</option>
                                                <?php } ?>
                                                <option value="pagado">Pagado</option>
                                            
                                            </select>
										</div>
									</div>
								</div>
                                
                                
                                <div class="form-group">
									<label for="inputEmail1" class="col-md-2 control-label">Fecha de pago</label>
									<div class="col-md-4 input-group">
                                    <span class="input-group-addon">
                                    	<i class="fa fa-calendar"></i>
                                    </span>
										<input type="text" name="fecha_pago" value="<?php echo $row['fecha_pago'];?>" class="form-control form-control-inline input-medium date-picker todo-taskbody-due" readonly>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-2 control-label">Visible al cliente</label>
									<div class="col-md-4">
										<div class="input-icon">
											<i class="fa fa-eye"></i>
											<select class="form-control" name="visto_cliente">
                                <option value="<?php echo $row['visto_cliente'];?>"><?php echo ucfirst($row['visto_cliente']);?></option>
                                <?php if($row['visto_cliente'] == 'no'){ ?>
                              <option value="si">Si</option>
                                <?php } elseif($row['visto_cliente'] == 'si') { ?>
                              <option value="no">No</option>
                                <?php } ?>
                            </select>
										</div>
									</div>
								</div>
								
                                <div class="form-group">
									<div class="col-md-offset-2 col-md-10">
                                    	
                                        <input type="hidden" name="pagosID" value="<?php echo $row['pagosID'];?>" />  
										<input type="submit" class="btn blue" value="Actualizar Factura">
                                        
									</div>
								</div>
								<input type="hidden" name="user" value="<?php echo $row['usuarioID'] ?>">
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
