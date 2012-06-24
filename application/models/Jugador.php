<?php

class Application_Model_Jugador
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

