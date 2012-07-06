<?php

class Application_Form_ProgramarJugadorformulario extends Zend_Form
{

    public function init()
    {
        $this->setName('ProgramacionJugador'); 
        
        $jugador = $this->createElement('select', 'jugador');
        $jugador->setLabel("Jugador:")->setRequired(true);
        $datos = Application_Model_Jugador::all();
        foreach($datos as $c)
        {
            $jugador->addMultiOption($c->_id,$c->nombre);
        }
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        $this->addElements(array($jugador,$submit));
    }
}    
?>
