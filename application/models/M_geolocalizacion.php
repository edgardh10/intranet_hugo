<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_geolocalizacion extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function verified_user($id)
	{
		$this->db->select('nombre, apellido, lng, lat, direccion, distrito, usuarioID');
		$this->db->from('geolocalizacion');
		$this->db->join('usuarios', 'usuarios.usuarioID = geolocalizacion.cliente_id');
		$this->db->join('distritos', 'distritos.id = usuarios.distritoID');
		$this->db->where('usuarioID', $id);
		
		$query = $this->db->get_where();
		return $query->row();
	}


	public function all_data_markers()
	{
		$this->db->select('id, nombre, apellido, lng, lat, direccion, distrito');
		$this->db->from('geolocalizacion');
		$this->db->join('usuarios', 'usuarios.usuarioID = geolocalizacion.cliente_id');
		$this->db->join('distritos', 'distritos.id = usuarios.distritoID');
		$this->db->where('control !=', 'retirado');
		
		$query = $this->db->get();
		return $query->result_array();
	}

	public function all_data_markers_group()
	{
		$this->db->select('geolocalizacion.id, nombre, apellido, lng, lat, direccion, distrito');
		$this->db->from('geolocalizacion');
		$this->db->join('usuarios', 'usuarios.usuarioID = geolocalizacion.cliente_id');
		$this->db->join('distritos', 'distritos.id = usuarios.distritoID');
		$this->db->join('permisos_torre', 'usuarios.torreID = permisos_torre.torreID');
		$this->db->where('permisos_torre.usuarioID', $this->session->userdata('usuarioID'));
		$this->db->where('control !=', 'retirado');
		
		$query = $this->db->get();
		return $query->result_array();
	}

}

/* End of file M_geolocalizacion.php */
/* Location: ./application/models/M_geolocalizacion.php */