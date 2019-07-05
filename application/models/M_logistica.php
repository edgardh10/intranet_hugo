<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class M_logistica extends CI_Model {

		public function __construct()
		{
		//$this->load->database();
		}
		public function get_marcas(){
				$query = $this->db->get('equipos_marca');
				return $query->result_array();
		}
		
		public function add_marcas()
		{
			$data = array(
				'marca' => $this->input->post('marca')
			);
			$this->db->insert('equipos_marca', $data);
		}	
		
		public function edit_marcas($marcasID)
		{
			$data = array('marca' => $this->input->post('marca'));
			$this->db->where('marcasID', $marcasID);
			$this->db->update('equipos_marca', $data); 
		}
		
		public function get_radios(){
			$this->db->select('*');	
			$this->db->from('equipos');
			$this->db->join('equipos_marca', 'equipos.marcasID = equipos_marca.marcasID');
			$this->db->where('tipo', 2);
			$this->db->where('asignado', 0);
			$query = $this->db->get_where();
			return $query->result_array();
		}
		
		public function get_eq_torre(){
			$this->db->select('*');	
			$this->db->from('equipos');
			$this->db->join('equipos_marca', 'equipos.marcasID = equipos_marca.marcasID');
			$this->db->where('tipo', 3);
			$this->db->where('asignado', 0);
			$query = $this->db->get_where();
			return $query->result_array();
		}
		
		public function add_equipo(){
			$data = array(
				'marcasID' => $this->input->post('marcasID'),
				'mac' => $this->input->post('mac'),
				'numSerie' => $this->input->post('numSerie'),
				'proveedor' => $this->input->post('proveedor'),
				'fechaCompra' => $this->input->post('fechaCompra'),
				'tipo' => $this->input->post('tipo')
			);
			$this->db->insert('equipos', $data);
		}
		
		public function update_equipo($equiposID){
			$data = array(
				'marcasID' => $this->input->post('marcasID'),
				'mac' => $this->input->post('mac'),
				'numSerie' => $this->input->post('numSerie'),
				'proveedor' => $this->input->post('proveedor'),
				'fechaCompra' => $this->input->post('fechaCompra'),
				'tipo' => $this->input->post('tipo')
			);
			$this->db->where('equiposID', $equiposID);
			$this->db->update('equipos', $data);
		}
		public function update_equipo_torre($equiposID){// actualiza equipos torre y asigna
				if($this->input->post('torreID')==''){//condicional para no asignar sino esta seleccionado una torre
					$asign = 0; } else { $asign = 1;};
			$data = array(
				'marcasID' => $this->input->post('marcasID'),
				'mac' => $this->input->post('mac'),
				'numSerie' => $this->input->post('numSerie'),
				'proveedor' => $this->input->post('proveedor'),
				'fechaCompra' => $this->input->post('fechaCompra'),
				'tipo' => $this->input->post('tipo'),
				'torreID' => $this->input->post('torreID'),
				'asignado' => $asign
			);
			$this->db->where('equiposID', $equiposID);
			$this->db->update('equipos', $data);
		}
		
		public function eq_torre_asig($torreID = FALSE){ //EQUIPOS DE TORRE ASIGNADOS A CADA TORRE
			if ($torreID === FALSE)
			{
				$this->db->select('equipos.equiposID, equipos_marca.marca, equipos.mac, equipos.numSerie, equipos.proveedor, equipos.fechaCompra, torres.torre, distrito.distrito');
				$this->db->from('equipos');
				$this->db->join('torres', 'equipos.torreID = torres.torreID');
				$this->db->join('distrito', 'torres.distritoID = distrito.distritoID');
				$this->db->join('equipos_marca', 'equipos_marca.marcasID = equipos.marcasID');
				$query = $this->db->get();
				return $query->result_array();
			}
				$this->db->select('equipos.equiposID, equipos_marca.marca, equipos.mac, equipos.numSerie, equipos.proveedor, equipos.fechaCompra, torres.torre, distrito.distrito');
				$this->db->from('equipos');
				$this->db->join('torres', 'equipos.torreID = torres.torreID');
				$this->db->join('distrito', 'torres.distritoID = distrito.distritoID');
				$this->db->join('equipos_marca', 'equipos_marca.marcasID = equipos.marcasID');
				$this->db->where('torres.torreID', $torreID);
				$query = $this->db->get_where();
				return $query->result_array();
		}
		
		public function regresar_almacen($equiposID){// REGRESAR EQUIPOS A ALMACEN
				$data['asignado'] = $this->input->post('asignado');
				$data['torreID'] = $this->input->post('torreID');
				$this->db->where('equiposID', $equiposID);
				$this->db->update('equipos', $data);
			}
		
		public function get_transmisores(){
			$this->db->select('*');	
			$this->db->from('equipos');
			$this->db->join('equipos_marca', 'equipos.marcasID = equipos_marca.marcasID');
			$this->db->where('tipo', 1);
			$this->db->where('asignado', 0);
			$query = $this->db->get_where();
			return $query->result_array();
		}
		
		public function get_torres(){
			$this->db->select('*');	
			$this->db->from('torres');
			$this->db->join('distrito', 'torres.distritoID = distrito.distritoID');
			$query = $this->db->get();
			return $query->result_array();
		}
		
		public function add_torre(){
		$data = array(
			'distritoID' => $this->input->post('distritoID'),
			'torre' => $this->input->post('torre')
		);
			$this->db->insert('torres', $data);
		}
		
		public function update_torre($torreID){
		$data = array(
			'distritoID' => $this->input->post('distritoID'),
			'torre' => $this->input->post('torre')
		);
		$this->db->where('torreID', $torreID);
		$this->db->update('torres', $data);
		
		}
		public function usuarios_transmisores(){
			$this->db->select('usuarioID, usuario, nombre, apellido, equipos.equiposID, equipos.mac, numSerie, marca, proveedor, fechaCompra, distrito');
			$this->db->from('equipos');
			$this->db->join('usuarios', 'equipos.equiposID = usuarios.equiposID');
			$this->db->join('equipos_marca', 'equipos_marca.marcasID = equipos.marcasID');
			$this->db->join('distrito', 'distrito.distritoID = usuarios.distritoID');
			$this->db->where('control !=', 'retirado');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function usuarios_radios(){
			$this->db->select('usuarioID, usuario, nombre, apellido, equipos.equiposID, equipos.mac, numSerie, marca, proveedor, fechaCompra, distrito');
			$this->db->from('equipos');
			$this->db->join('usuarios', 'equipos.mac = usuarios.mac');
			$this->db->join('equipos_marca', 'equipos_marca.marcasID = equipos.marcasID');
			$this->db->join('distrito', 'distrito.distritoID = usuarios.distritoID');
			$this->db->where('control !=', 'retirado');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function usuarios_torres(){
			$this->db->select('*');
			$this->db->from('torres');
			$this->db->join('usuarios', 'torres.torreID = usuarios.torreID');
			$this->db->join('distrito', 'distrito.distritoID = torres.distritoID');
			$this->db->where('usuarios.control !=', 'retirado');
			$query = $this->db->get();
			return $query->result_array();
		}

	}