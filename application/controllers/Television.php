<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Television extends CI_Controller {

	public function index()
	{
			
	}

	public function store($usuarioID)
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}

		$data = array(
			'usuarioID' => $usuarioID,
			'plan' => $this->input->post('plan'),
			'cuota' => $this->input->post('cuota'),
			'status' => $this->input->post('status'),
			'fecha_afiliacion' => $this->input->post('fecha_afiliacion'),
		);
		$this->db->insert('television', $data);
		$this->session->set_flashdata('success_tv', 1);
		redirect (base_url().'clientes/perfil/'.$usuarioID);
	}

	public function update($usuarioID)
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}

		$data = array(
			'usuarioID' => $usuarioID,
			'plan' => $this->input->post('plan'),
			'cuota' => $this->input->post('cuota'),
			'status' => $this->input->post('status'),
			// 'fecha_afiliacion' => $this->input->post('fecha_afiliacion'),
		);
		$this->db->where('usuarioID', $usuarioID);
		$this->db->update('television', $data);
		$this->session->set_flashdata('success_tv', 1);
		redirect (base_url().'clientes/perfil/'.$usuarioID);
	}

	public function modal($usuarioID)
	{
		$this->db->select('id, plan, cuota, fecha_afiliacion, status');
		$this->db->from('television');
		$this->db->join('usuarios', 'television.usuarioID = usuarios.usuarioID');
		$this->db->where('usuarios.usuarioID', $usuarioID);
		$query = $this->db->get_where();
		$plan = $query->row_array();

		$user = $this->db->get_where('usuarios', array('usuarioID' => $usuarioID));
		$data['user'] = $user->row_array();

		if ($plan) {
			$data['plan'] = $plan;
			$this->load->view('backend/television/modal_edit', $data);
		} else {
			$this->load->view('backend/television/modal_create', $data);
		}
	}

}

/* End of file Television.php */
/* Location: ./application/controllers/Television.php */