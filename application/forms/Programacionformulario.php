<?php

class Application_Form_Programacionformulario extends Zend_Form
{

    public function init()
    {
        $this->setName('Programacion'); 
        
        $grupo = $this->createElement('select', 'grupo');
        $grupo->setLabel("Grupo:")->setRequired(true);
        $datos = Application_Model_Grupo::all();
        foreach($datos as $c)
        {
            $grupo->addMultiOption($c->_id,$c->nombre);
        }
        
        $cancha = $this->createElement('select', 'cancha');
        $cancha->setLabel("Cancha:")->setRequired(true);
        $datos = Application_Model_Canchas::all();
        foreach($datos as $c)
        {
            $cancha->addMultiOption($c->_id,$c->nombre);
        }
        
        $fecha = new Zend_Form_Element_Text('fecha');
        $fecha->setLabel('Fecha:')->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $hora = new Zend_Form_Element_Text('hora');
        $hora->setLabel('Hora:')->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        $this->addElements(array($grupo,$cancha,$fecha,$hora,$submit));
    }
}

