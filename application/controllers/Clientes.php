<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct()
		{
		parent::__construct();
		$this->load->model('m_clientes');
		$this->load->model('m_logistica');
		$this->load->model('m_usuarios');
		$this->load->model('m_imagenes');
		$this->load->library('geolocalizacion');
		$this->load->model('m_geolocalizacion');
		}
	public function index()
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}

		if ($this->session->userdata('nivel') != 'empleado') {
			$data['usuarios'] = $this->m_clientes->get_usuario();
		} else {
			$data['usuarios'] = $this->m_clientes->users_group('activado');
		}

		$data['title'] = 'Clientes Activos';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/clientes/v_clientes', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	
	public function agregar()
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		 // Agregar nuevo cliente
		$data['usuarios'] = $this->m_clientes->get_usuario();
		$data['departamentos'] = $this->m_clientes->get_departamentos();
		$data['title'] = 'Agregar Clientes Nuevos';
		$data['recurso'] = 'agregar';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/clientes/v_add_clientes', $data);
		$this->load->view('backend/plantilla/footer');
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}

	public function get_provincias()
	{
		$this->m_clientes->get_provincias();
	}

	public function get_distritos()
	{
		$this->m_clientes->get_distritos();
	}

	public function perfil($usuarioID)
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}

		$data['row'] = $this->m_clientes->get_usuario($usuarioID);
		$data['usuarios'] = $this->m_usuarios->get_usuario();		
		
		if ( $this->session->userdata('nivel') == 'empleado' ) {
			
			$data['row'] = $this->m_clientes->user_group($usuarioID);
			$cheking = $this->m_clientes->user_group($usuarioID);

			if (!$cheking) {
				$this->load->library('user_agent');
				redirect ($this->agent->referrer());
			}
			
			$data['usuarios'] = $this->m_usuarios->get_usuario_group();		

		}

		$data['departamento'] = $this->m_clientes->name_departamento_provincia($usuarioID, 'departamento');
		$data['provincia'] = $this->m_clientes->name_departamento_provincia($usuarioID, 'provincia');
		$data['torre'] = $this->m_clientes->get_torre($usuarioID);
		$data['transmisor'] = $this->m_clientes->get_transmisor($usuarioID);
		$data['radio'] = $this->m_clientes->get_radio($usuarioID);
		$data['telefonos'] = $this->m_clientes->get_telefono($usuarioID);
		$data['facturas'] = $this->m_clientes->get_factura($usuarioID);
		$data['torres'] = $this->m_logistica->get_torres();
		$data['transmisores'] = $this->m_logistica->get_transmisores();
		$data['radios'] = $this->m_logistica->get_radios();
		$data['soporte'] = $this->m_clientes->get_soporte();
		$data['departamentos'] = $this->m_clientes->get_departamentos();
		$data['gallery'] = $this->m_imagenes->user_images($usuarioID);		

		$user_id = $data['row']['usuarioID'];
		$user_data = $this->m_geolocalizacion->verified_user($user_id);
		if ($user_data) {
			$set_pop_map = $this->geolocalizacion->pop_mapa_mensaje($user_data->nombre, $user_data->apellido, $user_data->direccion, $user_data->distrito, $user_data->lat, $user_data->lng );

		$data['renderMapas'] = $this->geolocalizacion->geoMapas($user_data->lat, $user_data->lng, $set_pop_map);
		} else {
			$mensaje = "\"<h3>Aun no se ha establecido la ubicación para este cliente</h3>\"";
			$data['renderMapas'] = $this->geolocalizacion->geoMapas(-11.957748311511065, -77.08082939754489, $mensaje);
		}
		
		if (empty($data['row'])){show_404();}
		$data['title'] = $data['row']['apellido'];
		$data['title_modal'] = 'Agregar / Editar';
		$data['recurso'] = 'generar_facturas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/clientes/v_perfil', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	
	public function ingresado(){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_clientes->add_cliente();
		redirect(base_url().'clientes/', 'refresh');
		}
	public function actualizar($usuarioID){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_clientes->update_cliente($usuarioID);
		redirect(base_url().'clientes/perfil/'.$usuarioID, 'refresh');
		}
	
	public function desactivados()
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}

		if ($this->session->userdata('nivel') != 'empleado') {
			$data['usuarios'] = $this->m_clientes->usuarios_desactivados();
		} else {
			$data['usuarios'] = $this->m_clientes->users_group('retirado');
		}

		$data['title'] = 'Clientes Desactivados';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/clientes/v_clientes_desactivados', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	
	public function cortados()
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}

		if ($this->session->userdata('nivel') != 'empleado') {
			$data['usuarios'] = $this->m_clientes->usuarios_cortados();
		} else {
			$data['usuarios'] = $this->m_clientes->users_group('cortado');
		}

		$data['title'] = 'Clientes con servicio Cortado';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/clientes/v_clientes_cortados', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	
	public function morosos()
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}

		if ($this->session->userdata('nivel') != 'empleado') {
			$data['usuarios'] = $this->m_clientes->usuarios_morosos();
		} else {
			$data['usuarios'] = $this->m_clientes->users_group_morosos();
		}

		$data['title'] = 'Clientes Morosos';
		$data['recurso'] = 'tablas';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/clientes/v_clientes_morosos', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	
	public function individual() // generacion de factura individual
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		
		$this->m_clientes->factura_individual();
		$this->session->set_flashdata('factura', 1);
		redirect(base_url().'clientes/perfil/'.$_POST['usuarioID'], 'refresh');
	}

	public function agregar_telefono(){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_clientes->add_telefono();
		$this->session->set_flashdata('agregar', 1);
		redirect (base_url().'clientes/perfil/'.$_POST['usuarioID']);
	}
	public function editar_telefono($telefonoID){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_clientes->update_telefono($telefonoID);
		$this->session->set_flashdata('editar', 1);
		redirect (base_url().'clientes/perfil/'.$_POST['usuarioID']);
	}
	// ultima modificacion 10/10/2015
	public function asignar_radio($usuarioID){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_clientes->asign_radio($usuarioID);
		$this->session->set_flashdata('asignar', 1);
		redirect (base_url().'clientes/perfil/'.$usuarioID);
	}
	
	public function asignar_transmisor($usuarioID){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_clientes->asign_transmisor($usuarioID);
		$this->session->set_flashdata('asignar', 1);
		redirect (base_url().'clientes/perfil/'.$usuarioID);
	}
	
	public function asignar_torre($usuarioID){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_clientes->asign_torre($usuarioID);
		$this->session->set_flashdata('asignar', 1);
		redirect (base_url().'clientes/perfil/'.$usuarioID);
	}
	
	public function cambiar_clave($usuarioID){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_clientes->change_password($usuarioID);
		$this->session->set_flashdata('pass', 1);
		redirect (base_url().'clientes/perfil/'.$usuarioID);
	}

	// añadido 22/10/2017
	public function cambiar_estado($id)
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data = array(
			'control' => $this->input->post('control'),
		);
		$this->db->where('usuarioID', $id);
		$this->db->update('usuarios', $data);
		redirect (base_url().'clientes/perfil/'.$id);
		
	}
}