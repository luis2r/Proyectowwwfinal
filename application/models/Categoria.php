<?php

class Application_Model_Categoria extends Shanty_Mongo_Document
{
    protected static $_db = 'proyecto';
    protected static $_collection = 'categoria';
    protected static $_requirements = array(
        'nombre' => 'Required',
        'valorinscripcion' => 'Required',
        'torneo' => 'Required',
);
}
?>
