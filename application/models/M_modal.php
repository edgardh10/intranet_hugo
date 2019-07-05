<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class M_modal extends CI_Model {

		public function __construct()
		{
		//$this->load->database();
		}
		public function update_marca($marcasID){
			$query = $this->db->get_where('equipos_marca', array('marcasID' => $marcasID));
			return $query->row_array();
		}
		
		public function delete_marca($marcasID){
			$this->db->delete('equipos_marca', array('marcasID' => $marcasID));	
		}
		
		public function traer_equipo($equiposID){ // PARA LA EDICION DE EQUIPOS: RADIOS, TRANSMISORES, EQUIPO TORRE
			$this->db->select('*');	
			$this->db->from('equipos');
			$this->db->join('equipos_marca', 'equipos.marcasID = equipos_marca.marcasID');
			//$this->db->where('tipo', 2);
			//$this->db->where('asignado', 0);
			$this->db->where('equiposID', $equiposID);
			$query = $this->db->get_where();
			return $query->row_array();
		
		}
		
		public function delete_equipo($equiposID){// ELIMINA EQUIPOS: RADIOS, TRANSMISORES, EQUIPOS TORRE
			$this->db->delete('equipos', array('equiposID' => $equiposID));	
		}
		/*public function traer_transmisor($equiposID){
			$this->db->select('*');	
			$this->db->from('equipos');
			$this->db->join('equipos_marca', 'equipos.marcasID = equipos_marca.marcasID');
			$this->db->where('tipo', 1);
			$this->db->where('asignado', 0);
			$this->db->where('equiposID', $equiposID);
			$query = $this->db->get_where();
			return $query->row_array();
		
		}*/
		public function traer_torre($torreID){// para el modal
			$query = $this->db->get_where('torres', array('torreID' => $torreID));
			return $query->row_array();
		}
		
		public function delete_torre($torreID){
			$this->db->delete('torres', array('torreID' => $torreID));	
		}
		public function traer_usuarios($usuarioID){
			$query = $this->db->get_where('usuarios', array('usuarioID' => $usuarioID));
			return $query->row_array();
		}
		
		public function traer_telefonos($telefonoID){
			$query = $this->db->get_where('telefonos', array('telefonoID' => $telefonoID));
			return $query->row_array();
		}
		public function delete_telefono($telefonoID){
			$this->db->delete('telefonos', array('telefonoID' => $telefonoID));	
		}
		
		public function delete_factura($pagosID){
			$this->db->delete('pagos', array('pagosID' => $pagosID));
		}
		public function traer_venta($ventasID){
			$this->db->select('*');
			$this->db->from('ventas');
			$this->db->join('usuarios', 'ventas.v_tecnicoID = usuarios.usuarioID');
			$this->db->where('ventasID', $ventasID);
			$query = $this->db->get_where();
			return $query->row_array();
		}
		public function delete_venta($ventasID){
			$this->db->delete('ventas', array('ventasID' => $ventasID));
		}
		public function delete_soporte($soporteID){
			$this->db->delete('soporte', array('soporteID' => $soporteID));
		}
		
		public function delete_user($usuarioID){
			$imagen_perfil_jpg = FCPATH.'cargas/perfil/usuario/ms_perfil-'.$usuarioID.'.jpg';
			$imagen_perfil_png = FCPATH.'cargas/perfil/usuario/ms_perfil-'.$usuarioID.'.png';
			$imagen_avatar_jpg = FCPATH.'cargas/avatar/usuario/ms_avatar-'.$usuarioID.'.jpg';
			$imagen_avatar_png = FCPATH.'cargas/avatar/usuario/ms_avatar-'.$usuarioID.'.png';
			$this->db->delete('usuarios', array('usuarioID' => $usuarioID));
			unlink($imagen_perfil_jpg);
			unlink($imagen_avatar_jpg);
			unlink($imagen_perfil_png);
			unlink($imagen_avatar_png);
		}
		public function delete_cliente($usuarioID){
			$imagen_perfil_jpg = FCPATH.'cargas/perfil/cliente/ms_perfil-'.$usuarioID.'.jpg';
			$imagen_avatar_jpg = FCPATH.'cargas/avatar/cliente/ms_avatar-'.$usuarioID.'.jpg';
			$imagen_mapa_jpg = FCPATH.'cargas/mapas/michelon-'.$usuarioID.'.jpg';
			$imagen_casa_jpg = FCPATH.'cargas/casa/michelon-'.$usuarioID.'.jpg';
			$imagen_perfil_png = FCPATH.'cargas/perfil/cliente/ms_perfil-'.$usuarioID.'.png';
			$imagen_avatar_png = FCPATH.'cargas/avatar/cliente/ms_avatar-'.$usuarioID.'.png';
			$imagen_mapa_png = FCPATH.'cargas/mapas/michelon-'.$usuarioID.'.png';
			$imagen_casa_png = FCPATH.'cargas/casa/michelon-'.$usuarioID.'.png';
			unlink($imagen_perfil_jpg);
			unlink($imagen_avatar_jpg);
			unlink($imagen_mapa_jpg);
			unlink($imagen_casa_jpg);
			unlink($imagen_perfil_png);
			unlink($imagen_avatar_png);
			unlink($imagen_mapa_png);
			unlink($imagen_casa_png);
			$this->db->delete('usuarios', array('usuarioID' => $usuarioID));
		}
	}