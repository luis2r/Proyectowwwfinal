<?php

class Application_Form_ProgramarGrupoJugadorformulario extends Zend_Form
{

    public function init()
    {
        $this->setName('GrupoJugador');       
        
        //creamos <input text> para escribir nombre del jugador
        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //creamos select para seleccionar torneo
        $jugador1 = $this->createElement('select', 'jugador1');
        $jugador1->setLabel("Jugador 1:");        
        $datos = Application_Model_Programarjugador::all();
        foreach($datos as $c)
        {
            if(is_int($c->_id))
            {    
                $var=0;
            }    
            else
            { 
                $dato1 = Application_Model_Jugador::find($c->jugador);
                if($dato1=="")
                    $var = "Ninguno";
                else
                    $var= $dato1->nombre;
            }
            if(is_string($var))
                $jugador1->addMultiOption($c->jugador,$var);
        }
        $jugador1->addMultiOption(0,"-");
        
        //creamos select para seleccionar torneo
        $jugador2 = $this->createElement('select', 'jugador2');
        $jugador2->setLabel("Jugador 2:");        
        $datos = Application_Model_Programarjugador::all();
        foreach($datos as $c)
        {
            if(is_int($c->_id))
            {    
                $var=0;
            }    
            else
            { 
                $dato1 = Application_Model_Jugador::find($c->jugador);
                if($dato1=="")
                    $var = "Ninguno";
                else
                    $var= $dato1->nombre;
            }
            if(is_string($var))
                $jugador2->addMultiOption($c->jugador,$var);
        }
        $jugador2->addMultiOption(0,"-");
        
        //creamos select para seleccionar torneo
        $jugador3 = $this->createElement('select', 'jugador3');
        $jugador3->setLabel("Jugador 3:");
        $datos = Application_Model_Programarjugador::all();
        foreach($datos as $c)
        {
            if(is_int($c->_id))
            {    
                $var=0;
            }    
            else
            { 
                $dato1 = Application_Model_Jugador::find($c->jugador);
                if($dato1=="")
                    $var = "Ninguno";
                else
                    $var= $dato1->nombre;
            }
            if(is_string($var))
                $jugador3->addMultiOption($c->jugador,$var);
        }
        $jugador3->addMultiOption(0,"-");
        
        
        $jugador4 = $this->createElement('select', 'jugador4');
        $jugador4->setLabel("Jugador 4:");        
        $datos = Application_Model_Programarjugador::all();
        foreach($datos as $c)
        {
            if(is_int($c->_id))
            {    
                $var=0;
            }    
            else
            { 
                $dato4 = Application_Model_Jugador::find($c->jugador);
                if($dato4=="")
                    $var = "Ninguno";
                else
                    $var= $dato4->nombre;
            }
            if(is_string($var))
                $jugador4->addMultiOption($c->jugador,$var);
        }
        $jugador4->addMultiOption(0,"-");
                      
        //boton para enviar formulario
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agrego los objetos creados al formulario
        $this->addElements(array($nombre,$jugador1,$jugador2,$jugador3,$jugador4,$submit));
    }
}

