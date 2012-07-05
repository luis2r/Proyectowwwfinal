<?php

class Application_Model_Programacion extends Shanty_Mongo_Document
{
     protected static $_db = 'proyecto';
     protected static $_collection = 'programacion';
     protected static $_requirements = array('grupo','cancha','fecha','hora');
}

