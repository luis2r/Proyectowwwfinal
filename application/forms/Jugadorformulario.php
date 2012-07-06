<?php
class Application_Form_Jugadorformulario extends Zend_Form
{
    public function init()
    {
        $this->setName('Jugador');  
        
        //creamos <input text> para escribir nombre del jugador
        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //creamos <input text> para escribir la cedula del jugador
        $documento = new Zend_Form_Element_Text('documento');
        $documento->setLabel('Documento No:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
                        
        $modalidad = $this->createElement('select', 'modalidad');
        $modalidad->setLabel("Modalidad:")->setRequired(true);
        $modalidad->addMultiOption('Masculino', 'Masculino');        
        $modalidad->addMultiOption('Femenino', 'Femenino');

        //creamos select para seleccionar torneo
        $categoria = $this->createElement('select', 'categoria');
        $categoria->setLabel("Categoria:");
        $datos = Application_Model_Categoria::all();
        foreach($datos as $c)
        {
            $categoria->addMultiOption($c->_id,$c->nombre." - Valor: ".$c->valorinscripcion);
        }
        
        //creamos <input text> para escribir nombre del jugador
        $ranking = new Zend_Form_Element_Text('ranking');
        $ranking->setLabel('Ranking (Posición):')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim');
        
        //boton para enviar formulario
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agrego los objetos creados al formulario
<<<<<<< HEAD
        $this->addElements(array($nombre,$documento,$modalidad,$tipo,$categoria,$ranking,$submit));
=======
        $this->addElements(array($nombre,$documento,$modalidad,$categoria,$ranking,$submit));
>>>>>>> branch 'master' of https://github.com/luis2r/zendwww.git
    }
}

