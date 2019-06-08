<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('rescatista');
		$this->load->library(array('session','form_validation'));
		//$this->load->library('encrypt');
		$this->load->helper(array('url','form'));
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
	public function index($num=0)
	{
		if ($this->session->userdata('is_logued_in')) {
				redirect(base_url());
		}else{
				$data['token'] = $this->token();
				$data['error']= $num;
				$this->load->view('/login',$data);
		}
	}

	public function new_user()
	{
		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')){
				$dni = $this->input->post('dni');
				$pass = $this->input->post('pass');
				//$contrasena = sha1($this->input->post('contrasena'));
				$cliente=Rescatista::where('dni',$dni)->first();
				if ($cliente!=NULL) {
					if ($cliente->pass==$pass && $cliente->estado==2){
						$check_user=$cliente;
					}else{
						$check_user=FALSE;
					}
				}else{
					$check_user=FALSE;
				}
				//$check_user = Cliente::login_cliente($user,$pass);
				if($check_user != FALSE){
					$data = array(
	                'is_logued_in' 	=> 		TRUE,
	                'id'			=>		$check_user->idRescatista,
	                'dni' 			=> 		$dni,
	                'nombre' 		=> 		$check_user->nombre,
	                'apellido' 		=> 		$check_user->apellido
            		);		
					$this->session->set_userdata($data);
					$this->index();
				}else{
					redirect(base_url().'index.php/login/index/1');
				}
		}else{
			redirect(base_url().'index.php/login');
		}
	}

	private function token(){
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());

	}

	public function registro()
	{	
		switch ($this->session->userdata('tipoUsuario')) {
			case '':
				$error=false;
				$data=[];
				$data['dni']=$this->input->post('dni');
				$data['nombre']=$this->input->post('nombre');
				$data['apellido']=$this->input->post('apellido');
				$data['telefono']=$this->input->post('telefono');
				$data['direccion']=$this->input->post('direccion');
				$data['fechaNacimiento']=$this->input->post('fechaNacimiento');
				$data['email']=$this->input->post('email');
				$data['pass']=$this->input->post('pass');
				$data['estado']=1;
				
				if($data['dni']===NULL){
					$data['error']['dni']="";
					$this->load->view('registro',$data);
				}else{
					if(Rescatista::find($data['dni'])!==NULL){
						$data['error']['dni']="DNI ya esta registrado";
						$this->load->view('registro', $data);
					}else{
						$cliente=new Rescatista();
						$cliente->dni=$data['dni'];
						$cliente->nombre=$data['nombre'];
						$cliente->apellido=$data['apellido'];
						$cliente->direccion=$data['direccion'];
						$cliente->fechaNacimiento=$data['fechaNacimiento'];
						$cliente->telefono=$data['telefono'];
						$cliente->email=$data['email'];
						$cliente->pass=$data['pass'];
						$cliente->estado=$data['estado'];
						$cliente->save();
						redirect(base_url());
					}
				}
				break;
			default:
				redirect(base_url());
				break;
		}
		
		
	}
}
