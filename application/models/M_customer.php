<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class M_customer extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function cliente_perfil()
	{ // traer facturas del cliente
				$dato = $this->session->userdata('usuarioID');
				$this->db->select('*');
				$this->db->from('pagos');
				$this->db->join('usuarios', 'pagos.usuarioID = usuarios.usuarioID');
				$this->db->where('usuarios.usuarioID', $dato);
				$this->db->where('visto_cliente', 'si');
				$this->db->order_by("pagosID", "desc");
				$this->db->limit(5);
				$query = $this->db->get();
				return $query->result_array();	
	}
	
	public function enviar_soporte(){//el cliente reporta problemas o mensajea
			$data = array(
				's_tecnico' => $this->input->post('s_tecnico'),
				's_problema' => $this->input->post('s_problema'),
				's_cliente' => $this->input->post('s_cliente'),
				's_fecha_visita' => $this->input->post('s_fecha_visita')
			);
			return $this->db->insert('soporte', $data);
			
			}
	
	public function traer_mensajes()
	{
				$dato = $this->session->userdata('usuario');
				$this->db->select('*');
				$this->db->from('soporte');
				$this->db->join('usuarios', 'soporte.s_cliente = usuarios.usuario');
				$this->db->where('s_cliente', $dato);
				$this->db->where('s_visible', 'si');
				$this->db->order_by("soporteID", "desc");
				$query = $this->db->get();
				return $query->result_array();	
	}
	public function actualizar_factura($pagosID)
		{
			if ($pagosID === FALSE){
				error_404;
				}
			$data = array(
			'ope' => $this->input->post('ope'),
			'estado' => $this->input->post('estado'),
			'fecha_pago' => $this->input->post('fecha_pago')
			);
			$this->db->where('pagosID', $pagosID);
			$this->db->update('pagos', $data); 	
		}
}