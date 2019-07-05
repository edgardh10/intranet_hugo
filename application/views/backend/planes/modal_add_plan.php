<form class="form-horizontal" method="post" name="actualizar_plan" action="<?php echo base_url();?>planes/add_plan/">
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Plan</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-random"></i>
											<input type="text" class="form-control" name="plan" value="">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Precio</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-money"></i>
											<input type="text" name="precio" class="form-control" value="">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Velocidad</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-signal"></i>
											<input type="text" name="velocidad" class="form-control" value="">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Tipo</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-life-ring"></i>
											<select class="form-control" name="tipo">
												<option value="-1">--Seleccionar--</option>
	                                            <option value="1">Comercial</option>
	                                            <option value="0">Domestico</option>
                                            </select>
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Descripción</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-file-text"></i>
											<textarea class="form-control" name="descripcion" rows="5"></textarea>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Visible web</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-life-ring"></i>
											<select class="form-control" name="visible">
												<option value="-1">--Seleccionar--</option>
	                                            <option value="1">Si</option>
	                                            <option value="0">No</option>
                                            </select>
										</div>
									</div>
								</div>                               
                                <div class="form-group">
									<div class="col-md-offset-2 col-md-10">
                                        <input type="submit" class="btn blue" value="Añadir Plan">
									</div>
								</div>
							</form>