<?php

class Application_Form_Partidofinalformulario extends Zend_Form
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
        
        //Set 1
        $puntosjugadoruno1set1 = new Zend_Form_Element_Text('puntosjugadoruno1set1');
        $puntosjugadoruno1set1->setLabel('Set 1 - Game 1 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');  
        
        $puntosjugadordos1set1 = new Zend_Form_Element_Text('puntosjugadordos1set1');
        $puntosjugadordos1set1->setLabel('Set 1 - Game 1 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno2set1 = new Zend_Form_Element_Text('puntosjugadoruno2set1');
        $puntosjugadoruno2set1->setLabel('Set 1 - Game 2 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos2set1 = new Zend_Form_Element_Text('puntosjugadordos2set1');
        $puntosjugadordos2set1->setLabel('Set 1 - Game 2 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno3set1 = new Zend_Form_Element_Text('puntosjugadoruno3set1');
        $puntosjugadoruno3set1->setLabel('Set 1 - Game 3 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos3set1 = new Zend_Form_Element_Text('puntosjugadordos3set1');
        $puntosjugadordos3set1->setLabel('Set 1 - Game 3 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno4set1 = new Zend_Form_Element_Text('puntosjugadoruno4set1');
        $puntosjugadoruno4set1->setLabel('Set 1 - Game 4 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos4set1 = new Zend_Form_Element_Text('puntosjugadordos4set1');
        $puntosjugadordos4set1->setLabel('Set 1 - Game 4 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno5set1 = new Zend_Form_Element_Text('puntosjugadoruno5set1');
        $puntosjugadoruno5set1->setLabel('Set 1 - Game 5 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos5set1 = new Zend_Form_Element_Text('puntosjugadordos5set1');
        $puntosjugadordos5set1->setLabel('Set 1 - Game 5 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno6set1 = new Zend_Form_Element_Text('puntosjugadoruno6set1');
        $puntosjugadoruno6set1->setLabel('Set 1 - Game 6 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos6set1 = new Zend_Form_Element_Text('puntosjugadordos6set1');
        $puntosjugadordos6set1->setLabel('Set 1 - Game 6 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
                
        
        
        //Set 2
        $puntosjugadoruno1set2 = new Zend_Form_Element_Text('puntosjugadoruno1set2');
        $puntosjugadoruno1set2->setLabel('Set 2 - Game 1 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');  
        
        $puntosjugadordos1set2 = new Zend_Form_Element_Text('puntosjugadordos1set2');
        $puntosjugadordos1set2->setLabel('Set 2 - Game 1 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno2set2 = new Zend_Form_Element_Text('puntosjugadoruno2set2');
        $puntosjugadoruno2set2->setLabel('Set 2 - Game 2 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos2set2 = new Zend_Form_Element_Text('puntosjugadordos2set2');
        $puntosjugadordos2set2->setLabel('Set 2 - Game 2 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno3set2 = new Zend_Form_Element_Text('puntosjugadoruno3set2');
        $puntosjugadoruno3set2->setLabel('Set 2 - Game 3 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos3set2 = new Zend_Form_Element_Text('puntosjugadordos3set2');
        $puntosjugadordos3set2->setLabel('Set 2 - Game 3 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno4set2 = new Zend_Form_Element_Text('puntosjugadoruno4set2');
        $puntosjugadoruno4set2->setLabel('Set 2 - Game 4 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos4set2 = new Zend_Form_Element_Text('puntosjugadordos4set2');
        $puntosjugadordos4set2->setLabel('Set 2 - Game 4 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno5set2 = new Zend_Form_Element_Text('puntosjugadoruno5set2');
        $puntosjugadoruno5set2->setLabel('Set 2 - Game 5 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos5set2 = new Zend_Form_Element_Text('puntosjugadordos5set2');
        $puntosjugadordos5set2->setLabel('Set 2 - Game 5 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno6set2 = new Zend_Form_Element_Text('puntosjugadoruno6set2');
        $puntosjugadoruno6set2->setLabel('Set 2 - Game 6 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos6set2 = new Zend_Form_Element_Text('puntosjugadordos6set2');
        $puntosjugadordos6set2->setLabel('Set 2 - Game 6 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        
        //Set 3
        $puntosjugadoruno1set3 = new Zend_Form_Element_Text('puntosjugadoruno1set3');
        $puntosjugadoruno1set3->setLabel('Set 3 - Game 1 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');  
        
        $puntosjugadordos1set3 = new Zend_Form_Element_Text('puntosjugadordos1set3');
        $puntosjugadordos1set3->setLabel('Set 3 - Game 1 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno2set3 = new Zend_Form_Element_Text('puntosjugadoruno2set3');
        $puntosjugadoruno2set3->setLabel('Set 3 - Game 2 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos2set3 = new Zend_Form_Element_Text('puntosjugadordos2set3');
        $puntosjugadordos2set3->setLabel('Set 3 - Game 2 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno3set3 = new Zend_Form_Element_Text('puntosjugadoruno3set3');
        $puntosjugadoruno3set3->setLabel('Set 3 - Game 3 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos3set3 = new Zend_Form_Element_Text('puntosjugadordos3set3');
        $puntosjugadordos3set3->setLabel('Set 3 - Game 3 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno4set3 = new Zend_Form_Element_Text('puntosjugadoruno4set3');
        $puntosjugadoruno4set3->setLabel('Set 3 - Game 4 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos4set3 = new Zend_Form_Element_Text('puntosjugadordos4set3');
        $puntosjugadordos4set3->setLabel('Set 3 - Game 4 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno5set3 = new Zend_Form_Element_Text('puntosjugadoruno5set3');
        $puntosjugadoruno5set3->setLabel('Set 3 - Game 5 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos5set3 = new Zend_Form_Element_Text('puntosjugadordos5set3');
        $puntosjugadordos5set3->setLabel('Set 3 - Game 5 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $puntosjugadoruno6set3 = new Zend_Form_Element_Text('puntosjugadoruno6set3');
        $puntosjugadoruno6set3->setLabel('Set 3 - Game 6 - Puntos Jugador 1:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $puntosjugadordos6set3 = new Zend_Form_Element_Text('puntosjugadordos6set3');
        $puntosjugadordos6set3->setLabel('Set 3 - Game 6 - Puntos Jugador 2:')->setValue(0)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agrego los objetos creados al formulario
        $this->addElements(array($jugadoruno,$jugadordos,$juez,$torneo,
            $puntosjugadoruno1set1,$puntosjugadordos1set1,
            $puntosjugadoruno2set1,$puntosjugadordos2set1,
            $puntosjugadoruno3set1,$puntosjugadordos3set1,
            $puntosjugadoruno4set1,$puntosjugadordos4set1,
            $puntosjugadoruno5set1,$puntosjugadordos5set1,
            $puntosjugadoruno6set1,$puntosjugadordos6set1,
            $puntosjugadoruno1set2,$puntosjugadordos1set2,
            $puntosjugadoruno2set2,$puntosjugadordos2set2,
            $puntosjugadoruno3set2,$puntosjugadordos3set2,
            $puntosjugadoruno4set2,$puntosjugadordos4set2,
            $puntosjugadoruno5set2,$puntosjugadordos5set2,
            $puntosjugadoruno6set2,$puntosjugadordos6set2,
            $puntosjugadoruno1set3,$puntosjugadordos1set3,
            $puntosjugadoruno2set3,$puntosjugadordos2set3,
            $puntosjugadoruno3set3,$puntosjugadordos3set3,
            $puntosjugadoruno4set3,$puntosjugadordos4set3,
            $puntosjugadoruno5set3,$puntosjugadordos5set3,
            $puntosjugadoruno6set3,$puntosjugadordos6set3,
            $submit));
    }


}

