<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gestion extends CI_Controller {

	public function __construct()
		{
		parent::__construct();
		$this->load->model('m_gestion');
		$this->load->model('m_clientes');
		$this->load->model('m_usuarios');
		$this->load->model('m_modal');
		}
	public function soporte() // TRAEMOS EL SOPORTE SIN CERRAR
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}


		if ($this->session->userdata('nivel') != 'empleado') {
			
			$data['soporte_hoy'] = $this->m_gestion->soporte_uno();
			$data['soporte'] = $this->m_gestion->soporte_cerrado();

		} else {
			
			$data['soporte_hoy'] = $this->m_gestion->groups_soporte();
			$data['soporte'] = $this->m_gestion->groups_soporte_cerrado();

		}

		$data['title'] = 'Soporte al Cliente';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/soporte/v_soporte', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	
	public function ventas() // TRAEMOS TODAS LAS VENTAS NUEVAS
	{// ventas nuevas ingresadas para comprobacion
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['ventas'] = $this->m_gestion->ventas_uno();
		//$data['ventas_pendiente'] = $this->m_gestion->ventas_abiertas_hoy();
		//$data['ventas'] = $this->m_gestion->ventas_finalizadas();
		$data['title'] = 'Administrar ventas';
		$data['title_modal'] = 'Actualizar Venta';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/soporte/v_ventas', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	
	public function ventas_visita() // VISITA DE VENTAS
	{// ventas para visitar y comprobar la factibilidad
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['ventas'] = $this->m_gestion->ventas_uno();
		//$data['ventas_pendiente'] = $this->m_gestion->ventas_abiertas_hoy();
		//$data['ventas'] = $this->m_gestion->ventas_finalizadas();
		$data['title'] = 'Visitar a Prospectos';
		$data['title_modal'] = 'Actualizar Venta';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/soporte/v_ventas_visita', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	
	public function ventas_instalacion() // VISITA DE VENTAS
	{// ventas para visitar y comprobar la factibilidad
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['ventas'] = $this->m_gestion->ventas_uno();
		$data['title'] = 'Prospectos para instalar servicio';
		$data['title_modal'] = 'Actualizar Venta';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/soporte/v_ventas_instalacion', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	
	public function ventas_archivo() // VENTAS ARCHIVADAS
	{ // ventas que pasaron y son factibles como las que no
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['ventas'] = $this->m_gestion->ventas_uno();
		//$data['ventas_pendiente'] = $this->m_gestion->ventas_abiertas_hoy();
		//$data['ventas'] = $this->m_gestion->ventas_finalizadas();
		$data['title'] = 'Registro de ventas procesadas sin facilidades';
		$data['title_modal'] = 'Actualizar Venta';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);
		$this->load->view('backend/soporte/v_ventas_archivo', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	
	public function agregar(){// CARGA LA VISTA PARA AGREGAR NUEVO SOPORTE
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		
		if ($this->session->userdata('nivel') != 'empleado') {
			$data['clientes'] = $this->m_clientes->get_usuario();
			$data['usuarios'] = $this->m_usuarios->get_usuario();
		} else {
			$data['clientes'] = $this->m_clientes->users_group('activado');
			$data['usuarios'] = $this->m_usuarios->get_usuario_group();
		}

		$data['title'] = 'Agregar Nuevo Soporte';
		$data['recurso'] = 'agregar';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/soporte/v_add_soporte', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	
	}
	
	public function chat(){// CARGA LA VISTA PARA AGREGAR NUEVO MENSAJE DIRECTO (CHAT)
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['clientes'] = $this->m_clientes->get_usuario();
		$data['title'] = 'Iniciar una conversación';
		$data['recurso'] = 'agregar';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/soporte/v_iniciar_chat', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	
	}
	
	
	public function agregado($id = false){ // AGREGAMOS EL SOPORTE
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		if(isset($_POST['procesar'])){
		$data['clientes'] = $this->m_gestion->agregar_soporte();		
			if ($id === false) {
				$this->session->set_flashdata('agregar', 1);
				redirect(base_url().'gestion/soporte/', 'refresh');
			} else {
				redirect(base_url().'clientes/perfil/'. $id, 'refresh');
			}
		}
	}
	
	public function agregado_mensaje(){// AGREGAMOS NUEVO MENSAJE DIRECTO (CHAT)
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		if(isset($_POST['procesar'])){
		$data['clientes'] = $this->m_gestion->agregar_mensaje();
		$this->session->set_flashdata('agregar', 1);
		redirect(base_url().'gestion/conversacion/'.$this->db->insert_id(), 'refresh');
		}
	}
	
	public function actualizar($soporteID) // VISTA DONDE ACTUALIZAMOS SOPORTE
	{ // carga la vista del formulario 
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['row'] = $this->m_gestion->soporte_uno($soporteID);
		$data['chat'] = $this->m_gestion->soporte_chat($soporteID);
		$data['usuarios'] = $this->m_usuarios->get_usuario();
		if (empty($data['row'])){show_404();}
		$data['title'] = $data['row']['apellido'];
		$data['title_modal'] = 'Eliminar Soporte';
		$data['recurso'] = 'agregar';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/soporte/v_update_soporte', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	
	public function conversacion($soporteID)// VISTA DONDE CONVERSAMOS DIRECTAMENTE CHAT
	{ // carga la vista del formulario 
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['row'] = $this->m_gestion->soporte_uno($soporteID);
		$data['chat'] = $this->m_gestion->soporte_chat($soporteID);
		$data['usuarios'] = $this->m_usuarios->get_usuario();
		if (empty($data['row'])){show_404();}
		$data['title'] = $data['row']['apellido'];
		$data['title_modal'] = 'Eliminar Soporte';
		$data['recurso'] = 'agregar';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/soporte/v_mostrar_chat', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	
	public function update_soporte($soporteID){// METODO QUE ACTUALIZA EL SOPORTE
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		
		$this->m_gestion->actualizar_soporte($soporteID);
		redirect (base_url().'gestion/actualizar/'.$_POST['soporteID'], 'refresh');
	}
	
	public function cierra_soporte($soporteID){// METODO PARA CERRAR SOPORTE
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_gestion->cerrar_soporte($soporteID);
		redirect (base_url().'gestion/actualizar/'.$_POST['soporteID'], 'refresh');
	}
	public function agregar_chat() // AGREGAMOS LAS CONVERSACIONES DE LOS SOPORTES
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_gestion->insert_chat();
		redirect(base_url().'gestion/actualizar/'.$_POST['ticketsID'], 'refresh');
	}
	
	public function agregar_conversacion() // AGREGAMOS LAS CONVERSACIONES DEL CHAT
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_gestion->insert_chat();
		redirect(base_url().'gestion/conversacion/'.$_POST['ticketsID'], 'refresh');
	}
	
	public function add_venta()
	{// VISTA PARA AGREGAR NUEVA VENTA
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['usuarios'] = $this->m_usuarios->get_usuario();
		$data['title'] = 'Ingresar nueva venta';
		$data['recurso'] = 'generar_facturas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/soporte/v_add_venta', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	
	public function ingresar_venta()
	{// METODO QUE INGRESA LA VENTA
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_gestion->add_venta();
		$this->session->set_flashdata('agregar', 1);
		redirect (base_url().'gestion/ventas/');
	}
	
	public function actualizar_venta($ventasID)
	{// VISTA PARA ACTUALIZAR LA VENTA
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_gestion->update_venta($ventasID);
		$this->session->set_flashdata('editar', 1);
		redirect (base_url().'gestion/ventas');
		}

	public function migrar_venta_cliente($id)
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		

		// añadimos el cliente
		$this->m_gestion->migrar_venta_cliente();
		$usuarioID = $this->db->insert_id();

		//agregamos el telefono
		$this->m_gestion->add_telefono_migrado($usuarioID);
		// eliminmos prospecto
		$this->m_modal->delete_venta($id);

		redirect (base_url().'clientes/');
	}
}