<?php

class Application_Model_Programarjuez extends Shanty_Mongo_Document
{
     protected static $_db = 'proyecto';
     protected static $_collection = 'torneojuez';
     protected static $_requirements = array('juez','torneo');
}