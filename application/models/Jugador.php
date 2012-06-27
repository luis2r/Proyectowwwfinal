<?php

class Application_Model_Jugador extends Shanty_Mongo_Document
{
        protected static $_db = 'proyecto';
        protected static $_collection = 'jugador';
        protected static $_requirements = array(
            'codigo' => 'Required',
            'nombre' => 'Required',
            'documento' => 'Required',
            'modalidad' => 'Required',
            'torneo' => 'Required',
            'tipo' => 'Required',
            'categoria' => 'Required',
            'ranking' => 'Required',
            'grupo' => 'Required',
            'pareja' => 'Required',
    );
}
?>

