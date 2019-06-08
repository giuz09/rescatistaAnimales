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
		
		if ($this->session->userdata('is_logued_in')) {
			$data['nombre'] = $this->session->userdata('nombre');
			$data['apellido'] = $this->session->userdata('apellido');
			$data['dni'] = $this->session->userdata('dni');
			$data['id'] = $this->session->userdata('id');
			$data['animales']=$this->animal->get();

			$this->load->view('header', $data);
			$this->load->view('animales/listaAnimales');
			$this->load->view('footer');
			$this->load->view('animales/detalles_modal');
		}else{
			redirect(base_url().'index.php/login');
		}
	}

	public function nuevo()
	{
		if ($this->session->userdata('is_logued_in')) {
			$data['nombre'] = $this->session->userdata('nombre');
			$data['apellido'] = $this->session->userdata('apellido');
			$data['dni'] = $this->session->userdata('dni');
			$data['id'] = $this->session->userdata('id');
			
			if($this->input->post('nombre')){
				$animal=array(
					'nombre' => $this->input->post('nombre'),
					'especie' => $this->input->post('especie'),
					'raza' => $this->input->post('raza'),
					'sexo' => $this->input->post('sexo'),
					'descripcion' => $this->input->post('descripcion'),
					'fechaNacimiento' => $this->input->post('fechaNacimiento')
				);
				//GUARDAR FOTO
				if (!empty($_FILES['foto']['name'])) {
                    $config['upload_path'] = 'uploads';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('foto')){
                        $fileData = $this->upload->data();
                        $animal['foto'] = $fileData['file_name'];
                        $error['error']=FALSE;
                    }else{
                    	$error['error']=TRUE;
                        $error['foto']="No se pudo cargar la foto ".$_FILES['foto']['name'].". Errores:".$this->upload->display_errors();
                    }
               }else{
               		$error['error']=TRUE;
                    $error['foto']="No se cargó la foto";
               }
               //TERMINA GUARDAR FOTO
               if (!$error['error']) {
               		$nuevo=new Animal();
               		$nuevo->nombre=$animal['nombre'];
               		$nuevo->especie=$animal['especie'];
               		$nuevo->raza=$animal['raza'];
               		$nuevo->descripcion=$animal['descripcion'];
               		$nuevo->sexo=$animal['sexo'];
               		$nuevo->fechaNacimiento=$animal['fechaNacimiento'];
               		$nuevo->foto=$animal['foto'];
               		$nuevo->fechaRegistro=date("Y-m-d H:i:s");
               		$nuevo->estado=1;
               		$nuevo->idDueño=$data['id'];
               		$nuevo->save();
               		redirect(base_url()."index.php/Animales");
               }else{
               		$data['error']=$error;
               }

			}else{
				$data['error']['error']=FALSE;
				$animal=array(
					'nombre' => NULL, 
					'especie' => NULL,
					'raza' => NULL,
					'descripcion' => NULL,
					'fechaNacimiento' => NULL,
					'foto' => NULL,
					'sexo' => NULL
				);
			}
			$data['animal']=$animal;
			$this->load->view('header', $data);
			$this->load->view('animales/nuevoAnimal',$data);
			$this->load->view('footer');
		}else{
			redirect(base_url().'index.php/login');
		}
	}

	public function darBaja($idAnimal)
	{
		if ($this->session->userdata('is_logued_in')) {
			$animal=Animal::find($idAnimal);
			$animal->estado=0;
			$animal->update();
			redirect(base_url().'index.php/Animales');
		}else{
			redirect(base_url().'index.php/login');
		}
	}

	public function getAnimal($idAnimal)
	{
		$animal=Animal::find($idAnimal);
		if ($animal!=NULL) {
			$response=json_encode($animal);
		}else{
			$response=NULL;
		}
		echo $response;
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