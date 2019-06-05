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

	function rescatistas_get()
	{
	    $result = []; 
	    $estado = $this->get('estado');   
	    $this->load->model('rescatista');
	    if ($estado!='') {
	    	$rescatistas=Rescatista::where('estado',$estado)->get();
	    }else{
	    	$rescatistas=Rescatista::all();
	    }
	    if ($rescatistas!=NULL)
	    {
	        $result['codigoRespuesta']= 0;
	        $result['mensajeRespuesta'] = 'Rescatistas encontrados';
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

	function listaAutos_get()
	{
	    $result = []; 
	    $estado = $this->get('estado');   
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


	function auto_post()
	{  
		$result= [];
	    $dniDuenio = $this->post('dni');
	    $patente = $this->post('patente');
	    $marca = $this->post('marca');
	    $modelo = $this->post('modelo');
	    $anio = $this->post('anio');
	    $tipo = $this->post('tipo');
	    $this->load->model('auto');
	    $resu = $this->auto->alta($patente, $marca, $modelo, $anio, $tipo, $dniDuenio);
	    if ($resu['valido']==1)
	    {
	        $result['codigoRespuesta']= 0;
	        $result['mensajeRespuesta'] = 'Se agrego el auto correctamente a '.$dniDuenio;
	        $result['errores']    = null;
	        $this->response($result, 201);
	    }
	    else
	    {
	        $result['codigoRespuesta']    = 1;
	        $result['mensajeRespuesta'] = 'Hubo un error';
	        $result['errores']   =  $resu;
	        $this->response($result, 400);
	    }
	}

}


?>