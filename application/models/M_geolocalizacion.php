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
		$this->db->join('distrito', 'distrito.distritoID = usuarios.distritoID');
		$this->db->where('usuarioID', $id);
		
		$query = $this->db->get_where();
		return $query->row();
	}

}

/* End of file M_geolocalizacion.php */
/* Location: ./application/models/M_geolocalizacion.php */