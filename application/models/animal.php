<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Animal extends Eloquent{
    protected $table = 'animales';
    protected $primaryKey = 'idAnimal';
    public $timestamps = false;
}

//$animal = Animal ::find($idAnimal); devuelve un animal de acuerdo al id de animal

?>