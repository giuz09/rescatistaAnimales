<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gobierno extends CI_Controller {

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
		if ($this->session->userdata('dni')) {
			$data['nombre'] = $this->session->userdata('nombre');
			$data['dni'] = $this->session->userdata('user');
			$data['id'] = $this->session->userdata('id');
			$this->load->view('index', $data);
		}else{
			$this->load->view('welcome_message');
		}
	}

	public function obtenerCampañas($id)
	{
	    $this->load->library('rest', array(
	        'server' => 'http://localhost/restserver/index.php/example_api/',
	        'http_user' => 'admin',
	        'http_pass' => '1234',
	        'http_auth' => 'basic' // or 'digest'
	    ));
	     
	    $campañas = $this->rest->get('user', array('id' => $id), 'json');
	     
	    return $campañas;
	}


}