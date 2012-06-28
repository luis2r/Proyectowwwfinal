<?php

class Application_Model_Grupo extends Shanty_Mongo_Document
{
        protected static $_db = 'proyecto';
        protected static $_collection = 'grupo';
        protected static $_requirements = array(
            'nombre' => 'Required',
            'numintregrantes' => 'Required',
            'torneo' => 'Required',
            'ronda' => 'cancha',
   );
}

