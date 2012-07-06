<?php

class Application_Model_Programarpareja extends Shanty_Mongo_Document
{
     protected static $_db = 'proyecto';
     protected static $_collection = 'torneopareja';
     protected static $_requirements = array('pareja','torneo');
}

