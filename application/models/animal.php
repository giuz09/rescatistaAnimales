<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Animal extends Eloquent{
    protected $table = 'animales';
    protected $primaryKey = 'idAnimal';
    public $timestamps = false;

    public function obtenerAnimales($estado='')
    {
    	if ($estado=='') {
    		$animales=Animal::all();
    	}else{
    		$animales=Animal::where("estado","=",$estado)->find(10);
    	}
    }
}

//$animal = Animal ::find($idAnimal); devuelve un animal de acuerdo al id de animal

?>