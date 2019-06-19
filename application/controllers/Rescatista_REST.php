<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';



class Rescatista_rest extends REST_Controller{

	function rescatista_get()
	{
	    $result = [];    
	    $dni = $this->get('dni');
	    $this->load->model('rescatista');
	    $rescatista = Rescatista::where('dni',$dni)->first();
	    if ($rescatista!=NULL)
	    {
	        $result['codigoRespuesta']= 0;
	        $result['mensajeRespuesta'] = 'Rescatista encontrado';
	        $result['Rescatista']    = json_encode($rescatista);
	    }
	    else
	    {
	        $result['codigoRespuesta']    = 1;
	        $result['mensajeRespuesta'] = 'El rescatista no existe';
	        $result['Rescatista']   = null;
	    }
    	$this->response($result, 200);
	}

	//Operacion de modificacion de estado del rescatista
	//Requiere dos parametros:
	//	'dni' con el dni del rescatista a modificar
	//	'estado' con el nuevo estado del rescatista
	function rescatista_post()
	{
	    $result = [];    
	    $dni = $this->post('dni');		//Recupera los parametros
	    $estado = $this->post('estado');//Recupera los parametros
	    $this->load->model('rescatista');//Carga el modelo
		if ($estado==0 || $estado==2) {//Se puede dar baja o validar
			$rescatista = Rescatista::where('dni',$dni)->first();
			if ($rescatista!=NULL) {
				$rescatista->estado=$estado;//modifica el estado
				$rescatista->save();//lo guarda en la BD

				$result['codigoRespuesta']= 0;
	        	$result['mensajeRespuesta'] = 'Rescatista modificado';
			}else{
				$result['codigoRespuesta']    = 1;
	        	$result['mensajeRespuesta'] = 'No se encontró el rescatista';
			}
		}else{
			$result['codigoRespuesta']    = 2;
	        $result['mensajeRespuesta'] = 'Datos incorrectos';
		}
    	$this->response($result, 200);
	}

	function rescatistas_get($estado='')
	{
	    $result = [];   
	    $this->load->model('rescatista');
	    if ($estado!='') {
	    	$rescatistas=Rescatista::select('idRescatista','dni','nombre','apellido','email','direccion','fechaNacimiento','telefono','estado')->where('estado',$estado)->get();
	    }else{
	    	$rescatistas=Rescatista::select('idRescatista','dni','nombre','apellido','email','direccion','fechaNacimiento','telefono','estado')->all();
	    }
	    if ($rescatistas!=NULL)
	    {
	        $result['codigoRespuesta']= 0;
	        $result['mensajeRespuesta'] = 'Rescatistas encontrados'.$estado;
	        $result['listaRescatistas'] = $rescatistas;
	    }
	    else
	    {
	        $result['codigoRespuesta']    = 1;
	        $result['mensajeRespuesta'] = 'No se han encontrado rescatistas';
	        $result['listaRescatistas']   = null;
	    }
    	$this->response($result, 200);
	}

	function animales_get($estado='')
	{
	    $result = [];   
	    $this->load->model('animal');
	    if ($estado!='') {
	    	$animales=Animal::where('estado',$estado)->get();
	    }else{
	    	$animales=Animal::all();
	    }
	    if (!empty($animales))
	    {
	        $result['codigoRespuesta']= 0;
	        $result['mensajeRespuesta'] = 'Animales encontrados';
	        $result['listaAnimales']    = $animales;
	    }
	    else
	    {
	        $result['codigoRespuesta']    = 1;
	        $result['mensajeRespuesta'] = 'No se han encontrado animales';
	        $result['listaAnimales']   = null;
	    }
    	$this->response($result, 200);
	}

	//Operacion de modificacion de estado del rescatista
	//Requiere dos parametros:
	//	'dni' con el dni del rescatista a modificar
	//	'estado' con el nuevo estado del rescatista
	function estadistica_get()
	{
	    $this->load->model('estadistica');
	    $estadistica=Estadistica::get()->first();
    	$this->response($estadistica, 200);
	}

	function rescates_get(){
		$this->load->model('rescatista');
		$this->load->model('animal');
		$respuesta=array();
		$rescatistas=Rescatista::get();
		$i=0;
		foreach ($rescatistas as $rescatista) {
			$contador=Animal::where('idRescatista',$rescatista->idRescatista)->get()->count();
			$respuesta[$i]['nombre']=$rescatista->nombre." ".$rescatista->apellido;
			$respuesta[$i]['cantidad']=$contador;
			$i++;
		}
		$this->response($respuesta);
	}
}


?>