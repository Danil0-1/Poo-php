<?php

include_once("Persona.php");

include_once("Asistencia.php");

class Empleado extends Persona implements Asistencia
{
    private string $cargo;
    private int $sueldo; // $$
    
    public function __construct(
    int $id,
    string $nombre,
    int $edad,
    string $documento,
    string $tipo,
    string $cargo,
    string $sueldo,
    ){parent::__construct($id, $nombre, $edad, $documento, $tipo);
    
    $this->sueldo = $sueldo;
    $this->cargo = $cargo;
    
    }
    
    public function MarcarIngreso(string $metodo): string{
        return "{$this->nombre} marco el ingreso con {$metodo} ";
    }

    public function MarcarSalida(string $metodo): string{
            return "{$this->nombre} marco Salida con {$metodo} ";
    }

    public function esMayor() : bool 
    {
        return $this->edad >=18;
    }

    public function getSueldo() : int 
    {
        return $this->sueldo;    
    }

    public function getCargo() : int 
    {
        return $this->cargo;    
    }
}