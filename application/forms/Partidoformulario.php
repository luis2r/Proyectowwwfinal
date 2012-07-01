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

        $juez = $this->createElement('select', 'juez');
        $juez->setLabel("Juez:")->setRequired(true);
        $datos = Application_Model_Juez::all();
        foreach($datos as $c)
        {
            $juez->addMultiOption($c->_id,$c->nombre);
        }
        
        $torneo = $this->createElement('select', 'torneo');
        $torneo->setLabel("Torneo:")->setRequired(true);
        $datos = Application_Model_Torneo::all();
        foreach($datos as $c)
        {
            $torneo->addMultiOption($c->_id,$c->nombre);
        }
        
        $puntosjugadoruno1 = new Zend_Form_Element_Text('puntosjugadoruno1');
        $puntosjugadoruno1->setLabel('Game 1 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos1 = new Zend_Form_Element_Text('puntosjugadordos1');
        $puntosjugadordos1->setLabel('Game 1 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno2 = new Zend_Form_Element_Text('puntosjugadoruno2');
        $puntosjugadoruno2->setLabel('Game 2 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos2 = new Zend_Form_Element_Text('puntosjugadordos2');
        $puntosjugadordos2->setLabel('Game 2 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno3 = new Zend_Form_Element_Text('puntosjugadoruno3');
        $puntosjugadoruno3->setLabel('Game 3 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos3 = new Zend_Form_Element_Text('puntosjugadordos3');
        $puntosjugadordos3->setLabel('Game 3 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno4 = new Zend_Form_Element_Text('puntosjugadoruno4');
        $puntosjugadoruno4->setLabel('Game 4 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos4 = new Zend_Form_Element_Text('puntosjugadordos4');
        $puntosjugadordos4->setLabel('Game 4 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno5 = new Zend_Form_Element_Text('puntosjugadoruno5');
        $puntosjugadoruno5->setLabel('Game 5 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos5 = new Zend_Form_Element_Text('puntosjugadordos5');
        $puntosjugadordos5->setLabel('Game 5 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno6 = new Zend_Form_Element_Text('puntosjugadoruno6');
        $puntosjugadoruno6->setLabel('Game 6 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos6 = new Zend_Form_Element_Text('puntosjugadordos6');
        $puntosjugadordos6->setLabel('Game 6 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno7 = new Zend_Form_Element_Text('puntosjugadoruno7');
        $puntosjugadoruno7->setLabel('Game 7 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos7 = new Zend_Form_Element_Text('puntosjugadordos7');
        $puntosjugadordos7->setLabel('Game 7 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno8 = new Zend_Form_Element_Text('puntosjugadoruno8');
        $puntosjugadoruno8->setLabel('Game 8 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadordos8 = new Zend_Form_Element_Text('puntosjugadordos8');
        $puntosjugadordos8->setLabel('Game 8 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
             
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agrego los objetos creados al formulario
        $this->addElements(array($jugadoruno,$jugadordos,$juez,$torneo,
            $puntosjugadoruno1,$puntosjugadordos1,
            $puntosjugadoruno2,$puntosjugadordos2,
            $puntosjugadoruno3,$puntosjugadordos3,
            $puntosjugadoruno4,$puntosjugadordos4,
            $puntosjugadoruno5,$puntosjugadordos5,
            $puntosjugadoruno6,$puntosjugadordos6,
            $puntosjugadoruno7,$puntosjugadordos7,
            $puntosjugadoruno8,$puntosjugadordos8,
            $submit));
    }

}

