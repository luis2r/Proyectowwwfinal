<?php

class Application_Form_Jugadorformulario extends Zend_Form
{
    public function init()
    {
        $this->setName('Jugador');
        
        //creamos <input text> para escribir nombre album
        $codigo = new Zend_Form_Element_Text('codigo');
        $codigo->setLabel('Codigo:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        //creamos <input text> para escribir nombre del jugador
        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //creamos <input text> para escribir la cedula del jugador
        $documento = new Zend_Form_Element_Text('documento');
        $documento->setLabel('Documento No:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
                        
        //creamos <input text> para escribir la modalidad del jugador
        $modalidad = new Zend_Form_Element_Text('modalidad');
        $modalidad->setLabel('Modalidad:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
//        //creamos <input text> para escribir el torneo del jugador
//        $torneo = new Zend_Form_Element_Text('torneo');
//        $torneo->setLabel('Torneo:')->setRequired(true)->
//                addFilter('StripTags')->addFilter('StringTrim')->
//                addValidator('NotEmpty');
        
        //creamos select para seleccionar artista
        $torneo = new Zend_Form_Element_Select('codigo');
        $torneo->setLabel('Torneo:')->setRequired(true);
        //cargo en un select los tipos de usuario
        $collection = new Application_Model_Torneo();
        //obtengo listado de todos los artistas y los recorro en un
        //arreglo para agregarlos a la lista
        foreach ($collection->_getMongoCollection() as $c)
        {
            $torneo->addMultiOption($c->nombre);
        }
        
        //creamos <input text> para escribir el tipo del jugador
        $tipo = new Zend_Form_Element_Text('tipo');
        $tipo->setLabel('Tipo:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //creamos <input text> para escribir la categoria del jugador
        $categoria = new Zend_Form_Element_Text('categoria');
        $categoria->setLabel('Categoria:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //creamos <input text> para escribir el ranking del jugador
        $ranking = new Zend_Form_Element_Text('ranking');
        $ranking->setLabel('Ranking:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //creamos <input text> para escribir el grupo del jugador
        $grupo = new Zend_Form_Element_Text('grupo');
        $grupo->setLabel('Grupo:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //creamos <input text> para escribir pareja del jugador
        $pareja = new Zend_Form_Element_Text('pareja');
        $pareja->setLabel('Pareja:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //boton para enviar formulario
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agrego los objetos creados al formulario
        $this->addElements(array($codigo,$nombre,$documento,$modalidad,$torneo,$tipo,$categoria,$ranking,$grupo,$pareja,$submit));
    }
}

