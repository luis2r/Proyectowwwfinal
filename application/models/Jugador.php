<?php

class Application_Model_Jugador extends Shanty_Mongo_Document
{
        protected static $_db = 'proyecto';
        protected static $_collection = 'jugador';
        protected static $_requirements = array('nombre','documento','modalidad','tipo','categoria','ranking');
}
?>

