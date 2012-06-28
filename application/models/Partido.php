<?php

class Application_Model_Partido
{
    protected static $_db = 'proyecto';
        protected static $_collection = 'partido';
        protected static $_requirements = array(
            'codigo' => 'Required',
            'jugadoruno' => 'Required',
            'jugadordos' => 'Required',
            'puntosjugadoruno' => 'Required',
            'puntosjugadordos' => 'Required',           
            'torneo' => 'Required',
            
    );
}

