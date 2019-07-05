<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_planes');
		$this->load->model('m_gestion');
		//Do your magic here
	}

	public function index()
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['planes'] = $this->m_planes->planes_all();
		$data['title'] = 'Administrar planes';
		$data['title_modal'] = 'Añadir/Actualizar plan';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/planes/v_planes', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}

	public function add_plan()
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}

		$this->m_planes->add_plan();
		$this->session->set_flashdata('agregar', 1);
		redirect (base_url().'planes/', 'refresh');
	}

	public function put_plan($id)
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}

		$this->m_planes->put_plan($id);
		$this->session->set_flashdata('editar', 1);
		redirect (base_url().'planes/', 'refresh');
	}
}

/* End of file Planes.php */
/* Location: ./application/controllers/Planes.php */