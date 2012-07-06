<?php

class Application_Model_Programarjugador extends Shanty_Mongo_Document
{
     protected static $_db = 'proyecto';
     protected static $_collection = 'torneojugador';
     protected static $_requirements = array('jugador','torneo');
}


