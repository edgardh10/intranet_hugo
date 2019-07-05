<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geolocalizacion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_geolocalizacion');
		
	}

	public function coords_user($id)
	{
		$user = $id;

		$data = array(
			'cliente_id' => $id ,
			'lng' => $this->input->post('user_lng'),
			'lat' => $this->input->post('user_lat')
		);

		$verified = $this->m_geolocalizacion->verified_user($id);

		if ($verified) {
			
			$this->db->where('cliente_id', $id);
			$this->db->update('geolocalizacion', $data);
		} else {
			$this->db->insert('geolocalizacion', $data);
		}

		redirect(base_url(). 'clientes/perfil/'. $id,'refresh');

	}

	public function clientes()
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}

		$data['title'] = 'Geolocalizacion Clientes';

		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);
		$this->load->view('backend/geolocalizacion/clientes', $data, FALSE);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}

	public function test($id)
	{
		$verified = $this->m_geolocalizacion->verified_user($id);

		var_dump($verified);

		if ($verified) {
			echo $verified->nombre;
		} else {
			echo 'Crear nuevo';
		}
	}

}

/* End of file Geolocalizacion.php */
/* Location: ./application/controllers/Geolocalizacion.php */