<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('m_login');
    }
	
	public function index()
	{	
		switch ($this->session->userdata('nivel')) {
			case '':
				$data['title'] = 'Ingresar al sistema';
				$this->load->view('v_login',$data);
				break;
			case 'admin_sup':
				redirect(base_url().'admin');
				break;	
			case 'sistemas':
				redirect(base_url().'usuarios/perfil/'.$this->session->userdata('usuarioID'));
				break;	
			case 'admin':
				redirect(base_url().'usuarios/perfil/'.$this->session->userdata('usuarioID'));
				break;
			case 'empleado':
				redirect(base_url().'usuarios/perfil/'.$this->session->userdata('usuarioID'));
				break;
			case 'cliente':
				redirect(base_url().'customer');
				break;
			default:		
				$data['title'] = 'Ingresar al sistema';
				$this->load->view('v_login',$data);
				break;		
		}
	}

public function new_user()
	{
            //lanzamos mensajes de error si es que los hay
				$usuario = $this->input->post('usuario');
				$password = '$M$Sy5$rd' . sha1($this->input->post('password')) . '$$u';
				$check_user = $this->login_user($usuario,$password);

				// var_dump($check_user);
				if($check_user)
				{
					$data = array(
	                'is_logued_in' 	=> 		TRUE,
	                'usuarioID' 	=> 		$check_user->usuarioID,
	                'nivel'			=>		$check_user->nivel,
	                'usuario' 		=> 		$check_user->usuario,
	                'nombre' 		=> 		$check_user->nombre,
	                'apellido'		=>		$check_user->apellido,
	                'direccion' 	=> 		$check_user->direccion,
	                'correo' 		=> 		$check_user->correo,
	                'sexo'			=>		$check_user->sexo,
	                'cuotas' 		=> 		$check_user->cuotas,
	                'fechaInst' 	=> 		$check_user->fechaInst,
	                'foto_avatar'	=>		$check_user->foto_avatar,
					'foto_perfil'	=>		$check_user->foto_perfil
            		);		
					$this->session->set_userdata($data);
					$this->index();
				}
			redirect(base_url().'login');
		
	}
	
/*	public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}
*/	
	public function login_user($usuario,$password)
	{
		$this->db->where('usuario',$usuario);
		$this->db->where('password',$password);
		$query = $this->db->get('usuarios');

		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
			redirect(base_url().'login','refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}
}