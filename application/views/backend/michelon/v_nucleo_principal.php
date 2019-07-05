<!-- BEGIN PAGE CONTAINER -->
<?php	$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'); 
		$arrayDias = array( 'Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');?>
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1><?=$title;?> </h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
<style type="text/css">
#chartdiv {#chartdiv, {
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}	
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}
#pagos_otros_meses {#pagos_otros_meses, {
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}	
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}
#facturas_inpagas {#facturas_inpagas, {
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}	
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}
#ingresos_meses {#ingresos_meses {
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}	
	width		: 100%;
	height		: 435px;
	font-size	: 11px;
}
#control_clientes {#control_clientes {
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}	
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}	
	width		: 100%;
	height		: 435px;
	font-size	: 11px;
}

.amcharts-graph-graph2 .amcharts-graph-stroke {
  stroke-dasharray: 4px 5px;
  stroke-linejoin: round;
  stroke-linecap: round;
  -webkit-animation: am-moving-dashes 1s linear infinite;
  animation: am-moving-dashes 1s linear infinite;
}

@-webkit-keyframes am-moving-dashes {
  100% {
    stroke-dashoffset: -28px;
  }
}
@keyframes am-moving-dashes {
  100% {
    stroke-dashoffset: -28px;
  }
}
#almacen_asignados {#almacen_asignados {
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}	
	width		: 100%;
	height		: 435px;
	font-size	: 11px;
}

#clientes_torre {#clientes_torre {
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}	
	width		: 100%;
	height		: 435px;
	font-size	: 11px;
}
#clientes_distrito {#clientes_distrito {
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}	
	width		: 100%;
	height		: 435px;
	font-size	: 11px;
}							
.amcharts-pie-slice {
  transform: scale(1);
  transform-origin: 50% 50%;
  transition-duration: 0.3s;
  transition: all .3s ease-out;
  -webkit-transition: all .3s ease-out;
  -moz-transition: all .3s ease-out;
  -o-transition: all .3s ease-out;
  cursor: pointer;
  box-shadow: 0 0 30px 0 #000;
}

.amcharts-pie-slice:hover {
  transform: scale(1.1);
  filter: url(#shadow);
}
#total_estados {#total_estados {
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}	
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}	
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}	
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}	
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}
</style>
<style type="text/css">
</style>				
                
                <div class="col-md-12 col-sm-6">
						<div class="portlet light bordered">
							<div class="portlet-title">
								<div class="caption font-dark">
									<span class="caption-subject bold uppercase">Cobranza diaria mes <?php echo $arrayMeses[date('m')-1]; ?></span>
									<span class="caption-helper">Estadisticas...</span>
								</div>
								<div class="actions">
									<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#">
									</a>
								</div>
							</div>
							<div class="portlet-body">
    							<div id="chartdiv"></div>
							</div>
						</div>
				</div>
                
                <div class="col-md-12 col-sm-6">
						<div class="portlet light bordered">
							<div class="portlet-title">
								<div class="caption font-dark">
									<span class="caption-subject bold uppercase">Pagos en <?php echo $arrayMeses[date('m')-1]; ?> de otros meses</span>
									<span class="caption-helper">Estadisticas...</span>
								</div>
								<div class="actions">
									<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#">
									</a>
								</div>
							</div>
							<div class="portlet-body">
    							<div id="pagos_otros_meses"></div>
							</div>
						</div>
				</div>
                
                <div class="col-md-6 col-sm-6">
						<div class="portlet light bordered">
							<div class="portlet-title">
								<div class="caption font-dark">
									<span class="caption-subject bold uppercase">Estado de las Facturas mes <?php echo $arrayMeses[date('m')-1]; ?></span>
									<span class="caption-helper">Estadisticas...</span>
								</div>
								<div class="actions">
									<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#">
									</a>
								</div>
							</div>
							<div class="portlet-body">
    							<div id="total_estados"></div>
							</div>
						</div>
				</div>
                <div class="col-md-6 col-sm-6">
						<div class="portlet light bordered">
							<div class="portlet-title">
								<div class="caption font-dark">
									<span class="caption-subject bold uppercase">Facturas inpagas por mes</span>
									<span class="caption-helper">Estadisticas...</span>
								</div>
								<div class="actions">
									<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#">
									</a>
								</div>
							</div>
							<div class="portlet-body">
    							<div id="facturas_inpagas"></div>
							</div>
						</div>
				</div>
                
                <div class="col-md-12 col-sm-6">
						<div class="portlet light bordered">
							<div class="portlet-title">
								<div class="caption font-dark">
									<span class="caption-subject bold uppercase">Ingresos por mes</span>
									<span class="caption-helper">Estadisticas...</span>
								</div>
								<div class="actions">
									<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#">
									</a>
								</div>
							</div>
							<div class="portlet-body">
    							<div id="ingresos_meses"></div>
							</div>
						</div>
				</div>
                
                <div class="col-md-12 col-sm-6">
						<div class="portlet light bordered">
							<div class="portlet-title">
								<div class="caption font-dark">
									<span class="caption-subject bold uppercase">Clientes por Torre de transmisión</span>
									<span class="caption-helper">Estadisticas...</span>
								</div>
								<div class="actions">
									<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#">
									</a>
								</div>
							</div>
							<div class="portlet-body">
    							<div id="clientes_torre"></div>
							</div>
						</div>
				</div>
                
                <div class="col-md-12 col-sm-6">
						<div class="portlet light bordered">
							<div class="portlet-title">
								<div class="caption font-dark">
									<span class="caption-subject bold uppercase">Equipos en Almacén y asignados</span>
									<span class="caption-helper">Estadisticas...</span>
								</div>
								<div class="actions">
									<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#">
									</a>
								</div>
							</div>
							<div class="portlet-body">
    							<div id="almacen_asignados"></div>
							</div>
						</div>
				</div>
                
                
                
                <div class="col-md-12 col-sm-6">
						<div class="portlet light bordered">
							<div class="portlet-title">
								<div class="caption font-dark">
									<span class="caption-subject bold uppercase">Clientes por distrito</span>
									<span class="caption-helper">Estadisticas...</span>
								</div>
								<div class="actions">
									<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#">
									</a>
								</div>
							</div>
							<div class="portlet-body">
    							<div id="clientes_distrito"></div>
							</div>
						</div>
				</div>
                
                <div class="col-md-12 col-sm-6">
						<div class="portlet light bordered">
							<div class="portlet-title">
								<div class="caption font-dark">
									<span class="caption-subject bold uppercase">Situación de clientes</span>
									<span class="caption-helper">Estadisticas...</span>
								</div>
								<div class="actions">
									<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#">
									</a>
								</div>
							</div>
							<div class="portlet-body">
    							<div id="control_clientes"></div>
							</div>
						</div>
				</div>
			</div>
                
        </div>
    </div>
</div>
<!-- END PAGE CONTAINER -->
