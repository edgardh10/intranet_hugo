<?php
class Imagenes extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
	function mapas($usuarioID)
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$config['upload_path'] = './cargas/mapas/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1024';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$config['file_name'] = 'michelon-'.$usuarioID;
		$config['overwrite'] = TRUE;
		// $this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('fracaso', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$insert = array(
				'mapa' => $this->upload->data('file_name'),
			);
			$this->db->where('usuarioID', $usuarioID);
			$this->db->update('usuarios', $insert);
			$this->session->set_flashdata('mensaje', 1);
			redirect (base_url().'clientes/perfil/'.$usuarioID);
			//$this->load->view('exito', $data);
		}
	}

	function gallery($usuarioID)
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}

		$config['upload_path']          = './gallery/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_name'] = 'megasystemas_'.$usuarioID;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('fracaso', $error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

                // $this->load->view('upload_success', $data);

                $image = array(
					'usuarioID' => $usuarioID,
					'image' => $this->upload->data('file_name'),
				);
				$this->db->insert('gallery', $image);
				$this->session->set_flashdata('success', 1);
				redirect (base_url().'clientes/perfil/'.$usuarioID);


        }
	}
		
	function casa($usuarioID)
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$config['upload_path'] = './cargas/casa/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1024';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$config['file_name'] = 'michelon-'.$usuarioID;
		$config['overwrite'] = TRUE;
		// $this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('fracaso', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$insert = array(
				'fotoCasa' => $this->upload->data('file_name'),
			);
			$this->db->where('usuarioID', $usuarioID);
			$this->db->update('usuarios', $insert);
			$this->session->set_flashdata('mensaje', 1);
			redirect (base_url().'clientes/perfil/'.$usuarioID);
		}
	}
		
	function perfil_user($usuarioID) // IMAGENES DE PERFIL DE USUARIO DEL SISTEMA
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$config['upload_path'] = './cargas/perfil/usuario/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1024';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$config['file_name'] = 'ms_perfil-'.$usuarioID;
		$config['overwrite'] = TRUE;
		$this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('fracaso', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$insert = array(
				'foto_perfil' => $this->upload->data('file_name'),
			);
			$this->db->where('usuarioID', $usuarioID);
			$this->db->update('usuarios', $insert);
			$this->session->set_flashdata('mensaje', 1);
			redirect (base_url().'usuarios/perfil/'.$usuarioID);
		}
	}
		
	function avatar_user($usuarioID) // IMAGENES DE AVATAR DE USUARIOS DEL SISTEMA
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$config['upload_path'] = './cargas/avatar/usuario/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1024';
		$config['max_width'] = '1000';
		$config['max_height'] = '1000';
		$config['file_name'] = 'ms_avatar-'.$usuarioID;
		$config['overwrite'] = TRUE;
		$this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('fracaso', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$insert = array(
				'foto_avatar' => $this->upload->data('file_name'),
			);
			$this->db->where('usuarioID', $usuarioID);
			$this->db->update('usuarios', $insert);
			$this->session->set_flashdata('mensaje', 1);
			redirect (base_url().'usuarios/perfil/'.$usuarioID);
		}
	}
		
	function perfil_cliente($usuarioID) // IMAGENES DE PERFIL DEL CLIENTE
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$config['upload_path'] = './cargas/perfil/cliente/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1024';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$config['file_name'] = 'ms_perfil-'.$usuarioID;
		$config['overwrite'] = TRUE;
		$this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('fracaso', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$insert = array(
				'foto_perfil' => $this->upload->data('file_name'),
			);
			$this->db->where('usuarioID', $usuarioID);
			$this->db->update('usuarios', $insert);
			$this->session->set_flashdata('mensaje', 1);
			redirect (base_url().'clientes/perfil/'.$usuarioID);
		}
	}
		
	function avatar_cliente($usuarioID) // IMAGENES DE AVATAR DEL CLIENTE
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') == 'cliente')
		{
			redirect(base_url().'login');
		}
		$config['upload_path'] = './cargas/avatar/cliente/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1024';
		$config['max_width'] = '1000';
		$config['max_height'] = '1000';
		$config['file_name'] = 'ms_avatar-'.$usuarioID;
		$config['overwrite'] = TRUE;
		$this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('fracaso', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$insert = array(
				'foto_avatar' => $this->upload->data('file_name'),
			);
			$this->db->where('usuarioID', $usuarioID);
			$this->db->update('usuarios', $insert);
			$this->session->set_flashdata('mensaje', 1);
			redirect (base_url().'clientes/perfil/'.$usuarioID);
		}
	}
		
		// IMAGENES SUBIDAS POR EL CLIENTE
		
	function perfil_cliente_cliente($usuarioID) // IMAGENES DE PERFIL DEL CLIENTE
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') != 'cliente')
		{
			redirect(base_url().'login');
		}
		$config['upload_path'] = './cargas/perfil/cliente/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1024';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$config['file_name'] = 'ms_perfil-'.$usuarioID;
		$config['overwrite'] = TRUE;
		$this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('fracaso', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$insert = array(
				'foto_perfil' => $this->upload->data('file_name'),
			);
			$this->db->where('usuarioID', $usuarioID);
			$this->db->update('usuarios', $insert);
			$this->session->set_flashdata('mensaje', 1);
			redirect (base_url().'customer');
		}
	}
		
	function avatar_cliente_cliente($usuarioID) // IMAGENES DE AVATAR DEL CLIENTE
	{
		if($this->session->userdata('nivel') == FALSE || $this->session->userdata('nivel') != 'cliente')
		{
			redirect(base_url().'login');
		}
		$config['upload_path'] = './cargas/avatar/cliente/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1024';
		$config['max_width'] = '1000';
		$config['max_height'] = '1000';
		$config['file_name'] = 'ms_avatar-'.$usuarioID;
		$config['overwrite'] = TRUE;
		$this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('fracaso', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$insert = array(
				'foto_avatar' => $this->upload->data('file_name'),
			);
			$this->db->where('usuarioID', $usuarioID);
			$this->db->update('usuarios', $insert);
			$this->session->set_flashdata('mensaje', 1);
			redirect (base_url().'customer');
		}
	}


	function delete($id)
	{
		$this->db->delete('gallery', array('id' => $id)); // borrando de la DB

		$image = $this->db->get_where('gallery', array('id' => $id));
		$image = $image->row_array();
		$image = $image['image'];
		
		$this->load->helper("file");
		unlink(base_url('gallery/').$image); // borrando la imagen fisica ***pendiente ***
		$this->session->set_flashdata('delete_image', 1);
		$this->load->library('user_agent');
		redirect ($this->agent->referrer());
	}
}