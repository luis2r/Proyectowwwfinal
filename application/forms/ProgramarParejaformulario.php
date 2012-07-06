<?php

class Application_Form_ProgramarParejaformulario extends Zend_Form
{
    public function init()
    {
        $this->setName('ProgramacionPareja'); 
        
        $pareja = $this->createElement('select', 'pareja');
        $pareja->setLabel("Pareja:")->setRequired(true);
        $datos = Application_Model_Pareja::all();        
        foreach($datos as $c)
        {
            $dato1 = Application_Model_Jugador::find($c->jugadoruno);
            $dato2 = Application_Model_Jugador::find($c->jugadordos);
            $pareja->addMultiOption($c->_id,$dato1->nombre.' - '.$dato2->nombre);
        }
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        $this->addElements(array($pareja,$submit));
    }
}

