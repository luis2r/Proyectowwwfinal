<?php

class Application_Form_Torneoformulario extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setName('Torneo');

        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');

            
        $modalidad = $this->createElement('select', 'modalidad');
        $modalidad->setLabel("Modalidad:")->setRequired(true);
        $modalidad->addMultiOption('Masculino', 'Masculino');        
        $modalidad->addMultiOption('Femenino', 'Femenino'); 
        
        $duracion = new Zend_Form_Element_Text('duracion');
        $duracion->setLabel('Duracion:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $fechainicio = new Zend_Form_Element_Text('fechainicio');
        $fechainicio->setLabel('Fecha de inicio:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');

        $fechafin = new Zend_Form_Element_Text('fechafin');
        $fechafin->setLabel('Fecha de finalizacion:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $descripcion = new Zend_Form_Element_Text('descripcion');
        $descripcion->setLabel('Descripcion:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //boton para enviar formulario
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agregolos objetos creados al formulario
        $this->addElements(array($nombre,$modalidad,$duracion,$fechainicio,$fechafin,$descripcion, $submit));
    }
}