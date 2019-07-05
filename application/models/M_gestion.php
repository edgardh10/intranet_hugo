<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class M_gestion extends CI_Model {

		public function __construct()
		{
		//$this->load->database();
		}
		public function soporte_cerrado(){
				$this->db->select('*');
				$this->db->from('soporte');
				$this->db->join('usuarios', 'soporte.s_cliente = usuarios.usuario');
				$this->db->where('s_estado', 'cerrado');
				$this->db->where('s_mensaje_directo', 'no');
				$query = $this->db->get();
				return $query->result_array();
			}
			
		public function soporte_uno($soporteID = FALSE)
			{
			if ($soporteID === FALSE)
			{	
				$this->db->select('*');
				$this->db->from('soporte');
				$this->db->join('usuarios', 'soporte.s_cliente = usuarios.usuario');
				$this->db->where('s_estado !=', 'cerrado');
				$this->db->where('s_mensaje_directo', 'no');
				$query = $this->db->get();
				return $query->result_array();
			}
				$this->db->select('*');
				$this->db->from('soporte');
				$this->db->join('usuarios', 'soporte.s_cliente = usuarios.usuario');
				//$this->db->where('s_estado !=', 'cerrado');
				$this->db->where('soporteID', $soporteID);
				$query = $this->db->get_where();
				return $query->row_array();
			}
		public function ventas_uno($ventasID = FALSE){//trae todas las ventas se filtra en la vista
				if ($ventasID === FALSE)
				{
				$this->db->select('*');
				$this->db->from('ventas');
				$this->db->join('usuarios', 'v_tecnicoID = usuarioID');
				if ($this->session->userdata('nivel') !== 'admin_sup') {
					$this->db->where('usuarioID', $this->session->userdata('usuarioID'));
				}
				$this->db->order_by('ventasID', 'desc');
				$query = $this->db->get();
				return $query->result_array();
				}
				$this->db->select('*');
				$this->db->from('ventas');
				$this->db->join('usuarios', 'v_tecnicoID = usuarioID');
				$this->db->where('ventasID', $ventasID);
				$query = $this->db->get_where();
				return $query->row_array();
			}
		public function agregar_soporte(){//ingresar soporte
			$data = array(
			's_cliente' => $this->input->post('s_cliente'),
			's_tecnico' => $this->input->post('s_tecnico'),
			's_problema' => $this->input->post('s_problema'),
			's_fecha_visita' => $this->input->post('s_fecha_visita'),
			's_visible' => $this->input->post('s_visible')
			);
			return $this->db->insert('soporte', $data);
		}
		
		public function agregar_mensaje(){//ingresar mensaje chat directo
			$data = array(
			's_cliente' => $this->input->post('s_cliente'),
			's_tecnico' => $this->input->post('s_tecnico'),
			's_problema' => $this->input->post('s_problema'),
			's_fecha_visita' => $this->input->post('s_fecha_visita'),
			's_visible' => $this->input->post('s_visible'),
			's_mensaje_directo' => $this->input->post('s_mensaje_directo')
			);
			return $this->db->insert('soporte', $data);
		}
		
		public function actualizar_soporte($soporteID){// actualizar soporte
			$data = array(
			's_tecnico' => $this->input->post('s_tecnico'),
			's_fecha_visita' => $this->input->post('s_fecha_visita'),
			's_estado' => $this->input->post('s_estado'),
			's_comentario' => $this->input->post('s_comentario'),
			's_visible' => $this->input->post('s_visible')			
			);
			$this->db->where('soporteID', $soporteID);
			$this->db->update('soporte', $data);
		}
		public function cerrar_soporte($soporteID){// dar por cerrado soporte
			$data = array(
			's_estado' => $this->input->post('s_estado')			
			);
			$this->db->where('soporteID', $soporteID);
			$this->db->update('soporte', $data);
		}
		
		public function soporte_chat($soporteID)
		{// traer los mensajes de chat para cada soporte
			$this->db->select('soporteID, t_comentario, nombre, t_fecha, sexo, nivel, foto_avatar');
			$this->db->from('soporte');
			$this->db->join('reg_tick_coment','soporteID = ticketsID');
			$this->db->join('usuarios','t_usuario = usuario');
			$this->db->where('soporteID', $soporteID);
			$this->db->order_by('t_fecha', 'asc');
			$query = $this->db->get_where();
			return $query->result_array();			
		}

		public function insert_chat()
		{
			$data = array(
				'ticketsID' => $this->input->post('ticketsID'),
				't_comentario' => $this->input->post('t_comentario'),
				't_usuario' => $this->input->post('t_usuario')
			);
			return $this->db->insert('reg_tick_coment', $data);
		}
		
		public function add_venta()
		{
			$data = array(
						'v_nombre' => $this->input->post('v_nombre'),
						'v_apellido' => $this->input->post('v_apellido'),
						'v_dni' => $this->input->post('v_dni'),
						'v_telefono' => $this->input->post('v_telefono'),
						'v_direccion' => $this->input->post('v_direccion'),
						'v_tecnicoID' => $this->input->post('v_tecnicoID'),
						'v_fecha' => $this->input->post('v_fecha')
					);
			return $this->db->insert('ventas', $data);
		}
		
		public function update_venta($ventasID){
				$data = array(
						'v_nombre' => $this->input->post('v_nombre'),
						'v_apellido' => $this->input->post('v_apellido'),
						'v_dni' => $this->input->post('v_dni'),
						'v_telefono' => $this->input->post('v_telefono'),
						'v_direccion' => $this->input->post('v_direccion'),
						'v_tecnicoID' => $this->input->post('v_tecnicoID'),
						'v_facilidades' => $this->input->post('v_facilidades'),
						'v_visita' => $this->input->post('v_visita'),
						'v_fecha_visita' => $this->input->post('v_fecha_visita'),
						'v_comentario' => $this->input->post('v_comentario'),
						'v_estado' => $this->input->post('v_estado'),
						'v_instalado' => $this->input->post('v_instalado')
			);
			$this->db->where('ventasID', $ventasID);
			$this->db->update('ventas', $data);
		}
		
		public function migrar_venta_cliente()
		{	
			$apellido = $this->input->post('v_apellido');
			$parte = explode(" ",$apellido); 
			$apellido_pass = strtolower($parte[0]);
			$pass = '$M$Sy5$rd' . sha1($apellido_pass) . '$$u';

				$data = array(
					'nombre' => $this->input->post('v_nombre'),
					'apellido' => $this->input->post('v_apellido'),
					'distritoID' => $this->input->post('distritoID'),
					'direccion' => $this->input->post('v_direccion'),
					'cuotas' => $this->input->post('mensualidad'),
					'correo' => $this->input->post('correo'),
					'correo_control' => $this->input->post('correo_control'),
					'sexo' => $this->input->post('sexo'),
					'usuario' => $this->input->post('v_dni'),
					'fechaInst' => $this->input->post('v_fecha_visita'),
					'password' => $pass,
					'nivel' => 'cliente',
					'responsable' => $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido') 
					);
				$this->db->insert('usuarios', $data);
		}

		public function add_telefono_migrado($id){
			$data = array(
				'usuarioID' => $id,
				'tel_telefono' => $this->input->post('tel_telefono'),
				'tel_operador' => $this->input->post('tel_operador')
			);
			$this->db->insert('telefonos', $data);
		}
	}