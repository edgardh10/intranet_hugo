<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Facturas extends CI_Controller {

	public function __construct()
		{
		parent::__construct();
		$this->load->model('m_facturas');
		$this->load->model('m_clientes');
		}
	
	public function index()
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['facturas'] = $this->m_facturas->factura_inpagas();
		$data['title'] = 'Facturas Pendientes de cancelación';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/facturas/v_facturas', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
		
	}	
	
	public function aprobar()
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['facturas'] = $this->m_facturas->factura_aprobar();
		$data['title'] = 'Facturas por aprobar';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/facturas/v_facturas_aprobar', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}	
	
	public function pagadas()
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['facturas'] = $this->m_facturas->factura_pagadas();
		$data['title'] = 'Facturas pagadas';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/facturas/v_facturas_pagadas', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	
	public function generar()
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['generar'] = $this->m_facturas->seleccionar_datos();
		$data['title'] = 'Generar Factura a todos los clientes';
		$data['recurso'] = 'generar_facturas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/facturas/v_generar_facturas', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	public function detalle($pagosID){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
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
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/facturas/v_factura_detalle', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
		}
		
	public function actualizar($pagosID){// carga la vista para actualizar facturas
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
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
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/facturas/v_actualizar_facturas', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
		
		}
	
	
	public function actualizar_factura($pagosID){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_facturas->actualizar_factura($pagosID);
		$cliente = $this->input->post('user');
		redirect(base_url().'clientes/perfil/' . $cliente, 'refresh');	
	}
	
	public function ingresado(){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_clientes->add_cliente();
		redirect(base_url().'clientes/', 'refresh');
		}
	
	
	
}