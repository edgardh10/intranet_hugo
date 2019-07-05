<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('m_admin');
	}
	public function index(){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') != 'admin_sup')
		{
			redirect(base_url().'login');
		}
		$data['distrito'] = $this->m_admin->clientes_distrito();
		$data['torre'] = $this->m_admin->clientes_torre();
		$data['equipos'] = $this->m_admin->asignados_almacen();
		$data['ingresos'] = $this->m_admin->ingresos_mensuales();
		$data['receptores'] = $this->m_admin->receptores_distrito();
		$data['router'] = $this->m_admin->router_distrito();
		$data['title'] = 'Bienvenido a la Intranet';
		$data['recurso'] = 'index';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/michelon/v_estadisticas', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
		//$this->load->view('backend/michelon/v_js_estadisticas', $data);
		}
}