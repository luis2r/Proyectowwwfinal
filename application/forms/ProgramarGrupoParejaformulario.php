<?php

class Application_Form_ProgramarGrupoParejaformulario extends Zend_Form
{

    public function init()
    {
        $this->setName('GrupoPareja');       
        
        //creamos <input text> para escribir nombre del pareja
        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //creamos select para seleccionar torneo
        $pareja1 = $this->createElement('select', 'pareja1');
        $pareja1->setLabel("pareja 1:");
        $datos = Application_Model_Programarpareja::all();
        foreach($datos as $c)
        {
            if(is_int($c->_id))
            {    
                $var=0;
            }    
            else
            { 
                $dato4 = Application_Model_Pareja::find($c->pareja);
                if($dato4=="")
                    $var = "Ninguno";
                else
                {
                    $dato1 = Application_Model_Jugador::find($dato4->jugadoruno);
                    $dato2 = Application_Model_Jugador::find($dato4->jugadordos);
                    $var = $dato1->nombre.' - '.$dato2->nombre;
                }  
            }
            if(is_string($var))
                $pareja1->addMultiOption($c->pareja,$var);
        }
        $pareja1->addMultiOption(0,"-");
        
        //creamos select para seleccionar torneo
        $pareja2 = $this->createElement('select', 'pareja2');
        $pareja2->setLabel("pareja 2:");
        $datos = Application_Model_Programarpareja::all();
        foreach($datos as $c)
        {
            if(is_int($c->_id))
            {    
                $var=0;
            }    
            else
            { 
                $dato4 = Application_Model_pareja::find($c->pareja);
                if($dato4=="")
                    $var = "Ninguno";
                else
                    {
                    $dato1 = Application_Model_Jugador::find($dato4->jugadoruno);
                    $dato2 = Application_Model_Jugador::find($dato4->jugadordos);
                    $var = $dato1->nombre.' - '.$dato2->nombre;
                } 
            }
            if(is_string($var))
                $pareja2->addMultiOption($c->pareja,$var);
        }
        $pareja2->addMultiOption(0,"-");
        
        //creamos select para seleccionar torneo
        $pareja3 = $this->createElement('select', 'pareja3');
        $pareja3->setLabel("pareja 3:");
        $datos = Application_Model_Programarpareja::all();
        foreach($datos as $c)
        {
            if(is_int($c->_id))
            {    
                $var=0;
            }    
            else
            { 
                $dato4 = Application_Model_pareja::find($c->pareja);
                if($dato4=="")
                    $var = "Ninguno";
                else
                    {
                    $dato1 = Application_Model_Jugador::find($dato4->jugadoruno);
                    $dato2 = Application_Model_Jugador::find($dato4->jugadordos);
                    $var = $dato1->nombre.' - '.$dato2->nombre;
                } 
            }
            if(is_string($var))
                $pareja3->addMultiOption($c->pareja,$var);
        }
        $pareja3->addMultiOption(0,"-");
        
        $pareja4 = $this->createElement('select', 'pareja4');
        $pareja4->setLabel("pareja 4:");
        $datos = Application_Model_Programarpareja::all();
        foreach($datos as $c)
        {
            if(is_int($c->_id))
            {    
                $var=0;
            }    
            else
            { 
                $dato4 = Application_Model_pareja::find($c->pareja);
                if($dato4=="")
                    $var = "Ninguno";
                else
                    {
                    $dato1 = Application_Model_Jugador::find($dato4->jugadoruno);
                    $dato2 = Application_Model_Jugador::find($dato4->jugadordos);
                    $var = $dato1->nombre.' - '.$dato2->nombre;
                } 
            }
            if(is_string($var))
                $pareja4->addMultiOption($c->pareja,$var);
        }
        $pareja4->addMultiOption(0,"-");
                      
        //boton para enviar formulario
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agrego los objetos creados al formulario
        $this->addElements(array($nombre,$pareja1,$pareja2,$pareja3,$pareja4,$submit));
    }
}

