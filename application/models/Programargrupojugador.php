<?php

class Application_Model_Programargrupojugador extends Shanty_Mongo_Document
{
     protected static $_db = 'proyecto';
     protected static $_collection = 'torneogrupojugador';
     protected static $_requirements = array('nombre','jugador1','jugador2','jugador3','jugador4','torneo');

}

