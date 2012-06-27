<?php

class Application_Form_Rondaformulario extends Zend_Form
{
    public function init()
    {
        $this->setName('Ronda');
        
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
        
        //creamos select para seleccionar torneo
        $torneo = $this->createElement('select', 'torneo');
        $torneo->setLabel("Torneo:")->setRequired(true);
        $datos = Application_Model_Torneo::all();
        foreach($datos as $c)
        {
            $torneo->addMultiOption($c->_id,$c->nombre);
        }
                        
        //creamos select para seleccionar torneo
        $categoria = $this->createElement('select', 'categoria');
        $categoria->setLabel("Categoria:")->setRequired(true);
        $datos = Application_Model_Categoria::all();
        foreach($datos as $c)
        {
            $categoria->addMultiOption($c->_id,$c->nombre);
        }       
       
        //boton para enviar formulario
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agrego los objetos creados al formulario
        $this->addElements(array($codigo,$nombre,$torneo,$categoria,$submit));    
    }
}

