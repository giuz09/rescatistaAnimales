<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adopciones extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('animal');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');
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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($data = NULL)
	{
		//$data['nombre'] = $this->session->userdata('nombre');
		//$data['Rutaimg'] = "assets/img/avatar.jpg"; //$data['nombre'] = $this->session->userdata('imgRoute');

		//$data['adopciones']=$this->getAdopciones(); PEDIR ADOPCIONES AL SISTEMA DE ADOPTANTES
		if ($this->session->userdata('is_logued_in')) {
			$data['nombre'] = $this->session->userdata('nombre');
			$data['apellido'] = $this->session->userdata('apellido');
			$data['dni'] = $this->session->userdata('dni');
			$data['id'] = $this->session->userdata('id');
			$data['adopciones']=null;

			$this->load->view('header', $data);
			$this->load->view('adopciones/adopciones',$data);
			$this->load->view('footer');
		}else{
			redirect(base_url().'index.php/login');
		}
	}

	public function solicitudes($data = NULL)
	{
		//$data['nombre'] = $this->session->userdata('nombre');
		//$data['Rutaimg'] = "assets/img/avatar.jpg"; //$data['nombre'] = $this->session->userdata('imgRoute');

		//$data['solicitudes']=$this->getSolicitudes($idRescatista); PEDIR SOLICITUDES DE ADOPCION PARA ANIMALES DE ESTE RESCATISTA AL SISTEMA DE ADOPTANTES
		if ($this->session->userdata('is_logued_in')) {
			$data['nombre'] = $this->session->userdata('nombre');
			$data['apellido'] = $this->session->userdata('apellido');
			$data['dni'] = $this->session->userdata('dni');
			$data['id'] = $this->session->userdata('id');
			$this->load->view('header', $data);
			$this->load->view('adopciones/solicitudes',$data);
			$this->load->view('footer');
			$this->load->view('adopciones/perfil_modal');
			$this->load->view('animales/detalles_modal');
		}else{
			redirect(base_url().'index.php/login');
		}
	}

	public function getAdoptante($idAdoptante)
	{
		$adoptante=Adoptante::find($idAdoptante);
		if ($adoptante!=NULL) {
			$response=json_encode($idAdoptante);
		}else{
			$response=NULL;
		}
		echo $response;
	}

}