<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class M_clientes extends CI_Model {

		public function __construct()
		{
		//$this->load->database();
		}
		// FUNCION PARA TRAER CLIENTES ACTIVOS
		public function get_usuario($usuarioID = FALSE)
		{
			if ($usuarioID === FALSE)
				{
					$this->db->select('*');
					$this->db->from('usuarios');
					$this->db->join('distritos', 'distritos.id = usuarios.distritoID');
					$this->db->where('nivel', 'cliente');
					$this->db->where('control', 'activado');
					$this->db->order_by('usuarioID', 'DESC');
					$query = $this->db->get();
					
					return $query->result_array();
				}
					$this->db->select('*');
					$this->db->from('usuarios');
					$this->db->join('distritos', 'distritos.id = usuarios.distritoID');
					$this->db->where('nivel', 'cliente');
					//$this->db->where('control', 'activado');
					$this->db->where('usuarioID', $usuarioID);
					$query = $this->db->get_where();
					return $query->row_array();
		}

		// funcion para grupo de usuarios administrados

		public function users_group($status)
		{
			$this->db->select('usuarios.usuarioID, usuarios.usuario, usuarios.nombre, usuarios.apellido, usuarios.cuotas, usuarios.correo,distritos.distrito');
			$this->db->from('usuarios');
			$this->db->join('distritos', 'distritos.id = usuarios.distritoID');
			$this->db->join('permisos_torre', 'usuarios.torreID = permisos_torre.torreID');
			$this->db->where('permisos_torre.usuarioID', $this->session->userdata('usuarioID'));
			// $this->db->where('permisos_torre.usuarioID', 197);
			$this->db->where('nivel', 'cliente');
			$this->db->where('control', $status);
			$this->db->order_by("usuarios.usuarioID", 'DESC');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function user_group($usuarioID)
		{
			$this->db->select('*');
			$this->db->from('usuarios');
			$this->db->join('distritos', 'distritos.id = usuarios.distritoID');
			$this->db->join('permisos_torre', 'usuarios.torreID = permisos_torre.torreID');
			$this->db->where('permisos_torre.usuarioID', $this->session->userdata('usuarioID'));
			// $this->db->where('permisos_torre.usuarioID', 197);
			$this->db->where('nivel', 'cliente');
			$this->db->where('usuarios.usuarioID', $usuarioID);
			$query = $this->db->get_where();
			return $query->row_array();
		}

		public function users_group_morosos()
		{
			$this->db->select('nombre,apellido,usuario,Count(usuario) AS total,direccion,usuarios.usuarioID,usuarios.cuotas,correo,correo_control,distrito');
			$this->db->from('usuarios');
			$this->db->join('pagos', 'usuarios.usuarioID = pagos.usuarioID');
			$this->db->join('distritos', 'distritos.id = usuarios.distritoID');
			$this->db->join('permisos_torre', 'usuarios.torreID = permisos_torre.torreID');
			$this->db->where('permisos_torre.usuarioID', $this->session->userdata('usuarioID'));
			// $this->db->where('permisos_torre.usuarioID', 197);
			$this->db->where('estado', 'inpago');
			$this->db->group_by("usuario");
			$this->db->order_by('total', 'DESC');
			$query = $this->db->get();
			return $query->result_array();
		}



		// FUNCION PARA TRAER CLIENTES MOROSOS
		public function usuarios_morosos()
		{
			$this->db->select('nombre,apellido,usuario,Count(usuario) AS total,direccion,usuarios.usuarioID,usuarios.cuotas,correo,correo_control,distrito');
			$this->db->from('usuarios');
			$this->db->join('pagos', 'usuarios.usuarioID = pagos.usuarioID');
			$this->db->join('distritos', 'distritos.id = usuarios.distritoID');
			$this->db->where('estado', 'inpago');
			$this->db->group_by("usuario");
			$this->db->order_by('total', 'DESC');
			$query = $this->db->get();
			return $query->result_array();
		}
		// FUNCION PARA TRAER CLIENTES DESACTIVADOS
		public function usuarios_desactivados()
		{		
			$this->db->select('*');
			$this->db->from('usuarios');
			$this->db->join('distritos', 'distritos.id = usuarios.distritoID');
			$this->db->where('nivel', 'cliente');
			$this->db->where('control', 'retirado');
			$query = $this->db->get();
			return $query->result_array();
		
		}
		// FUNCION PARA TRAER A LOS CLIENTES CORTADOS
		public function usuarios_cortados()
		{
			$this->db->select('*');
			$this->db->from('usuarios');
			$this->db->join('distritos', 'distritos.id = usuarios.distritoID');
			$this->db->where('nivel', 'cliente');
			$this->db->where('control', 'cortado');
			$query = $this->db->get();
			return $query->result_array();
		}
		
		public function get_departamentos()
		{
			$query = $this->db->get('departamentos');
			return $query->result_array();
		}

		public function get_provincias()
		{
			$departamentoID = $this->input->post('departamentoID');

			$query = $this->db->get_where('provincias', array('departamentoID' => $departamentoID));

			$provincias = $query->result_array();

			$html= "<option value='0'>Seleccionar Provincia</option>";

			foreach ($provincias as $key => $provincia) {
				
				$html.= "<option value='".$provincia['id']."'>".$provincia['provincia']."</option>";

			}
			
			echo $html;
		}

		public function get_distritos()
		{
			$provinciaID = $this->input->post('provinciaID');
	
			$query = $this->db->get_where('distritos', array('provinciaID' => $provinciaID));

			$distritos = $query->result_array();
			
			$html= "<option value='0'>Seleccionar Distrito</option>";

			foreach ($distritos as $key => $distrito) {
				
				$html.= "<option value='".$distrito['id']."'>".$distrito['distrito']."</option>";

			}

			echo $html;
		}
			
		// METODO PARA AGREGAR CLIENTES
		public function add_cliente()
		{
			//$this->load->helper('url');
			//$slug = url_title($this->input->post('title'), 'dash', TRUE);
			$pass = '$M$Sy5$rd' . sha1($this->input->post('password')) . '$$u';
			$data = array(
			'distritoID' => $this->input->post('distritoID'),
			'usuario' => $this->input->post('usuario'),
			'password' => $pass,
			'nombre' => $this->input->post('nombre'),
			'apellido' => $this->input->post('apellido'),
			'direccion' => $this->input->post('direccion'),
			'cuotas' => $this->input->post('cuotas'),
			'correo' => $this->input->post('correo'),
			'correo_control' => $this->input->post('correo_control'),
			'sexo' => $this->input->post('sexo'),
			'fechaInst' => $this->input->post('fechaInst'),
			'nivel' => $this->input->post('nivel'),
			'responsable' => $this->input->post('responsable')
			);
			return $this->db->insert('usuarios', $data);
			
		}
		
		// METODO PARA ACTUALIZAR UN CLIENTE	
		public function update_cliente($usuarioID = FALSE)
		{
			if ($usuarioID === FALSE){
				error_404;
				}
			$data = array(
			'distritoID' => $this->input->post('distritoID'),
			'usuario' => $this->input->post('usuario'),
			'nombre' => $this->input->post('nombre'),
			'apellido' => $this->input->post('apellido'),
			'direccion' => $this->input->post('direccion'),
			'cuotas' => $this->input->post('cuotas'),
			'correo' => $this->input->post('correo'),
			'correo_control' => $this->input->post('correo_control'),
			'control' => $this->input->post('control')
			);
			$this->db->where('usuarioID', $usuarioID);
			$this->db->update('usuarios', $data); 
			
		}
		
		public function factura_individual()
		{
			$cuota = $this->input->post('cuota');

			$user_tv = $this->db->get_where('television' , array('usuarioID' => $this->input->post('usuarioID'), 'status' => 1 )); // verificamos si el usuario tiene un plan de tv

			if ( $user_tv->num_rows() == 1 ) { // si lo tiene, entonces agregamos el costo de su plan a la factura
			
				$user_tv = $user_tv->row_array();

				$cuota = $this->input->post('cuota') + $user_tv['cuota']; // cuota asignada: datos + tv

			}

			$data = array(
				'usuarioID' => $this->input->post('usuarioID'),
				'fecha_vencimiento' => $this->input->post('fecha_vencimiento'),
				'mes' => $this->input->post('mes'),
				'referencia' => $this->input->post('referencia'),
				'cuota' => $cuota,
				'mensaje' => $this->input->post('mensaje')
			);
			return $this->db->insert('pagos', $data);
		}
			
		public function get_torre($usuarioID)
		{ // traer torre por usuario
			$this->db->select('torre, distrito, nombre, apellido');
			$this->db->from('usuarios');
			$this->db->join('torres', 'usuarios.torreID = torres.torreID');
			$this->db->join('distritos', 'torres.distritoID = distritos.id');
			$this->db->where('usuarioID', $usuarioID);
			$query = $this->db->get_where();
			return $query->row_array();
		}
		
		public function get_transmisor($usuarioID)
		{
			$this->db->select('equipos.tipo, equipos.proveedor, equipos.fechaCompra, equipos.comentario, equipos.asignado, equipos.numSerie, equipos.mac, usuarios.usuarioID, usuarios.nombre, usuarios.apellido, equipos_marca.marca, equipos.equiposID');
			$this->db->from('equipos');
			$this->db->join('usuarios', 'equipos.equiposID = usuarios.equiposID');
			$this->db->join('equipos_marca', 'equipos_marca.marcasID = equipos.marcasID');
			$this->db->where('usuarioID', $usuarioID);
			$query = $this->db->get_where();
			return $query->row_array();
		}
		
		public function get_radio($usuarioID)
		{
			$this->db->select('equipos.tipo, equipos.proveedor, equipos.fechaCompra, equipos.comentario, equipos.asignado, equipos.numSerie, equipos.mac, usuarios.usuarioID, usuarios.nombre, usuarios.apellido, equipos_marca.marca, equipos.equiposID');
			$this->db->from('equipos');
			$this->db->join('usuarios', 'equipos.mac = usuarios.mac');
			$this->db->join('equipos_marca', 'equipos_marca.marcasID = equipos.marcasID');
			$this->db->where('usuarioID', $usuarioID);
			$query = $this->db->get_where();
			return $query->row_array();
		}
		
		public function get_telefono($usuarioID)
		{
			$this->db->select('telefonos.tel_telefono, telefonos.tel_operador, telefonos.telefonoID, telefonos.usuarioID');
			$this->db->from('telefonos');
			$this->db->join('usuarios', 'telefonos.usuarioID = usuarios.usuarioID');
			$this->db->where('telefonos.usuarioID', $usuarioID);
			$query = $this->db->get_where();
			return $query->result_array();
		}
				
		public function get_factura($usuarioID)
		{// trae las facturas de los clientes al peril
				$this->db->select('*');
				$this->db->from('pagos');
				$this->db->join('usuarios', 'pagos.usuarioID = usuarios.usuarioID');
				$this->db->where('usuarios.usuarioID', $usuarioID);
				$this->db->order_by("pagosID", "desc");
				//$this->db->limit(7);
				$query = $this->db->get();
				return $query->result_array();
		}
		
		public function get_soporte()
		{
				$this->db->select('*');
				$this->db->from('soporte');
				$this->db->join('usuarios', 'soporte.s_cliente = usuarios.usuario');
				//$this->db->where('s_cliente', $usuarioID);
				//$this->db->where('s_visible', 'si');
				$this->db->order_by("soporteID", "desc");
				$query = $this->db->get();
				return $query->result_array();
		}
		
		public function add_telefono()
		{
			$data = array(
				'usuarioID' => $this->input->post('usuarioID'),
				'tel_telefono' => $this->input->post('tel_telefono'),
				'tel_operador' => $this->input->post('tel_operador')
			);
			$this->db->insert('telefonos', $data);
		}
		
		public function update_telefono($telefonoID)
		{
			$data = array(
				'usuarioID' => $this->input->post('usuarioID'),
				'tel_telefono' => $this->input->post('tel_telefono'),
				'tel_operador' => $this->input->post('tel_operador')
			);
			$this->db->where('telefonoID', $telefonoID);
			$this->db->update('telefonos', $data);
		}
		
		public function asign_radio($usuarioID)
		{// asignar una radio al cliente
			$equipo = $this->input->post('mac');
			$data = array(
				'asignado' => $this->input->post('asignado')
			);
			$this->db->where('mac', $equipo);
			$this->db->update('equipos', $data);
			// en la misma funcion actualizamos la mac del usuario
			if($_POST['volver']==1){// condicional para volver a almacen
			$data_user = array(
				'mac' => ''
			);
			} else {
			$data_user = array(
				'mac' => $this->input->post('mac')
			);
			}
			$this->db->where('usuarioID', $usuarioID);
			$this->db->update('usuarios', $data_user);
		}
		
		public function asign_transmisor($usuarioID){// asignar un transmisor al cliente
			$equipo = $this->input->post('equiposID');
			$data = array(
				'asignado' => $this->input->post('asignado')
			);
			$this->db->where('equiposID', $equipo);
			$this->db->update('equipos', $data);
			// en la misma funcion actualizamos el equiposID del cliente
			if($_POST['volver']==1){// condicional para volver a almacen
			$data_user = array(
				'equiposID' => ''
			);
			} else {
			$data_user = array(
				'equiposID' => $this->input->post('equiposID')
			);}
			$this->db->where('usuarioID', $usuarioID);
			$this->db->update('usuarios', $data_user);
		}
		
		public function asign_torre($usuarioID){
			$data = array(
				'torreID' => $this->input->post('torreID')
			);
			$this->db->where('usuarioID', $usuarioID);
			$this->db->update('usuarios', $data);
		}
		
		public function change_password($usuarioID){// subiendo las imagenes del cliente (Casa y Mapa)
			
			$pass = '$M$Sy5$rd' . sha1($this->input->post('password')) . '$$u';

			$data = array(
				'password' => $pass
			);
			$this->db->where('usuarioID', $usuarioID);
			$this->db->update('usuarios', $data);
		}

		public function name_departamento_provincia($usuarioID, $u)
		{
			$distrito = $this->db->get_where('usuarios', array('usuarioID' => $usuarioID))->row_array();
			$distritoID = $distrito['distritoID'];
			
			$find_provincia = $this->db->get_where('distritos', array('id' => $distritoID))->row_array();
			$provinciaID = $find_provincia['provinciaID'];
			
			$provincia = $this->db->get_where('provincias', array('id' => $provinciaID))->row_array();
			$departamentoID = $provincia['departamentoID'];

			$departamento = $this->db->get_where('departamentos', array('id' => $departamentoID))->row_array();

			if ($u == 'provincia') {
				return $provincia;
			}

			if ($u == 'departamento') {
				return $departamento;
			}

		}
		
/*		public function get_personal()
				{// CHAT CON EL PERSONAL Y CLIENTES
				$this->db->select('*');
				$this->db->from('usuarios');
				//$this->db->join('distrito', 'distrito.distritoID = usuarios.distritoID');
				//$this->db->where('nivel', 'cliente');
				$this->db->where('control', 'activado');
				$query = $this->db->get();
				return $query->result_array();
			}
*/	}