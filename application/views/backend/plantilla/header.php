<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
<!-- BEGIN HEADER -->
<div class="page-header">
	<!-- BEGIN HEADER TOP -->
	<div class="page-header-top">
		<div class="container">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>cargas/img/logo_m.png" width="150" alt="logo" class="logo-default"></a>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler"></a>
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<?php if($this->session->userdata('nivel') !='cliente'){ ?>
                    <li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
                    <?php $michelon = $this->db->get_where('ventas', array('v_estado !='=>'cerrado','v_tecnicoID'=>$this->session->userdata('usuarioID')));?>
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="icon-briefcase"></i>
						<span class="badge badge-default"><?php echo $michelon->num_rows(); ?></span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>Tienes <strong><?php echo $michelon->num_rows(); ?> pendientes de</strong> Ventas</h3>
								<a href="<?php echo base_url();?>gestion/ventas/">ver todo</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
									<?php foreach($michelon->result_array() as $fila): ?>
                                    <li>
										<a href="javascript:;">
										<span class="time"><?php echo $fila['v_fecha']; ?></span>
										<span class="details">
										<span class="label label-sm label-icon label-success">
										<i class="fa fa-plus"></i>
										</span>
										<?php echo $fila['v_nombre']; ?> <?php echo $fila['v_apellido']; ?> </span>
										</a>
									</li>
                                    <?php endforeach ?>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN TODO DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-dark dropdown-inbox" id="header_inbox_bar">
                    <?php
					$this->db->select('*');
					$this->db->from('soporte');
					$this->db->join('usuarios', 'usuario = s_cliente');
					$this->db->where('s_estado', 'abierto');
					$this->db->where('s_mensaje_directo', 'no');
					$this->db->where('s_tecnico', $this->session->userdata('usuarioID'));
					$this->db->order_by('soporteID', 'desc');
					$consulta = $this->db->get_where();
					?>
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-wrench"></i>
						<span class="badge badge-default"><?php echo $consulta->num_rows(); ?></span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>Tienes <strong><?php echo $consulta->num_rows(); ?> Soportes</strong> nuevos</h3>
								<a href="<?php echo base_url();?>gestion/soporte/">ver todo</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
									<?php foreach($consulta->result_array() as $row_s): ?>
                                    <li>
										<a href="<?php echo base_url();?>gestion/actualizar/<?php echo $row_s['soporteID']; ?>">
										<span class="photo">
                                        <?php if($row_s['foto_avatar']== ''){ ?>
										<img src="<?php echo base_url();?>cargas/img/<?php echo $row_s['sexo']; ?>a.jpg" class="img-circle" alt="">
                                        <?php } else { ?>
                                        <img src="<?php echo base_url();?>cargas/avatar/cliente/<?php echo $row_s['foto_avatar']; ?>" class="img-circle" alt="">
                                        <?php } ?>
										</span>
										<span class="subject">
										<span class="from">
										<?php echo $row_s['nombre']; ?> </span>
										<span class="time"><?php echo $row_s['s_fecha_visita']; ?> </span>
										</span>
										<span class="message">
										<?php echo $row_s['s_problema']; ?> </span>
										</a>
									</li>
                                    <?php endforeach ?>
								</ul>
							</li>
						</ul>
					</li>
					<li class="droddown dropdown-separator">
						<span class="separator"></span>
					</li>
					<!-- BEGIN INBOX DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-dark dropdown-inbox" id="header_inbox_bar">
                    <?php 
						$this->db->select('*');
						$this->db->from('soporte');
						$this->db->join('usuarios', 'usuario = s_cliente');
						$this->db->where('s_estado', 'proceso');
						$this->db->where('s_mensaje_directo', 'no');
						$this->db->where('s_tecnico', $this->session->userdata('usuarioID'));
						$this->db->order_by('soporteID', 'desc');
						$query = $this->db->get_where();
					?>
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="circle"><?php echo $query->num_rows(); ?></span>
						<span class="corner"></span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>Tienes <strong><?php echo $query->num_rows(); ?> Soportes</strong> pendiente</h3>
								<a href="<?php echo base_url();?>gestion/soporte/">ver todo</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
									<?php foreach($query->result_array() as $row_sup): ?>
                                    <li>
										<a href="<?php echo base_url();?>gestion/actualizar/<?php echo $row_sup['soporteID']; ?>">
										<span class="photo">
										<?php if($row_sup['foto_avatar']== ''){ ?>
										<img src="<?php echo base_url();?>cargas/img/<?php echo $row_sup['sexo']; ?>a.jpg" class="img-circle" alt="">
                                        <?php } else { ?>
                                        <img src="<?php echo base_url();?>cargas/avatar/cliente/<?php echo $row_sup['foto_avatar']; ?>" class="img-circle" alt="">
                                        <?php } ?>
										</span>
										<span class="subject">
										<span class="from">
										<?php echo $row_sup['nombre']; ?> </span>
										<span class="time"><?php echo $row_sup['s_fecha_visita']; ?> </span>
										</span>
										<span class="message">
										<?php echo $row_sup['s_problema']; ?> </span>
										</a>
									</li>
                                    <?php endforeach ?>
								</ul>
							</li>
						</ul>
					</li>
					<?php } ?>
                    <!-- END INBOX DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<?php if($this->session->userdata('foto_avatar')== ''){ ?>
                        <img alt="" class="img-circle" src="<?php echo base_url();?>cargas/img/avatar<?php if($this->session->userdata('sexo')=='M'){echo 9;} else {echo 11;} ?>.jpg">
                        <?php } elseif($this->session->userdata('nivel')!= 'cliente') { ?>
                        <img alt="" class="img-circle" src="<?php echo base_url();?>cargas/avatar/usuario/<?php echo $this->session->userdata('foto_avatar');?>">
                        <?php } elseif($this->session->userdata('nivel')== 'cliente') { ?>
                        <img alt="" class="img-circle" src="<?php echo base_url();?>cargas/avatar/cliente/<?php echo $this->session->userdata('foto_avatar');?>">
                        <?php } ?>
						<span class="username username-hide-mobile"><?php echo $this->session->userdata('nombre'); ?></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="<?php echo base_url(); ?>usuarios/perfil/<?php echo $this->session->userdata('usuarioID'); ?>">
								<i class="icon-user"></i> Mi perfil</a>
							</li>
							<?php if($this->session->userdata('nivel')!= 'cliente') { ?>
                            <li>
								<a href="<?php echo base_url(); ?>gestion/chat">
								<i class="icon-bubbles"></i> Chat </a>
							</li>
                            <?php } ?>
							<!--<li class="divider">
							</li>
							<li>
								<a href="extra_lock.html">
								<i class="icon-lock"></i> Lock Screen </a>
							</li>-->
							<li>
								<a href="<?php echo base_url(); ?>login/logout">
								<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-extended quick-sidebar-toggler">
	                    <span class="sr-only">Toggle Sidebar Michelon Soft</span>
	                    <i class="icon-logout"></i>
	                </li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
	</div>
	<!-- END HEADER TOP -->