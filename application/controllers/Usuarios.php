<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
		{
		parent::__construct();
		$this->load->model('m_usuarios');
		$this->load->model('m_clientes');
		}
	public function index()
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['usuarios'] = $this->m_usuarios->get_usuario();
		$data['title'] = 'Lista de Usuarios';
		$data['recurso'] = 'lista_usuarios';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/usuarios/v_usuarios', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}
	public function perfil($usuarioID)
		{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['row'] = $this->m_usuarios->get_usuario($usuarioID);
		$data['soporte'] = $this->m_usuarios->tareas_soporte($usuarioID);
		$data['ventas'] = $this->m_usuarios->tareas_ventas($usuarioID);
		$data['visita'] = $this->m_usuarios->ventas_visita($usuarioID);
		$data['instalacion'] = $this->m_usuarios->ventas_instalacion($usuarioID);
		$data['permiso'] = $this->m_usuarios->get_permiso($usuarioID);
		$data['mensajes'] = $this->m_usuarios->get_mensajes();
		$data['title'] = $data['row']['apellido'].' | Perfil';
		$data['title_modal'] = 'Agregar / Actualizar';
		$data['recurso'] = 'perfil_user';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/usuarios/v_user_perfil', $data);
		$this->load->view('backend/plantilla/modal', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
		}
	
	public function cuenta($usuarioID)
		{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$data['row'] = $this->m_usuarios->get_usuario($usuarioID);
		$data['permiso'] = $this->m_usuarios->get_permiso($usuarioID);

		$data['departamentos'] = $this->m_clientes->get_departamentos();
		$data['departamento'] = $this->m_clientes->name_departamento_provincia($usuarioID, 'departamento');
		$data['provincia'] = $this->m_clientes->name_departamento_provincia($usuarioID, 'provincia');
		$nivel = $this->session->userdata('nivel');
		$data['niveles'] = $this->nivelesAcceso($nivel);
		$data['title'] = $data['row']['apellido'].' | Perfil';
		$data['recurso'] = 'perfil_user';
		$this->load->view('backend/plantilla/header-recursos', $data);
		$this->load->view('backend/plantilla/header', $data);
		$this->load->view('backend/plantilla/menu', $data);		
		$this->load->view('backend/usuarios/v_user_cuenta', $data);
		$this->load->view('backend/plantilla/footer', $data);
		$this->load->view('backend/plantilla/footer-recursos', $data);
	}

	public function cambiar_pass($usuarioID){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_usuarios->change_pass($usuarioID);
		$this->session->set_flashdata('mensaje', 1);
		redirect (base_url().'usuarios/perfil/'.$usuarioID);
		}
	
	public function actualizar_user($usuarioID){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$this->m_usuarios->update_user($usuarioID);
		$this->session->set_flashdata('mensaje', 1);
		redirect (base_url().'usuarios/perfil/'.$usuarioID);
		}
	public function agregar_usuario(){
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$id = $this->session->userdata('usuarioID');
		$this->m_usuarios->add_user();
		$this->session->set_flashdata('agregar', 1);
		redirect (base_url().'usuarios/perfil/'.$id);
		}
	public function permisos($usuarioID){
		$this->m_usuarios->add_permisos($usuarioID);
		$this->session->set_flashdata('mensaje_acceso', 1);
		redirect (base_url().'usuarios/perfil/'.$usuarioID);
		}
	public function editar_permisos($usuarioID){
		$this->m_usuarios->update_permisos($usuarioID);
		$this->session->set_flashdata('mensaje_acceso', 1);
		redirect (base_url().'usuarios/perfil/'.$usuarioID);
		}
	public function nivelesAcceso($nivel)
	{
		switch ($nivel) {
			case 'empleado':
				return array('nivel' => ['empleado']);
				break;
			case 'admin':
				return array('nivel' => ['empleado', 'admin']);
				break;
			
			default:
				return array('nivel' => ['empleado', 'admin', 'admin_sup']);
				break;
		}
	}

	// añadiendo permisos de torre
	public function set_permiso_torres()
	{
		$this->m_usuarios->set_permiso_torres();
		$this->session->set_flashdata('mensaje_acceso', 1);
		redirect (base_url().'usuarios/perfil/'.$this->input->post('usuarioID'));
	}

	public function delete_permiso_torres($permisoID)
	{
		$this->load->library('user_agent');
		
		$this->m_usuarios->delete_permiso_torres($permisoID);
		$this->session->set_flashdata('mensaje_acceso', 1);
		redirect ($this->agent->referrer());
	}
}