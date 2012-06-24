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
        
        //creamos <input text> para escribir la categoria del jugador
        $categoria = new Zend_Form_Element_Text('categoria');
        $categoria->setLabel('Categoria:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //creamos <input text> para escribir la modalidad del jugador
        $modalidad = new Zend_Form_Element_Text('modalidad');
        $modalidad->setLabel('Modalidad:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //creamos <input text> para escribir el tipo del jugador
        $tipo = new Zend_Form_Element_Text('tipo');
        $tipo->setLabel('Tipo:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //boton para enviar formulario
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agrego los objetos creados al formulario
        $this->addElements(array($codigo,$nombre,$documento,$categoria,$modalidad,$tipo,$submit));
    }
}

