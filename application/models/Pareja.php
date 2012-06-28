<?php

class Application_Model_Pareja extends Shanty_Mongo_Document
{
        protected static $_db = 'proyecto';
        protected static $_collection = 'pareja';
        protected static $_requirements = array(
            'codigo' => 'Required',
            'nombre' => 'Required',            
    );
}

