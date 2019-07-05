<form class="form-horizontal" method="post" name="actualizar_plan" action="<?php echo base_url();?>planes/put_plan/<?php echo $plan->planesID; ?>">
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Plan</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-random"></i>
											<input type="text" class="form-control" name="plan" value="<?php echo $plan->plan; ?>">
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Precio</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-money"></i>
											<input type="text" name="precio" class="form-control" value="<?php echo $plan->precio; ?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Velocidad</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-signal"></i>
											<input type="text" name="velocidad" class="form-control" value="<?php echo $plan->velocidad; ?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Tipo</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-life-ring"></i>
											<select class="form-control" name="tipo">
												<?php if ($plan->tipo == 1) { ?>
	                                            <option value="1" selected="selected">Comercial</option>
	                                            <option value="0">Doméstico</option>
	                                            <?php } else { ?>
												<option value="1">Comercial</option>
	                                            <option value="0" selected="selected">Doméstico</option>
	                                            <?php } ?>
                                            </select>
										</div>
									</div>
								</div>
                                <div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Descripción</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-file-text"></i>
											<textarea name="descripcion" rows="5" class="form-control"><?php echo $plan->descripcion; ?></textarea>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail12" class="col-md-4 control-label"> Visible web</label>
									<div class="col-md-7">
										<div class="input-icon">
											<i class="fa fa-life-ring"></i>
											<select class="form-control" name="visible">
												<?php if ($plan->visible == 1) { ?>
	                                            <option value="1" selected="selected">Si</option>
	                                            <option value="0">No</option>
	                                            <?php } else { ?>
												<option value="1">Si</option>
	                                            <option value="0" selected="selected">No</option>
	                                            <?php } ?>
                                            </select>
										</div>
									</div>
								</div>                               
                                <div class="form-group">
									<div class="col-md-offset-2 col-md-10">
										<input type="hidden" name="planesID" value="<?php echo $plan->planesID; ?>" />
                                        <input type="submit" class="btn blue" value="Actualizar Plan">
									</div>
								</div>
							</form>