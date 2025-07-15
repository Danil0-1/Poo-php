<?php
// require_once "src/db.php";
require_once "models/Camper.php";
require_once "models/Person.php";
function ingresarAZonaFranca(Person $persona): void
{
    echo "Ingreso la persona : {$persona->getNombre()}";    
}
$persona = new Persona('Santiago Cruz', 56, '923848', 'CC'); 

$camper = new Camper('Santiago', '4321', 22);

$camper->setNombre('Un nombre nuevo !');

$camper->getNombre();

ingresarAZonaFranca($persona);
ingresarAZonaFranca($camper);

exit;