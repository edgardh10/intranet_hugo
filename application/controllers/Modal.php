<?php defined('BASEPATH') or exit('No se puede acceder directamente');

	class Modal extends CI_Controller {
	
		public function __construct(){
				parent::__construct();
				$this->load->model('m_modal');
				$this->load->model('m_logistica');
				$this->load->model('m_clientes');
				$this->load->model('m_usuarios');
				$this->load->model('m_planes');
		}
		
		public function editar_marca($marcasID){ // CARGA EL MODAL PARA EDITAR MARCAS
				if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
				$data['mark'] = $this->m_modal->update_marca($marcasID);
				$this->load->view('backend/logistica/v_modal_editar_marca', $data);
		
		}
		
		public function eliminar_marca($marcasID){ // MODAL QUE ELIMINA LAS MARCAS
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$this->m_modal->delete_marca($marcasID);
			$this->session->set_flashdata('eliminar', 1);
			redirect (base_url().'logistica/marcas/');
		}
		
		public function modal_add_radio(){ // CARGA EL MODAL PARA AGREGAR UN RADIO
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$data['marcas'] = $this->m_logistica->get_marcas();
			$this->load->view('backend/logistica/v_modal_agregar_radio', $data);
		}	
		
		public function modal_edit_radio($equiposID){// CARGA EL MODAL PARA EDITAR RADIOS
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$data['equipo'] = $this->m_modal->traer_equipo($equiposID);
			$data['marcas'] = $this->m_logistica->get_marcas();
			$this->load->view('backend/logistica/v_modal_editar_radio', $data);
			}
		public function eliminar_radio($equiposID){// MODAL QUE ELIMINA RADIO
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$this->m_modal->delete_equipo($equiposID);
			$this->session->set_flashdata('eliminar', 1);
			redirect (base_url().'logistica/radios/');
		}
		public function modal_add_transmisor(){ //CARGA EL MODAL PARA PARA AGREGAR TRANSMISOR
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$data['marcas'] = $this->m_logistica->get_marcas();
			$this->load->view('backend/logistica/v_modal_agregar_transmisor', $data);
		}	
		
		public function modal_edit_transmisor($equiposID){// CARGA EL MODAL PARA EDITAR TRANSMISOR
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$data['equipo'] = $this->m_modal->traer_equipo($equiposID);
			$data['marcas'] = $this->m_logistica->get_marcas();
			$this->load->view('backend/logistica/v_modal_editar_transmisor', $data);
			}
		public function eliminar_transmisor($equiposID){ // MODAL QUE ELIMINA TRANSMISOR
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$this->m_modal->delete_equipo($equiposID);
			$this->session->set_flashdata('eliminar', 1);
			redirect (base_url().'logistica/transmisores/');
		}
		
		public function modal_editar_torre($torreID){ // CARGA EL MODAL PARA EDITAR TORRE
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
			{
				redirect(base_url().'login');
			}
			$data['torre'] = $this->m_modal->traer_torre($torreID);

			$data['departamentos'] = $this->m_clientes->get_departamentos();
			// $data['distrito'] = $this->m_clientes->get_distrito();
			$this->load->view('backend/logistica/v_modal_editar_torre', $data);
		}
		public function eliminar_torre($torreID){ // MODAL QUE ELIMINA TORRE
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$this->m_modal->delete_torre($torreID);
			$this->session->set_flashdata('eliminar', 1);
			redirect (base_url().'logistica/torres/');
		}
		public function modal_add_eq_torre(){ // CARGA EL MODAL PARA AGREGAR EQUIPO DE TORRE
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$data['marcas'] = $this->m_logistica->get_marcas();
			$this->load->view('backend/logistica/v_modal_agregar_eq_torre', $data);
		}
		
		public function modal_edit_eq_torre($equiposID){// CARGA EL MODAL PARA EDITAR EQUIPO DE TORRE
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$data['equipo'] = $this->m_modal->traer_equipo($equiposID);
			$data['marcas'] = $this->m_logistica->get_marcas();
			$data['torre'] = $this->m_logistica->get_torres();
			$this->load->view('backend/logistica/v_modal_editar_eq_torre', $data);
			}
		
		public function modal_volver_almacen($equiposID){ // CARGA EL MODAL PARA VOLVER EQUIPO DE TORRE A ALMACEN
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$data['equipo'] = $this->m_modal->traer_equipo($equiposID);
			$this->load->view('backend/logistica/v_modal_volver_almacen', $data);
			}
		
		public function eliminar_eq_torre($equiposID){ // MODAL QUE ELIMINA EQUIPO DE TORRE
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$this->m_modal->delete_equipo($equiposID);
			$this->session->set_flashdata('eliminar', 1);
			redirect (base_url().'logistica/equipos_torre/');
		}
		
		public function modal_agregar_telefono($usuarioID){ // CARGA EL MODAL PARA AGREGAR UN TELEFONO
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$data['user'] = $this->m_modal->traer_usuarios($usuarioID);
			$this->load->view('backend/clientes/v_modal_agregar_telefono', $data);
		}
		
		public function modal_actualizar_telefono($usuarioID, $telefonoID){ // CARGA EL MODAL PARA ACTUALIZAR TELEFONO
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$data['user'] = $this->m_modal->traer_usuarios($usuarioID);
			$data['tel'] = $this->m_modal->traer_telefonos($telefonoID);
			$this->load->view('backend/clientes/v_modal_actualizar_telefono', $data);	
		}
		
		public function eliminar_telefono($telefonoID, $usuarioID){ // MODAL QUE ELIMINA EL TELEFONO
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$this->m_modal->delete_telefono($telefonoID);
			$this->session->set_flashdata('eliminar', 1);
			redirect (base_url().'clientes/perfil/'.$usuarioID);
		}
		
		public function eliminar_factura($pagosID){ // MODAL QUE ELIMINA LA FACTURA
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$this->m_modal->delete_factura($pagosID);
			$this->session->set_flashdata('eliminar', 1);
			redirect (base_url().'facturas/');
		}
		
		public function actualizar_venta($ventasID){ // CARGA EL MODAL PARA EDITAR UNA VENTA
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$data['venta'] = $this->m_modal->traer_venta($ventasID);
			$data['usuarios'] = $this->m_usuarios->get_usuario();
			$this->load->view('backend/soporte/modal_actualizar_venta', $data);
		}
		
		public function modal_migrar_a_usuario($id){ // pasar este prospecto a cliente
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$data['venta'] = $this->m_modal->traer_venta($id);
			$data['distrito'] = $this->m_clientes->get_distrito();
			$this->load->view('backend/soporte/modal_migrar_cliente', $data);
		}
		public function eliminar_venta($ventasID){ // MODAL QUE ELIMINA UNA VENTA
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$this->m_modal->delete_venta($ventasID);
			$this->session->set_flashdata('eliminar', 1);
			redirect (base_url().'gestion/ventas');
		}
		public function eliminar_soporte($soporteID){ // MODAL QUE ELIMINA UN SOPORTE
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
			{
				redirect(base_url().'login');
			}
			$this->m_modal->delete_soporte($soporteID);
			$this->session->set_flashdata('eliminar', 1);
			redirect (base_url().'gestion/soporte');
		}
		
		public function eliminar_mensaje($soporteID){ // MODAL QUE ELIMINA UN MENSAJE DIRECTO (CHAT)
			$id = $this->session->userdata('usuarioID');
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
			{
				redirect(base_url().'login');
			}
			$this->m_modal->delete_soporte($soporteID);
			$this->session->set_flashdata('elim_mensaje', 1);
			redirect (base_url().'usuarios/perfil/'.$id);
		}
		
		public function eliminar_user($usuarioID){ // MODAL QUE ELIMINA UN USUARIO DEL SISTEMA
			$id = $this->session->userdata('usuarioID');
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
			{
				redirect(base_url().'login');
			}
			$this->m_modal->delete_user($usuarioID);
			$this->session->set_flashdata('eliminar', 1);
			redirect (base_url().'usuarios/perfil/'.$id);
		}
		public function form_add_user(){ // CARGA EL MODAL PARA AGREGAR UN USUARIO DEL SISTEMA
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
			{
				redirect(base_url().'login');
			}
			$data['distrito'] = $this->m_clientes->get_distrito();
			$this->load->view('backend/usuarios/v_modal_add_user', $data);
		}
		public function subir_img($usuarioID){ // SUBIR IMAGEN DE PERFIL DEL CLIENTE
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
			{
				redirect(base_url().'login');
			}
			$data['user'] = $this->m_modal->traer_usuarios($usuarioID);
			$this->load->view('backend/clientes/v_modal_img_perfil', $data);
		}
		
		public function subir_img_cliente($usuarioID){ // IMAGEN SUBE SU PROPIA IMAGEN DE PERFIL
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') != 'cliente')
			{
				redirect(base_url().'login');
			}
			$this->load->view('customer/v_modal_img_perfil');
		}
		public function eliminar_cliente($usuarioID){
			$id = $this->session->userdata('usuarioID');
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
			{
				redirect(base_url().'login');
			}
			$this->m_modal->delete_cliente($usuarioID);
			$this->session->set_flashdata('eliminar', 1);
			redirect (base_url().'usuarios/perfil/'.$id);
			}

		// modal para agregar soporte
		
		public function dar_soporte($id)
		{
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
			{
				redirect(base_url().'login');
			}

			$data['cliente'] = $this->m_clientes->get_usuario($id);
			$data['usuarios'] = $this->m_usuarios->get_usuario();
			$this->load->view('backend/clientes/v_modal_dar_soporte', $data);

		}

		// agregando funcionalidad de planes

		public function modal_add_plan()
		{
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			
			$this->load->view('backend/planes/modal_add_plan');
		}

		public function modal_edit_plan($id)
		{
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$data['plan'] = $this->m_planes->planes_all($id);
			$this->load->view('backend/planes/modal_put_plan', $data);
		}
		public function modal_delete_plan($id)
		{
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
			$this->m_planes->delete_plan($id);
			$this->session->set_flashdata('eliminar', 1);
			redirect (base_url().'planes/');
		}
	}