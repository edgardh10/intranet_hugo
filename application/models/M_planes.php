<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_planes extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function planes_all($id = FALSE)
	{
		if ($id == FALSE) {
			$query = $this->db->order_by('planesID', 'desc')->get('planes');

			return $query->result();
		} else {			

			$query = $this->db->get_where('planes', array('planesID' => $id));

			return $query->row();
		}
	}

	public function add_plan()
	{
		$data = array(
			'plan' => $this->input->post('plan'),
			'descripcion' => $this->input->post('descripcion'),
			'precio' => $this->input->post('precio'),
			'velocidad' => $this->input->post('velocidad'),
			'tipo' => $this->input->post('tipo'),
			'visible' => $this->input->post('visible')
		);
		$this->db->insert('planes', $data); 
	}

	public function put_plan($id)
	{
		$data = array(
			'plan' => $this->input->post('plan'),
			'descripcion' => $this->input->post('descripcion'),
			'precio' => $this->input->post('precio'),
			'velocidad' => $this->input->post('velocidad'),
			'tipo' => $this->input->post('tipo'),
			'visible' => $this->input->post('visible')
		);
		$this->db->where('planesID', $id);
		$this->db->update('planes', $data); 
	}



	public function delete_plan($id)
	{
		$this->db->delete('planes', array('planesID' => $id));
	}
	

}

/* End of file M_planes.php */
/* Location: ./application/models/M_planes.php */