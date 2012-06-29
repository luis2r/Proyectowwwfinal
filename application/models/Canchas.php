<?php

class Application_Model_Canchas extends Shanty_Mongo_Document
{
    protected static $_db = 'proyecto';
    protected static $_collection = 'cancha';
    protected static $_requirements = array(       
        'ubicacion' => 'Required',
        'fecha' => 'Required',
        'hora' => 'Required',
        'torneo' => 'Required',
);

}

