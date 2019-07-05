<?php defined('BASEPATH') OR exit ('No se puede entrar');

class Customer extends CI_Controller {
	
	public function __construct()
		{
			parent::__construct();
			$this->load->model('m_customer');
			$this->load->model('m_facturas');
			$this->load->model('m_clientes');
			$this->load->model('m_usuarios');
			$this->load->model('m_gestion');
		}
	public function index()
		{
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') != 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['usuarios'] = $this->m_usuarios->get_usuario();
		$data['pagos'] = $this->m_customer->cliente_perfil();
		$data['mensajes'] = $this->m_customer->traer_mensajes();
		$data['title'] = $this->session->userdata('apellido');
		$data['title_modal'] = 'Subir imagen de Perfil';
		$data['recurso'] = 'perfil';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('customer/menu_customer', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('customer/v_profile', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
		}
		
		public function factura($pagosID){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') != 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['row'] = $this->m_facturas->factura_detalle($pagosID);
		$data['distrito'] = $this->m_clientes->get_distrito();
		if (empty($data['row'])){show_404();}
		$data['title'] = $data['row']['apellido'];
		$data['recurso'] = 'index';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('customer/menu_customer', $data);		
		$this->load->view('customer/v_factura_detalle', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
		
		}
		
		public function actualizar($pagosID){// carga la vista para actualizar facturas
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') != 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['row'] = $this->m_facturas->factura_detalle($pagosID);
		$data['distrito'] = $this->m_clientes->get_distrito();
		if (empty($data['row'])){show_404();}
		$data['title'] = $data['row']['apellido'];
		$data['recurso'] = 'generar_facturas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('customer/menu_customer', $data);		
		$this->load->view('customer/v_actualizar_factura', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
		
		}
		
		public function enviar(){// Generar un ticket de soporte individual
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') != 'cliente')
		{
			redirect(base_url().'login');
		}	
			$this->m_customer->enviar_soporte();
			redirect(base_url().'customer/', 'refresh');
			
			}
	
		public function actualizar_factura($pagosID){// actualizar la factura del cliente
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') != 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_customer->actualizar_factura($pagosID);
		redirect(base_url().'customer/', 'refresh');	
		}
		
		public function cierra_soporte($soporteID){// dar por cerrado el soporte
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') != 'cliente')
			{
				redirect(base_url().'login');
			}
			$this->m_gestion->cerrar_soporte($soporteID);
			redirect (base_url().'customer/soporte/'.$_POST['soporteID'], 'refresh');
		}
		public function agregar_chat()
		{//agregar mensaje de conversacion (chat)
			if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') != 'cliente')
			{
				redirect(base_url().'login');
			}
			$this->m_gestion->insert_chat();
			redirect(base_url().'customer/soporte/'.$_POST['ticketsID'], 'refresh');
		}
		
		public function soporte($soporteID)
	{ // carga la vista del formulario de soporte 
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') != 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['row'] = $this->m_gestion->soporte_uno($soporteID);
		$data['chat'] = $this->m_gestion->soporte_chat($soporteID);
		$data['usuarios'] = $this->m_usuarios->get_usuario();
		if (empty($data['row'])){show_404();}
		$data['title'] = $data['row']['apellido'];
		$data['recurso'] = 'agregar';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('customer/menu_customer', $data);		
		$this->load->view('customer/v_update_soporte', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	
		
}