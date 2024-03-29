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
		$data['recurso'] = '';

		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);
		$this->load->view('backend/geolocalizacion/clientes', $data, FALSE);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}


	public function get_clientes()
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}

		if ($this->session->userdata('nivel') != 'empleado') {
			$data_maps = $this->m_geolocalizacion->all_data_markers();
		} else {
			$data_maps = $this->m_geolocalizacion->all_data_markers_group();
		}
		
		header('Content-type: text/xml');
		echo '<markers>';
			foreach ($data_maps as $key => $value) {
				$name = $value['nombre'] . ' ' . $value['apellido'];
				if ($name != '') {
				echo '<marker id="'. $value['id'] .'" name="' . $name . '" address="Buscar Direccion (Pendiente de limpieza de datos)" lat="' . $value['lat'] . '" lng="' . $value['lng'] . '" type="' . $value['distrito'] . '"/>';
				}
			}
		echo '</markers>';

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

		echo '<marker id="' . $value['id'] . '" name="' . $value['nombre'] . ' ' . $value['apellido'] . '" address="' . $value['direccion'] . '" lat="' . $value['lat'] . '" lng="' . $value['lng'] . '" type="multitel"/>';
	}

}

/* End of file Geolocalizacion.php */
/* Location: ./application/controllers/Geolocalizacion.php */