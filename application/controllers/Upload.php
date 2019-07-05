<?php defined('BASEPATH') or exit ('No direct script access allowed');

	class Upload extends CI_Controller {
		
		function __construct()
		{
		parent::__construct();
			$this->load->helper(array('form', 'url'));
		}
		function index()
		{
			$this->load->view('imagenes', array('error' => ' ' ));
		}
		function do_upload($usuarioID)
		{
			$config['upload_path'] = './cargas/mapas';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '1000';
			$config['max_width'] = '1024';
			$config['max_height'] = '768';
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload($usuarioID))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('imagenes', $error);
			}
			else
			{
				$datos = array('fotoCasa'=> $this->input->post('fotoCasa'));
				$this->db->where('usuarioID', $usuarioID);
				$this->db->update('usuarios',$datos);
				$data = array('upload_data' => $this->upload->data());
				$this->load->view('imagenes_exito', $data);
			}
		}
	}
