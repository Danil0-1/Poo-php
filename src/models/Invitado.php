<?php

include_once("Persona.php");

class Invitado extends Person
{

    private string $nombreEmpleado;
    private string $nombreAutorizado;

    public function __construct(
        int $id,
        string $nombre,
        int $edad,
        string $documento,
        string $tipo,
        string $nombreInvito,
        string $nombreAutorizo,
    ) {
        parent::__construct($id, $nombre, $edad, $documento, $tipo);
        $this->nombreInvitado = $nombreInvito;
        $this->nombreAutorizo = $nombreAutorizo;
    }


    public function esMayor() : bool 
    {
        return $this->getEdad() >=18;    
    }

    public function getNombreDeQuienAutorizo() : string 
    {
        return $this->nombreAutrizo;
    }
    public function getNombreDeQuienInvito() : string 
    {
        return $this->nombreInvito;
    }
}