<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adoptantes extends CI_Controller {
	//192.168.1.2 adoptante
	//192.168.1.4 gobierno

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
		//file_get_contents();
		if ($this->session->userdata('is_logued_in')) {
			$data['nombre'] = $this->session->userdata('nombre');
			$data['apellido'] = $this->session->userdata('apellido');
			$data['dni'] = $this->session->userdata('dni');
			$data['id'] = $this->session->userdata('id');
			$this->load->view('index', $data);
		}else{
			redirect(base_url().'index.php/login');
		}
	}

	public function obtenerSolicitudes()
	{
	    /**
	    $this->load->library('rest', array(
	        'server' => 'http://localhost//restserver/index.php/example_api/',
	        'http_user' => 'admin',
	        'http_pass' => '1234',
	        'http_auth' => 'basic' // or 'digest'
	    ));
	    
	    $campañas = $this->rest->get('user', array('id' => $id), 'json');
	    file_get_contents();
	     
	    return $campañas;
	    **/
	    
	    /**$respuesta = curl_init();
	    curl_setopt($respuesta,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
	    curl_setopt($respuesta, CURLOPT_URL, "http://localhost/rescatistaAnimales/index.php/Rescatista_REST/animales");
	    curl_exec($respuesta);
	    curl_close($respuesta); **/

	    $response=
			'{"data":
				{
					"id_usuario":4,
					"id_animal":4,
					"id_adopcion":1,
					"estado":1,
					"detalle_adopcion":"Nada",
					"fecha_adopcion":"2017-03-10"
				}
			}';
		echo $response;
	}

	public function getAdoptante($idAdoptante)
	{
		/**
		$respuesta = curl_init();
	    curl_setopt($respuesta,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
	    curl_setopt($respuesta, CURLOPT_URL, "http://localhost/rescatistaAnimales/index.php/Rescatista_REST/getAdoptante/".$idAdoptante);
	    curl_exec($respuesta);
	    curl_close($respuesta);
	    **/
		$response=
			'{
				"idAdoptante":4,
				"nombre":"Ramiro",
				"apellido":"Muñoz",
				"dni":"29435343",
				"direccion":"Av. Tehuelches 342",
				"fechaNacimiento":"1990-03-10",
				"email":"ramuñoz@hotmail.com",
				"foto":"patio.jpg",
				"telefono":"2973434245"
			}';
		echo $response;
	}
}