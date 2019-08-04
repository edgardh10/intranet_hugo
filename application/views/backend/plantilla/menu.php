	<!-- BEGIN HEADER MENU -->
	<div class="page-header-menu">
		<div class="container">
			<!-- BEGIN HEADER SEARCH BOX -->
			<!--<form class="search-form" action="#" method="GET">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="query">
					<span class="input-group-btn">
					<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
					</span>
				</div>
			</form>-->
			<!-- END HEADER SEARCH BOX -->
			<!-- BEGIN MEGA MENU -->
			<!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
			<!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
            <?php
                	$this->db->select('*');
					$this->db->from('permisos');
					$this->db->where('usuarioID', $this->session->userdata('usuarioID'));
					$query = $this->db->get_where();
					$consulta = $query->row_array();
					 ?>
			<div class="hor-menu ">
            <?php if($this->session->userdata('nivel')=='admin_sup' || $this->session->userdata('nivel')=='sistemas'){ ?>
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="<?php echo base_url();?>">Principal</a>
					</li>
                    <li class="menu-dropdown classic-menu-dropdown ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
						Clientes <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-left">
							<li><a href="<?php echo base_url();?>clientes/"><i class="icon-user-following"></i> Activos</a></li>
                            <li><a href="<?php echo base_url();?>clientes/morosos"><i class="icon-eye"></i> Morosos</a></li>
							<li><a href="<?php echo base_url();?>clientes/desactivados"><i class="icon-user-unfollow"></i> Desactivados</a></li>
							<li><a href="<?php echo base_url();?>clientes/cortados"><i class="icon-frame"></i> Cortados</a></li>
						</ul>
					</li>
                    <li class="menu-dropdown classic-menu-dropdown ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
						Pagos <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-left">
							<li><a href="<?php echo base_url();?>facturas/"><i class="icon-basket"></i> Facturas inpagas</a></li>
                            <li><a href="<?php echo base_url();?>facturas/aprobar"><i class="icon-basket-loaded"></i> Facturas por aprobar</a></li>
                            <li><a href="<?php echo base_url();?>facturas/pagadas"><i class="icon-basket-loaded"></i> Facturas Pagadas</a></li>
							<li><a href="<?php echo base_url();?>facturas/generar"><i class="icon-doc"></i> Generar Factura</a></li>

						</ul>
					</li>
                    <li class="menu-dropdown classic-menu-dropdown ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
						Servicio al Cliente <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-left">
                        	<li><a href="<?php echo base_url();?>gestion/soporte"><i class="icon-wrench"></i> Soporte </a></li>
                            <li class=" dropdown-submenu">
								<a href=""><i class="icon-tag"></i> Ventas </a>
								<ul class="dropdown-menu">
									<li class=" "><a href="<?php echo base_url();?>gestion/ventas"><i class="icon-cup"></i> Ventas Nuevas </a></li>
									<li class=" "><a href="<?php echo base_url();?>gestion/ventas_visita"><i class="icon-action-redo"></i> Visitas</a></li>
                                    <li class=" "><a href="<?php echo base_url();?>gestion/ventas_instalacion"><i class="icon-link"></i> Instalación</a></li>
									<li class=" "><a href="<?php echo base_url();?>gestion/ventas_archivo"><i class="icon-folder-alt"></i> Archivadas</a></li>
                                 </ul>
							</li>
						</ul>
					</li>
					<li class="menu-dropdown classic-menu-dropdown ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
						Logistica <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-left">
                            <li><a href="<?php echo base_url();?>logistica/marcas"><i class="icon-puzzle"></i> Marcas </a></li>
							<li><a href="<?php echo base_url();?>logistica/radios"><i class="icon-feed"></i> Routers </a></li>
                            <li><a href="<?php echo base_url();?>logistica/transmisores"><i class="icon-directions"></i> Receptores </a></li>
                            <li><a href="<?php echo base_url();?>logistica/torres"><i class="icon-share"></i> Torres </a></li>
                            <li><a href="<?php echo base_url();?>logistica/equipos_torre"><i class="icon-paper-clip"></i>Equipos de torre</a></li>
						</ul>
					</li>
					<li>
						<a href="<?php echo base_url();?>planes/">Planes</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>geolocalizacion/clientes/">Marcadores</a>
					</li>
				</ul>
            
            <?php } else { // usuarios con permisos?>
                <ul class="nav navbar-nav">
					<li class="active">
						<a href="<?php echo base_url();?>">Principal</a>
					</li>
                   
                    <?php if(($this->session->userdata('nivel')!='admin_sup') && $consulta['clientes'] == 'permitido'){ ?>
                    <li class="menu-dropdown classic-menu-dropdown ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
						Clientes <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-left">
							<li><a href="<?php echo base_url();?>clientes/"><i class="icon-user-following"></i> Activos</a></li>
                            <li><a href="<?php echo base_url();?>clientes/morosos"><i class="icon-eye"></i> Morosos</a></li>
							<li><a href="<?php echo base_url();?>clientes/desactivados"><i class="icon-user-unfollow"></i> Desactivados</a></li>
							<li><a href="<?php echo base_url();?>clientes/cortados"><i class="icon-frame"></i> Cortados</a></li>
						</ul>
					</li>
                    <?php } ?>
                    
                    <?php if(($this->session->userdata('nivel')!='admin_sup') && $consulta['pagos'] == 'permitido'){ ?>
                    <li class="menu-dropdown classic-menu-dropdown ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
						Pagos <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-left">
							<li><a href="<?php echo base_url();?>facturas/"><i class="icon-basket"></i> Facturas inpagas</a></li>

							<?php if ($this->session->userdata('nivel') != 'empleado') { ?>
                            <li><a href="<?php echo base_url();?>facturas/aprobar"><i class="icon-basket-loaded"></i> Facturas por aprobar</a></li>
                            <li><a href="<?php echo base_url();?>facturas/pagadas"><i class="icon-basket-loaded"></i> Facturas Pagadas</a></li>
							<li><a href="<?php echo base_url();?>facturas/generar"><i class="icon-doc"></i> Generar Factura</a></li>
							<?php } ?>
						</ul>
					</li>
                    <?php } ?>
                    
                    <?php if(($this->session->userdata('nivel')!='admin_sup') && $consulta['servicio_cliente'] == 'permitido'){ ?>
                    
                    <li class="menu-dropdown classic-menu-dropdown ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
						Servicio al Cliente <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-left">
                        	<li><a href="<?php echo base_url();?>gestion/soporte"><i class="icon-wrench"></i> Soporte </a></li>
                            <li class=" dropdown-submenu">
								<a href=""><i class="icon-tag"></i> Ventas </a>
								<ul class="dropdown-menu">
									<li class=" "><a href="<?php echo base_url();?>gestion/ventas"><i class="icon-cup"></i> Ventas Nuevas </a></li>
									<li class=" "><a href="<?php echo base_url();?>gestion/ventas_visita"><i class="icon-action-redo"></i> Visita de ventas</a></li>
                                    <li class=" "><a href="<?php echo base_url();?>gestion/ventas_instalacion"><i class="icon-link"></i> Instalación</a></li>
									<li class=" "><a href="<?php echo base_url();?>gestion/ventas_archivo"><i class="icon-folder-alt"></i> Ventas archivadas</a></li>
                                 </ul>
							</li>
						</ul>
					</li>
					<?php } ?>
                    
                    <?php if(($this->session->userdata('nivel')!='admin_sup') && $consulta['logistica'] == 'permitido'){ ?>
                    
                    <li class="menu-dropdown classic-menu-dropdown ">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
						Logistica <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-left">
                            <li><a href="<?php echo base_url();?>logistica/marcas"><i class="icon-puzzle"></i> Marcas </a></li>
							<li><a href="<?php echo base_url();?>logistica/radios"><i class="icon-feed"></i> Radios </a></li>
                            <li><a href="<?php echo base_url();?>logistica/transmisores"><i class="icon-directions"></i> Transmisores </a></li>
                            <li><a href="<?php echo base_url();?>logistica/torres"><i class="icon-share"></i> Torres </a></li>
                            <li><a href="<?php echo base_url();?>logistica/equipos_torre"><i class="icon-paper-clip"></i>Equipos de torre</a></li>
						</ul>
					</li>
					<?php } ?>
					<li>
						<a href="<?php echo base_url();?>geolocalizacion/clientes/">Marcadores</a>
					</li>
                </ul>
          	<?php } ?>
			</div>
			<!-- END MEGA MENU -->
		</div>
	</div>
	<!-- END HEADER MENU -->
</div>
<!-- END HEADER -->