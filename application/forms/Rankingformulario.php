<?php

class Application_Form_Rankingformulario extends Zend_Form
{

    public function init()
    {
        $this->setName('Ranking');        
        
        //creamos <input text> para escribir nombre del jugador
        $posicion = new Zend_Form_Element_Text('posicion');
        
        $posicion->setLabel('Posicion:')->setRequired(true)->
        addFilter('StripTags')->addFilter('StringTrim')-> addValidator('NotEmpty');
        
        //creamos select para seleccionar torneo
        $jugador = $this->createElement('select', 'jugador');
        $jugador->setLabel("Jugador:")->setRequired(true);
       
        $datos = Application_Model_Jugador::all();
        
        foreach($datos as $c)
        {
            $jugador->addMultiOption($c->_id,$c->nombre);
        }       
       
        //creamos <input text> para escribir nombre del jugador
        $categoriajugador = new Zend_Form_Element_Text('categoriajugador');
        $categoriajugador->setLabel('Categoria del jugador:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');

        //boton para enviar formulario
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agrego los objetos creados al formulario
        $this->addElements(array($posicion,$jugador,$categoriajugador,$submit));
    }
}

