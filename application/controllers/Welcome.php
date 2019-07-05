<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	/*
	public function pruebas()
	{
		$pass = $this->hash_crypt('mlozano');
		echo $pass;
	}

	private function hash_crypt($salt)
	{
		return '$M$Sy5$rd' . sha1($salt) . '$$u';
	}

	public function pass()
	{
		$uss = $this->encriptar();
		
		foreach ($uss as $p) {
			
			//echo $p->password . ' = ' . $data['password'] = '$M$Sy5$rd' . sha1($p->password) . '$$u<br>';

			$data['password'] = '$M$Sy5$rd' . sha1($p->password) . '$$u';
			
			$this->db->where('usuarioID', $p->usuarioID);
			$this->db->update('usuarios', $data);
			
		}

		echo 'Contraseñas encriptadas correctamente';
		
	}

	public function encriptar()
	{
		$this->db->select('usuarioID, password');
		$this->db->from('usuarios');
		//$this->db->where('nivel !=', 'sistemas' );
		$query = $this->db->get();

		return $query->result();
	}
	
	public function fechas($primera,$segunda)
	{
		$valoresPrimera = explode ("/", $primera);   
		$valoresSegunda = explode ("/", $segunda); 
		$diaPrimera    = $valoresPrimera[0];
		$mesPrimera  = $valoresPrimera[1];
		$anyoPrimera   = $valoresPrimera[2];
		$diaSegunda   = $valoresSegunda[0];
		$mesSegunda = $valoresSegunda[1];
		$anyoSegunda  = $valoresSegunda[2];
		$diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
		$diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);     
		if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
			// "La fecha ".$primera." no es válida";
			return 0;
		} elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)) {
			// "La fecha ".$segunda." no es válida";
			return 0;
		} else {
			return  $diasPrimeraJuliano - $diasSegundaJuliano;
		} 
	}

	public function comparar()
	{
		$primera = "20/02/2018";
		$segunda = "31/12/2017";
		$f = $this->fechas($primera, $segunda);
		echo $f;
	}

	public function times()
	{
		$now = new DateTime('now');
		$ahora = date_format($now, 'd/m/Y');
		echo $ahora;

		//$fecha_c = new DateTime('31/08/2017');

		//echo date_format($test, 'Y-m-d H:i:s'); // 2011-03-03 00:00:00
	}

	

	public function palabra()
	{

		$cadena = "Lozano Valdiviezo"; 
		$parte = explode(" ",$cadena); 
		echo strtolower($parte[0]); // esto muestra la primera palabra 
	}
	*/
}
