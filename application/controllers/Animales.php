<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Animales extends CI_Controller {

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
		

		//FORMA FACIL JAJA
		/**
		$this->load->library('grocery_CRUD');
		$this->load->database();
		$this->grocery_crud->set_table('animales');
		$output = $this->grocery_crud->render();
		$this->load->view('header');
		$this->load->view('example',$output);
		$this->load->view('footer');
		**/

		//FORMA DIFICIL Y ELEGANTE JAJA
		$data['animales']=$this->animal->get();
		$this->load->view('header');
		$this->load->view('animales/listaAnimales',$data);
		$this->load->view('footer');
	}

	public function agregarDocente($data = NULL)
	{
		switch ($this->session->userdata('tipoUsuario')) {
			case '':
				redirect(base_url().'login');
				break;
			case '1': //operario
				$data['nombre'] = $this->session->userdata('nombre');
				//$data['Rutaimg'] = "assets/img/avatar.jpg"; //$data['nombre'] = $this->session->userdata('imgRoute');
				$this->load->view('includes/header_view_operario',$data);
				$this->load->view('/agregar_docente');
				break;	
			case '2': //docente
				redirect(base_url().'welcome');
				break;
			case '3': //supervisor
				redirect(base_url().'welcome');
				break;
			default:		
				redirect(base_url().'login');
				break;		
		}
	}

	public function agregarCliente(){
		$resu=$this->usuario->alta
			(
				$this->input->post('dni'), 
				$this->input->post('nombreApellido'), 
				$this->input->post('email'), 
				$this->input->post('pass') 
			); 
		$data="";
		if ($resu["valido"]==0){ //datos invalidos
			$resu["valido"]='';
			foreach ($resu as $error) {
				$data=$data."<br> ".$error;
			}
		}else{ 					//datos validos
			$data='ok';
		}
		
		echo $data;
	}

	public function modificarDocente(){
		$resu=$this->usuario->modDocente
			(
				$this->input->post('txtNombre'), 
				$this->input->post('txtApellido'), 
				$this->input->post('txtTelefono'), 
				$this->input->post('txtEmail'), 
				$this->input->post('nmbDni')
			); 
	}
	public function bajaDocente()
	{
		$reserva=$this->usuario->where('dni',$this->input->post('dni'))->update(array('estado'=>'0'));
	}
	public function reactivarDocente()
	{
		$reserva=$this->usuario->where('dni',$this->input->post('dni'))->update(array('estado'=>'1'));
	}

	public function getFilasClientes()
    {
        $clientes = new Cliente();
       	echo $clientes->getFilasClientesBD();
    }

    public function getByDni($dni=0){
    	echo $this->cliente->getNombreApellido($dni);
    }

    public function obtenerTablaClientes($value='')
    {
    	echo $this->cliente->getFilasClientesBD();
    }
    public function obtenerClientes($value='')
    {
    	echo $this->cliente->getListaClientesBD();
    }
}