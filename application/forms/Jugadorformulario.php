<?php

class Application_Form_Jugadorformulario extends Zend_Form
{
    public function init()
    {
        $this->setName('jugador');
        
        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter($id);
        
        //creamos <input text> para escribir nombre del jugador
        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre del jugador:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //creamos <input text> para escribir la cedula del jugador
        $documento = new Zend_Form_Element_Text('documento');
        $documento->setLabel('Documento del jugador:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //creamos <input text> para escribir la categoria del jugador
        $categoria = new Zend_Form_Element_Text('categoria');
        $categoria->setLabel('Categoria del jugador:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //creamos <input text> para escribir la modalidad del jugador
        $modalidad = new Zend_Form_Element_Text('modalidad');
        $modalidad->setLabel('Modalidad del jugador:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //creamos <input text> para escribir el tipo del jugador
        $tipo = new Zend_Form_Element_Text('tipo');
        $tipo->setLabel('Tipo del jugador:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //boton para enviar formulario
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agrego los objetos creados al formulario
        $this->addElements(array($id,$nombre,$documento,$categoria,$modalidad,$tipo,submit));
    }
}

