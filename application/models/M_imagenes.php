<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class M_imagenes extends CI_Model {

		public function __construct()
		{
		//$this->load->database();
		}
		// FUNCION PARA TRAER CLIENTES ACTIVOS
		public function subir_imagen($usuarioID)
		{
			
		
		}

		public function user_images($usuarioID)
		{
			$this->db->select('id, image');
			$this->db->from('gallery');
			$this->db->join('usuarios', 'gallery.usuarioID = usuarios.usuarioID');
			$this->db->where('usuarios.usuarioID', $usuarioID);
			$query = $this->db->get_where();
			return $query->result_array();
		}

	}