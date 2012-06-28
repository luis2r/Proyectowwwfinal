<?php

class Application_Form_Partidoformulario extends Zend_Form
{

    public function init()
    {
        $this->setName('Partido'); 
        
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
        
        $puntosjugadoruno= new Zend_Form_Element_Text('puntosjugadoruno');
        $puntosjugadoruno->setLabel('Puntos jugador uno:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos = new Zend_Form_Element_Text('puntosjugadordos');
        $puntosjugadordos->setLabel('Puntos jugador dos:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');     
        
        $torneo = $this->createElement('select', 'torneo');
        $torneo->setLabel("Torneo:")->setRequired(true);
        $datos = Application_Model_Torneo::all();
        foreach($datos as $c)
        {
            $torneo->addMultiOption($c->_id,$c->nombre);
        }
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agrego los objetos creados al formulario
        $this->addElements(array($jugadoruno,$jugadordos,$puntosjugadoruno,$puntosjugadordos,$torneo,$submit));
    }

}

