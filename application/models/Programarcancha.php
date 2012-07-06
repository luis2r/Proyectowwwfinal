<?php

class Application_Model_Programarcancha extends Shanty_Mongo_Document
{
     protected static $_db = 'proyecto';
     protected static $_collection = 'torneocancha';
     protected static $_requirements = array('cancha','torneo');
}

