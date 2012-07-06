<?php

class Application_Form_ProgramarCanchaformulario extends Zend_Form
{
    public function init()
    {
        $this->setName('ProgramacionCancha'); 
        
        $cancha = $this->createElement('select', 'cancha');
        $cancha->setLabel("Cancha:")->setRequired(true);
        $datos = Application_Model_Canchas::all();
        foreach($datos as $c)
        {
            $cancha->addMultiOption($c->_id,$c->nombre);
        }
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        $this->addElements(array($cancha,$submit));
    }
}

