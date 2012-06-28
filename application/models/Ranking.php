<?php

class Application_Model_Ranking extends Shanty_Mongo_Document 
{
    protected static $_db = 'proyecto';
    protected static $_collection = 'ranking';
    protected static $_requirements = array(
        'posicion' => 'Required',
        'jugador' => 'Required',
        'categoriajugador' => 'Required',        
    );
}
?>