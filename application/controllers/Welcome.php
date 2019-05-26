<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
    }
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
		switch ($this->session->userdata('tipoUsuario')) {
			case '':
				$data['nombre'] = "";
				$data['user'] = "";
				$data['tipoUsuario'] = '';
				$this->load->view('welcome_message', $data);
				break;
			case '1': //cliente
				$data['nombre'] = $this->session->userdata('nombre');
				$data['user'] = $this->session->userdata('user');
				$data['tipoUsuario'] = '1';
				$this->load->view('welcome_message', $data);
				break;	
			case '2': //administrador
				$data['nombre'] = $this->session->userdata('nombre');
				$data['user'] = $this->session->userdata('user');
				$data['tipoUsuario'] = '2';
				$this->load->view('welcome_message', $data);
				break;
			default:		
				$this->load->view('welcome_message');
				break;	
		}
	}
}
