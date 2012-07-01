<?php

class Application_Model_Ronda extends Shanty_Mongo_Document
{
        protected static $_db = 'proyecto';
        protected static $_collection = 'ronda';
        protected static $_requirements = array('nombre','torneo','categoria');
}

