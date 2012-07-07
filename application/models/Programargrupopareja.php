<?php

class Application_Model_Programargrupopareja extends Shanty_Mongo_Document
{
    protected static $_db = 'proyecto';
     protected static $_collection = 'torneogrupopareja';
     protected static $_requirements = array('nombre','pareja1','pareja2','pareja3','pareja4','torneo');
}

