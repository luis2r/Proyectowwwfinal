<?php

class Application_Model_Jugador extends Shanty_Mongo_Document
{
    protected static $_db = 'proyecto';
    protected static $_collection = 'www';
    protected static $_requirements = array(
        'codigo' => 'Required',
        'nombre' => 'Required',
        'documento' => 'Required',
        'categoria' => 'Required',
        'modalidad' => 'Required',
        'tipo' => 'Required',
);

}

