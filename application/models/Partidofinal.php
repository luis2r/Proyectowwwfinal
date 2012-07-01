<?php

class Application_Model_Partidofinal extends Shanty_Mongo_Document
{
    protected static $_db = 'proyecto';
        protected static $_collection = 'partidofinal';
        protected static $_requirements = array('jugadoruno','jugadordos','juez',
            'puntosjugadoruno1set1','puntosjugadordos1set1',
            'puntosjugadoruno2set1','puntosjugadordos2set1',
            'puntosjugadoruno3set1','puntosjugadordos3set1',
            'puntosjugadoruno4set1','puntosjugadordos4set1',
            'puntosjugadoruno5set1','puntosjugadordos5set1',
            'puntosjugadoruno6set1','puntosjugadordos6set1',
            'puntosjugadoruno1set2','puntosjugadordos1set2',
            'puntosjugadoruno2set2','puntosjugadordos2set2',
            'puntosjugadoruno3set2','puntosjugadordos3set2',
            'puntosjugadoruno4set2','puntosjugadordos4set2',
            'puntosjugadoruno5set2','puntosjugadordos5set2',
            'puntosjugadoruno6set2','puntosjugadordos6set2',
            'puntosjugadoruno1set3','puntosjugadordos1set3',
            'puntosjugadoruno2set3','puntosjugadordos2set3',
            'puntosjugadoruno3set3','puntosjugadordos3set3',
            'puntosjugadoruno4set3','puntosjugadordos4set3',
            'puntosjugadoruno5set3','puntosjugadordos5set3',
            'puntosjugadoruno6set3','puntosjugadordos6set3',
            'torneo');
}

