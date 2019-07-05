<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Centro de mensajes <small>elija un cliente</small></h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase"><?= $title; ?></span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body">
							<form class="form-horizontal" method="post" action="<?php echo base_url();?>gestion/agregado_mensaje/">
								<div class="form-group">
									<label class="col-md-2 control-label">Seleccionar Cliente</label>
									<div class="col-md-4 input-group">
										<span class="input-group-addon">
                                            <i class="fa fa-users"></i>
                                        </span>
                                        <select name="s_cliente" id="distrito" class="form-control">
                                            <option value=""></option>
                                            <?php foreach ($clientes as $row): ?>
                                            <option value="<?php echo $row['usuario'] ?>"><?php echo $row['nombre'] ?> <?php echo $row['apellido'] ?></option>
                                            <?php endforeach ?>
                                        </select>
									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword1" class="col-md-2 control-label">Tema de conversación</label>
									<div class="col-md-4">
										<div class="input-icon right">
											<i class="fa fa-user"></i>
											<textarea name="s_problema" class="form-control" placeholder="¿de que quiere conversar?" rows="8"></textarea>
										</div>
									</div>
								</div>
                                
								<div class="form-group">
									<div class="col-md-offset-2 col-md-10">
                                    	<input type="hidden" name="s_tecnico" value="<?php echo $this->session->userdata('usuarioID'); ?>" />
                                        <input type="hidden" name="s_fecha_visita" value="" />
                                        <input type="hidden" name="s_visible" value="si" />
                                        <input type="hidden" name="s_mensaje_directo" value="si" />
                                    	<input type="hidden" name="procesar" value="1">
										<input type="submit" class="btn green" value="Enviar mensaje">
									</div>
								</div>
							</form>
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
