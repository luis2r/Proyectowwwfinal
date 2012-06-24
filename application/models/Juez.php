<?php

class Application_Model_Juez extends Shanty_Mongo_Document
{
 protected static $_db = 'proyecto';
protected static $_collection = 'www';
protected static $_requirements = array(
'codigo' => 'Required',
'nombre' => 'Required',
'documentoidentidad' => 'Required',
'experiencia' => 'Required',
'codigotorneo' => 'Required',    
);


}

