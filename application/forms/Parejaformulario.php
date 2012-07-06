<?php

class Application_Form_Parejaformulario extends Zend_Form
{
    public function init()
    {
        $this->setName('Pareja'); 
        
        $jugadoruno = $this->createElement('select', 'jugadoruno');
        $jugadoruno->setLabel("Jugador uno:")->setRequired(true);
        $datos = Application_Model_Jugador::all();
        foreach($datos as $c)
        {
            $jugadoruno->addMultiOption($c->_id,$c->nombre);
        }
        
        $jugadordos = $this->createElement('select', 'jugadordos');
        $jugadordos->setLabel("Jugador dos:")->setRequired(true);
        $datos = Application_Model_Jugador::all();
        foreach($datos as $c)
        {
            $jugadordos->addMultiOption($c->_id,$c->nombre);
        }
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agrego los objetos creados al formulario
        $this->addElements(array($jugadoruno,$jugadordos,$submit));
    }
}

