<?php

class Application_Model_Partido extends Shanty_Mongo_Document
{
    protected static $_db = 'proyecto';
        protected static $_collection = 'partido';
        protected static $_requirements = array('jugadoruno','jugadordos','juez',
            'puntosjugadoruno1','puntosjugadordos1',
            'puntosjugadoruno2','puntosjugadordos2',
            'puntosjugadoruno3','puntosjugadordos3',
            'puntosjugadoruno4','puntosjugadordos4',
            'puntosjugadoruno5','puntosjugadordos5',
            'puntosjugadoruno6','puntosjugadordos6',
            'puntosjugadoruno7','puntosjugadordos7',
            'puntosjugadoruno8','puntosjugadordos8',
            'torneo');
}

