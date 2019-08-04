<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class M_usuarios extends CI_Model {

		public function __construct()
		{
		//$this->load->database();
		}
		
		public function get_usuario($usuarioID = FALSE)
		{
			if ($usuarioID === FALSE)
			{
				$this->db->select('*');
				$this->db->from('usuarios');
				$this->db->join('distritos', 'distritos.id = usuarios.distritoID');
				$this->db->where('nivel !=', 'cliente');
				$this->db->where('nivel !=', 'sistemas');
				$this->db->where('control', 'activado');
				$query = $this->db->get();
				
				//$query = $this->db->get('usuarios');
				return $query->result_array();
			}

			$this->db->select('*');
			$this->db->from('usuarios');
			$this->db->join('distritos', 'distritos.id = usuarios.distritoID');
			$this->db->where('nivel !=', 'cliente');
			$this->db->where('usuarioID', $usuarioID);
			$query = $this->db->get_where();
			return $query->row_array();
		}

		public function get_usuario_group()
		{
			$this->db->select('*');
			$this->db->from('usuarios');
			$this->db->join('distritos', 'distritos.id = usuarios.distritoID');
			$this->db->where('nivel !=', 'cliente');
			$this->db->where('nivel !=', 'sistemas');
			$this->db->where('control', 'activado');
			$this->db->where('usuarioID', $this->session->userdata('usuarioID'));
			$query = $this->db->get();
			
			return $query->result_array();
		}
		
		public function change_pass($usuarioID)
		{
			$pass = '$M$Sy5$rd' . sha1($this->input->post('password')) . '$$u';

			$data['password'] = $pass;
			$this->db->where('usuarioID', $usuarioID);
			$this->db->update('usuarios', $data);
		}
			
		public function update_user($usuarioID)
		{
			$data = array(
				'nombre' => $this->input->post('nombre'),
				'apellido' => $this->input->post('apellido'),
				'distritoID' => $this->input->post('distritoID'),
				'direccion' => $this->input->post('direccion'),
				'correo' => $this->input->post('correo'),
				'puesto' => $this->input->post('puesto'),
				'cuotas' => $this->input->post('cuotas'),
				'correo_control' => $this->input->post('correo_control'),
				'nivel' => $this->input->post('nivel_acceso')
			);
			$this->db->where('usuarioID', $usuarioID);
			$this->db->update('usuarios', $data);

		}

		public function tareas_soporte($usuarioID)
		{
			$this->db->select('s_fecha, s_problema, soporteID, s_cliente, s_tecnico, s_estado');
			$this->db->from('soporte');
			$this->db->where('s_tecnico', $usuarioID);
			$this->db->where('s_estado !=', 'cerrado');
			$this->db->where('s_mensaje_directo', 'no');
			$this->db->order_by('soporteID', 'desc');
			$query = $this->db->get_where();
			return $query->result_array();
		}

		public function tareas_ventas($usuarioID)
		{
			$this->db->select('v_nombre, v_apellido, v_dni, ventasID, v_estado, v_fecha, v_tecnicoID, v_fecha_visita, v_direccion');
			$this->db->from('ventas');
			$this->db->where('v_tecnicoID', $usuarioID);
			$this->db->where('v_visita', 'no');
			$this->db->where('v_estado !=', 'cerrado');
			$this->db->order_by('ventasID', 'desc');
			$query = $this->db->get_where();
			return $query->result_array();
		}

		public function ventas_visita($usuarioID)
		{
			$this->db->select('v_nombre, v_apellido, v_dni, ventasID, v_estado, v_fecha, v_tecnicoID, v_fecha_visita, v_direccion');
			$this->db->from('ventas');
			$this->db->where('v_tecnicoID', $usuarioID);
			$this->db->where('v_estado !=', 'cerrado');
			$this->db->where('v_visita', 'si');
			$this->db->where('v_facilidades !=', 'si');
			$this->db->order_by('ventasID', 'desc');
			$query = $this->db->get_where();
			return $query->result_array();
		}

		public function ventas_instalacion($usuarioID)
		{
			$this->db->select('v_nombre, v_apellido, v_dni, ventasID, v_estado, v_fecha, v_tecnicoID, v_fecha_visita, v_direccion');
			$this->db->from('ventas');
			$this->db->where('v_tecnicoID', $usuarioID);
			$this->db->where('v_estado', 'cerrado');
			$this->db->where('v_visita', 'si');
			$this->db->where('v_facilidades', 'si');
			$this->db->where('v_instalado', 'no');
			$this->db->order_by('ventasID', 'desc');
			$query = $this->db->get_where();
			return $query->result_array();
		}

		public function add_user()
		{
			$pass = '$M$Sy5$rd' . sha1($this->input->post('password')) . '$$u';

			$data = array(
				'nombre' => $this->input->post('nombre'),
				'apellido' => $this->input->post('apellido'),
				'distritoID' => $this->input->post('distritoID'),
				'direccion' => $this->input->post('direccion'),
				'puesto' => $this->input->post('puesto'),
				'cuotas' => $this->input->post('cuotas'),
				'correo' => $this->input->post('correo'),
				'correo_control' => $this->input->post('correo_control'),
				'sexo' => $this->input->post('sexo'),
				'usuario' => $this->input->post('usuario'),
				'password' => $pass,
				'nivel' => $this->input->post('nivel'),
				'responsable' => $this->input->post('responsable')
				);
			$this->db->insert('usuarios', $data);
		}
		
		public function get_mensajes(){// TRAEMOS AL PERFIL TODOS LOS MENSAJES CHAT
			$this->db->select('soporteID, s_problema, s_fecha');
			$this->db->from('soporte');
			$this->db->where('s_mensaje_directo', 'si');
			$this->db->where('s_tecnico', $this->session->userdata('usuarioID'));
			$query = $this->db->get_where();
			return $query->result_array();
		}
		
		public function add_permisos($usuarioID){
			$data['usuarioID'] = $this->input->post('usuarioID');
			$this->db->where('usuarioID', $usuarioID);
			$this->db->insert('permisos', $data);
		}
		
		public function get_permiso($usuarioID)
		{
			$this->db->select('permisos.clientes, permisos.pagos, permisos.servicio_cliente, permisos.logistica, permisos.permisoID, permisos.usuarioID');
			$this->db->from('permisos');
			$this->db->join('usuarios', 'permisos.usuarioID = usuarios.usuarioID');
			$this->db->where('usuarios.usuarioID', $usuarioID);	
			$query = $this->db->get_where();
			return $query->row_array();			
		}

		public function update_permisos($usuarioID)
		{
			$data = array(
				'clientes' => $this->input->post('clientes'),
				'pagos' => $this->input->post('pagos'),
				'servicio_cliente' => $this->input->post('servicio_cliente'),
				'logistica' => $this->input->post('logistica')
			);
			$this->db->where('usuarioID', $usuarioID);
			$this->db->update('permisos', $data);
		}

		// ultimos cambios 

		public function set_permiso_torres()
		{
			$data = array(
				'torreID' => $this->input->post('torreID'),
				'usuarioID' => $this->input->post('usuarioID'),
				'permiso' => 1
			);

			$torre_exist = $this->db->get_where(
				'permisos_torre',
				array(
					'torreID' => $this->input->post('torreID'),
					'usuarioID' => $this->input->post('usuarioID')
				));

			if ( $torre_exist->num_rows() < 1 ) {
				$this->db->insert('permisos_torre', $data);
			}

		}

		public function delete_permiso_torres($permisoID)
		{
			$this->db->delete('permisos_torre', array('id' => $permisoID));
		}

	} 