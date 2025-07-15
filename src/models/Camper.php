<?php

include_once"Person.php";

class Camper extends Person {
    private  string $nombre;
    protected string $documento;

    public int $edad;

    public int $nivelIngles = 0;

/**
 * Logica para crear un Camper
 * @param nombre Define el nombre del Camper sin
 * la logica de la validacion de 20 caracteres
 * @param documento Documento del camper
 * @param edad Edad del camper representado en
 * valores enteros
 */

    public function __construct(string $nombre, string $documento, int $edad, string $tipoDocumento, int $skillIngles = 0, int $skillProgramacion) {
    $this->documento = $documento;
    $this->setEdad($edad);
    $this->setNombre($nombre);
    $this->nivelIngles = $nivel;
    echo "Hola desde el constructor <br>";
}

    public function marcarAsistencia() {}

    public function esMayorDeEdad(): bool
    {
        return $this->getEdad() >= 18;
    }

    public function setNombre(string $nombre): void
    {
        if (strlen($nombre) <= 20) {
            $this->nombre = $nombre;    
        } else {
            echo 'Error al asignar el nombre al Camper<br>';
            $this->nombre = 'NN';
        }
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }


    public function getDocumento(): string
    {
        return "{$this->tipoDocumento} | {$this->documento}";
    }

    public function informacion(): array
    {
        return [
            'nombre' => $this->nombre ?? 'NN',
            'edad' => $this->edad ?? 0,
            'documento' => $this->documento ?? 'NN',
            'tipoDocumento' => $this->tipoDocumento
        ];
    }
}