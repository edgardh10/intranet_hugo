<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class M_admin extends CI_Model {

		public function __construct()
			{
			//$this->load->database();
			}
		public function clientes_distrito(){
				$this->db->select('COUNT(usuarios.usuarioID) AS cantidad, distritos.distrito');
				$this->db->from('usuarios');
				$this->db->join('distritos', 'usuarios.distritoID = distritos.id');
				$this->db->where('usuarios.nivel', 'cliente');
				$this->db->where('usuarios.control !=', 'retirado');
				$this->db->group_by('distrito');
				$this->db->order_by('cantidad', 'desc');
				$query = $this->db->get();
				return $query->result_array();
			}
		public function clientes_torre(){
				$this->db->select('COUNT(usuarios.torreID) AS cantidad, torres.torre, distritos.distrito');
				$this->db->from('torres');
				$this->db->join('usuarios', 'torres.torreID = usuarios.torreID');
				$this->db->join('distritos', 'torres.distritoID = distritos.id');
				$this->db->where('usuarios.nivel', 'cliente');
				$this->db->where('usuarios.control !=', 'retirado');
				$this->db->group_by('torre');
				//$this->db->order_by('cantidad', 'desc');
				$query = $this->db->get();
				return $query->result_array();
			}
		public function asignados_almacen(){
				$this->db->select('tipo, asignado, count(equiposID) AS cantidad');
				$this->db->from('equipos');
				$this->db->group_by('tipo');
				$this->db->group_by('asignado');
				$query = $this->db->get();
				return $query->result_array();
			}
		public function receptores_distrito(){
				$this->db->select('Count(*) AS cantidad, usuarios.distritoID, distritos.distrito, equipos_marca.marca');
				$this->db->from('usuarios');
				$this->db->join('distritos', 'distritos.id = usuarios.distritoID');
				$this->db->join('equipos', 'usuarios.equiposID = equipos.equiposID');
				$this->db->join('equipos_marca', 'equipos.marcasID = equipos_marca.marcasID');
				$this->db->where('nivel', 'cliente');
				$this->db->where('control !=', 'retirado');
				$this->db->group_by('distritoID');
				$query = $this->db->get();
				return $query->result_array();
			}
		public function router_distrito(){
				$this->db->select('Count(*) AS cantidad, usuarios.distritoID, distritos.distrito, equipos_marca.marca');
				$this->db->from('usuarios');
				$this->db->join('distritos', 'distritos.id = usuarios.distritoID');
				$this->db->join('equipos', 'usuarios.mac = equipos.mac');
				$this->db->join('equipos_marca', 'equipos.marcasID = equipos_marca.marcasID');
				$this->db->where('nivel', 'cliente');
				$this->db->where('control !=', 'retirado');
				$this->db->group_by('distritoID');
				$query = $this->db->get();
				return $query->result_array();
			}
		public function ingresos_mensuales(){// nuevas estadisticas
				$this->db->select('SUM(cuota) AS total, mes');
				$this->db->from('pagos');
				$this->db->where('estado !=', 'inpago');
				$this->db->group_by('mes');
				$this->db->order_by('pagosID', 'desc');
				$this->db->limit(12);
				$query = $this->db->get();
				return $query->result_array();
			}
	}