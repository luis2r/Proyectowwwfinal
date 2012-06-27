<?php

class Application_Model_Canchas extends Shanty_Mongo_Document
{
    protected static $_db = 'proyecto';
    protected static $_collection = 'canchas';
    protected static $_requirements = array(
        'codigo' => 'Required',
        'ubicacion' => 'Required',
        'fecha' => 'Required',
        'hora' => 'Required',
        'torneo' => 'Required',
);

}

