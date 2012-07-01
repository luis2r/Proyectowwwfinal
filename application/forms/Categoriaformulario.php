<?php

class Application_Form_Categoriaformulario extends Zend_Form
{

    public function init()
    {
        $this->setName('Categoria');       
        
        //creamos <input text> para escribir nombre del jugador
        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //creamos <input text> para escribir la cedula del jugador
        $valorinscripcion = new Zend_Form_Element_Text('valorinscripcion');
        $valorinscripcion->setLabel('Valor de la Inscripcion:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
                
        //boton para enviar formulario
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agrego los objetos creados al formulario
        $this->addElements(array($nombre,$valorinscripcion,$submit));
    }


}

