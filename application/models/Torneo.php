<?php
class Application_Model_Torneo extends Shanty_Mongo_Document
{
    protected static $_db = 'proyecto';
    protected static $_collection = 'torneo';
    protected static $_requirements = array(
        'codigo' => 'Required',
        'nombre' => 'Required',
        'modalidad' => 'Required',
        'duracion' => 'Required',
        'fechainicio' => 'Required',
        'fechafin' => 'Required',
        'descripcion' => 'Required',
);
}
?>

