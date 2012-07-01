<?php

class Application_Model_Partido extends Shanty_Mongo_Document
{
    protected static $_db = 'proyecto';
        protected static $_collection = 'partido';
        protected static $_requirements = array('jugadoruno','jugadordos','puntosjugadoruno','puntosjugadordos','torneo');
}

