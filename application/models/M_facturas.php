<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class M_facturas extends CI_Model {

		var $table = 'customers';
		var $column_order = array(null, 'FirstName','LastName','phone','address','city','country');
		var $column_search = array('FirstName','LastName','phone','address','city','country');
		var $order = array('pagosID' => 'DESC');

		public function __construct()
		{

		}
		// FUNCION PARA TRAER FACTURAS PAGADAS
		public function get_factura($usuarioID = FALSE)
			{
				
			}
		public function factura_inpagas(){
				$this->db->select('*');
				$this->db->from('usuarios');
				$this->db->join('pagos', 'usuarios.usuarioID = pagos.usuarioID');
				$this->db->where('estado', 'inpago');
				$this->db->order_by('pagosID', 'DESC');
				$query = $this->db->get();
				return $query->result_array();
			}
		public function factura_aprobar(){
				$this->db->select('*');
				$this->db->from('usuarios');
				$this->db->join('pagos', 'usuarios.usuarioID = pagos.usuarioID');
				$this->db->where('estado', 'pendiente');
				$query = $this->db->get();
				return $query->result_array();
			}
		public function factura_pagadas(){
			
				$this->db->select('*');
				$this->db->from('usuarios');
				$this->db->join('pagos', 'usuarios.usuarioID = pagos.usuarioID');
				$this->db->where('estado', 'pagado');
				$this->db->where('nivel', 'cliente');
				$this->db->where('control !=', 'retirado');
				$this->db->order_by('pagosID', 'DESC');
				$query = $this->db->get();
				return $query->result_array();
			}
		public function seleccionar_datos(){ // para generar las facturas
				$this->db->select('usuarioID, cuotas');
				$this->db->from('usuarios');
				$this->db->where('nivel', 'cliente');
				$this->db->where('control', 'activado');
				$query = $this->db->get();
				return $query->result_array();
		}
		public function factura_detalle($pagosID = FALSE)
				{
				if($pagosID === FALSE)
				{
					show_404();					
				}
				$this->db->select('*');
				$this->db->from('pagos');
				$this->db->join('usuarios', 'pagos.usuarioID = usuarios.usuarioID');
				$this->db->join('distrito', 'usuarios.distritoID = distrito.distritoID');
				$this->db->where('nivel', 'cliente');
				$this->db->where('pagosID', $pagosID);
				$query = $this->db->get_where();
				return $query->row_array();
			
			}
		public function actualizar_factura($pagosID)
		{
			if ($pagosID === FALSE){
				error_404;
				}
			$data = array(
			'ope' => $this->input->post('ope'),
			'cuota' => $this->input->post('cuota'),
			'mensaje' => $this->input->post('mensaje'),
			'estado' => $this->input->post('estado'),
			'visto_cliente' => $this->input->post('visto_cliente'),
			'fecha_pago' => $this->input->post('fecha_pago')
			);
			$this->db->where('pagosID', $pagosID);
			$this->db->update('pagos', $data); 	
		}
		
	}