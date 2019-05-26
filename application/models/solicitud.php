<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Solicitud extends Eloquent{
    protected $table = 'solicitudes';
    protected $primaryKey = 'idSolicitud';
    public $timestamps = false;
}

//$solicitud = Solicitud ::find($idSolicitud); devuelve una Solicitud de acuerdo al id de la Solicitud

?>