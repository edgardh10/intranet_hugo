<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Logistica extends CI_Controller {

	public function __construct()
		{
		parent::__construct();
			$this->load->model('m_logistica');
			$this->load->model('m_clientes');
		}
	public function marcas() //  ADDMINISTRACION DE MARCAS
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['marcas'] = $this->m_logistica->get_marcas();
		$data['title'] = 'Principales Marcas';
		$data['title_modal'] = 'Editar Marca';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/logistica/v_marcas', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	
	public function agregar_marcas()
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$this->m_logistica->add_marcas();
		$this->session->set_flashdata('agregar', 1);
		redirect (base_url().'logistica/marcas/');
	}
	
	public function editar_marca($marcasID)
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$this->m_logistica->edit_marcas($marcasID);
		$this->session->set_flashdata('editar', 1);
		redirect (base_url().'logistica/marcas/');
	}
	
	public function radios(){// ADMINISTRAR EQUIPOS RADIOS  (Radios = Router)
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$data['radios'] = $this->m_logistica->get_radios();
		$data['title'] = 'Equipos Router en Almacén';
		$data['title_modal'] = 'Agregar / Editar Router';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/logistica/v_radios', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);

	}
	public function agregar_radio(){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$this->m_logistica->add_equipo();
		$this->session->set_flashdata('agregar', 1);
		redirect (base_url().'logistica/radios/');
	}

	public function editar_radio($equiposID){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$this->m_logistica->update_equipo($equiposID);
		$this->session->set_flashdata('editar', 1);
		redirect (base_url().'logistica/radios/');
	}

	public function transmisores(){// ADMINISTRAR EQUIPOS TRANSMISORES (transmisores = Receptores)
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$data['radios'] = $this->m_logistica->get_transmisores();
		$data['title'] = 'Equipos Receptores en Almacén';
		$data['title_modal'] = 'Agregar / Editar Receptor';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/logistica/v_transmisores', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);

	}
	
	public function agregar_transmisor(){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$this->m_logistica->add_equipo();
		$this->session->set_flashdata('agregar', 1);
		redirect (base_url().'logistica/transmisores/');
	}

	public function editar_transmisor($equiposID){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$this->m_logistica->update_equipo($equiposID);
		$this->session->set_flashdata('editar', 1);
		redirect (base_url().'logistica/transmisores/');
	}
	
		public function equipos_torre(){//ADMINISTRAR EQUIPOS DE TORRE
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$data['eq_torre'] = $this->m_logistica->get_eq_torre();
		$data['title'] = 'Equipos de torre en Almacén';
		$data['title_modal'] = 'Agregar / Editar Equipo de torre';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/logistica/v_equipos_torre', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);

	}
	public function agregar_eq_torre(){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$this->m_logistica->add_equipo();
		$this->session->set_flashdata('agregar', 1);
		redirect (base_url().'logistica/equipos_torre/');
	}

	public function editar_eq_torre($equiposID){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$this->m_logistica->update_equipo_torre($equiposID);
		$this->session->set_flashdata('editar', 1);
		redirect (base_url().'logistica/equipos_torre/');
	}
	
	public function equipos_torre_asignados(){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$data['equipo'] = $this->m_logistica->eq_torre_asig();
		$data['title'] = 'Equipos asignados por torre';
		$data['title_modal'] = '¿Deseas volver equipo a almacen?';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/logistica/v_eq_torre_asignados', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
		
		}
	public function equipos_torre_asignado($torreID){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$data['equipo'] = $this->m_logistica->eq_torre_asig($torreID);
		$data['title'] = 'Equipos asignados a esta torre';
		$data['title_modal'] = '¿Deseas volver equipo a almacen?';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/logistica/v_eq_torre_por_torre', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
		
		}
		
	public function volver_almacen($equiposID){
		$this->m_logistica->regresar_almacen($equiposID);
		$this->session->set_flashdata('editar', 1);
		redirect (base_url().'logistica/equipos_torre_asignados/');
		}
	
	public function torres(){//ADMINISTRAR TORRES
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$data['torres'] = $this->m_logistica->get_torres();
		$data['departamentos'] = $this->m_clientes->get_departamentos();
		$data['title'] = 'Torres de Transmisión';
		$data['title_modal'] = 'Agregar / Editar Torre';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/logistica/v_torres', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);

	}
	
	public function agregar_torre(){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$this->m_logistica->add_torre();
		$this->session->set_flashdata('agregar', 1);
		redirect (base_url().'logistica/torres/');
	}
	
	public function editar_torre($torreID){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$this->m_logistica->update_torre($torreID);
		$this->session->set_flashdata('editar', 1);
		redirect (base_url().'logistica/torres/');
	}
	
	public function clientes_transmisores(){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$data['transmisores'] = $this->m_logistica->usuarios_transmisores();
		$data['title'] = 'Equipos Receptores Asignados';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/logistica/v_clientes_transmisores', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);

	}
	
	public function clientes_radios(){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$data['radios'] = $this->m_logistica->usuarios_radios();
		$data['title'] = 'Equipos Router Asignados';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/logistica/v_clientes_radios', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);

	}
	
	public function clientes_torres(){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
				{
					redirect(base_url().'login');
				}
		$data['torres'] = $this->m_logistica->usuarios_torres();
		$data['title'] = 'Clientes por Torre';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/logistica/v_clientes_torres', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);

	}


}