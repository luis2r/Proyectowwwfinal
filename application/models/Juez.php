<?php
class Application_Model_Juez extends Shanty_Mongo_Document
{
    protected static $_db = 'proyecto';
    protected static $_collection = 'juez';
    protected static $_requirements = array('nombre','documentoidentidad','experiencia');
}