<?php

class Application_Form_Juezformulario extends Zend_Form
{

    public function init()
    {
       $this->setName('juez');
       
       //campo hidden para guardar id de de juez
//        $id = new Zend_Form_Element_Hidden('id');
//        $id->addFilter('Int');
        
       
       $codigo = new Zend_Form_Element_Text('nombre');
        $codigo->setLabel('Codigo del juez:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->addValidator('NotEmpty');
//        creamos <input text> para escribir nombre de juez
        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre del juez:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->addValidator('NotEmpty');

        // creamos <input text> para escribir nombre de juez
        $documentoidentidad = new Zend_Form_Element_Text('documentoidentidad');
        $documentoidentidad->setLabel('Documento de identidad:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->addValidator('NotEmpty');
        
        // creamos <input text> para escribir la experiencia
        $experiencia = new Zend_Form_Element_Text('experiencia');
        $experiencia->setLabel('Experiencia años:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->addValidator('NotEmpty');
        
        // creamos <input text> para escribir el codigo de torneo
        $codigotorneo = new Zend_Form_Element_Text('codigotorneo');
        $codigotorneo->setLabel('Codigo Torneo:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->addValidator('NotEmpty');
        
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agregolos objetos creados al formulario
        $this->addElements(array($codigo,$nombre,$documentoidentidad,$experiencia,$codigotorneo, $submit));
        
        
        /* Form Elements & Other Definitions Here ... */
    }
}