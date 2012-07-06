<?php

class Application_Form_ProgramarJuezformulario extends Zend_Form
{

    public function init()
    {
        $this->setName('ProgramacionJuez'); 
        
        $juez = $this->createElement('select', 'juez');
        $juez->setLabel("Juez:")->setRequired(true);
        $datos = Application_Model_Juez::all();
        foreach($datos as $c)
        {
            $juez->addMultiOption($c->_id,$c->nombre);
        }
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        $this->addElements(array($juez,$submit));
    }
}

