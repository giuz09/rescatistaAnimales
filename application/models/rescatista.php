<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Rescatista extends Eloquent{
    protected $table = 'rescatistas';
    protected $primaryKey = 'idRescatista';
    public $timestamps = false;

    public static function login($dni='',$pass='')
    {
    	$valido=FALSE;
    	if($dni!='' && $pass!=''){
    		$rescatista=Rescatista::find($dni);
    		if ($rescatista!=NULL){
    			if($rescatista->pass==$pass){
    				$valido=$rescatista;
    			}
    		}
    	}
    	return $valido;
    }

    
}

//$cliente = Cliente ::find($user); devuelve un usuario de acuerdo al nombre de usuario en $user

?>