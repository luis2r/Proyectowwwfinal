<?php

class Application_Form_Grupoformulario extends Zend_Form
{

    public function init()
    {
        $this->setName('Grupo');       
        
        //creamos <input text> para escribir nombre del jugador
        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //creamos <input text> para escribir la cedula del jugador
        $numintegrantes= new Zend_Form_Element_Text('numintegrantes');
        $numintegrantes->setLabel('No de Integrantes:')->setRequired(true)->
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
        $ronda = $this->createElement('select', 'ronda');
        $ronda->setLabel("Ronda:")->setRequired(true);
        $datos = Application_Model_Ronda::all();
        foreach($datos as $c)
        {
            $ronda->addMultiOption($c->_id,$c->nombre);
        }
        
        //creamos select para seleccionar torneo
        $cancha = $this->createElement('select', 'cancha');
        $cancha->setLabel("Cancha:")->setRequired(true);
        $datos = Application_Model_Canchas::all();
        foreach($datos as $c)
        {
            $cancha->addMultiOption($c->_id,$c->ubicacion);
        }
        
        //boton para enviar formulario
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agrego los objetos creados al formulario
        $this->addElements(array($nombre,$numintegrantes,$torneo,$ronda,$cancha,$submit));
    }


}

