<?php

class Application_Form_Torneoformulario extends Zend_Form
{

    public function init()
        {
        /* Form Elements & Other Definitions Here ... */
               $this->setName('Torneo');

        //creamos <input text> para escribir nombre album
        $codigo = new Zend_Form_Element_Text('codigo');
        $codigo->setLabel('Codigo:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');

        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');

        $modalidad = new Zend_Form_Element_Text('modalidad');
        $modalidad->setLabel('Modalidad:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $duracion = new Zend_Form_Element_Text('duracion');
        $duracion->setLabel('Duracion:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $fechainicio = new Zend_Form_Element_Text('fechainicio');
        $fechainicio->setLabel('fecha inicio:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');

        $fechafin = new Zend_Form_Element_Text('fechafin');
        $fechafin->setLabel('fecha fin:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $descripcion = new Zend_Form_Element_Text('descripcion');
        $descripcion->setLabel('descripcion:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        
//boton para enviar formulario
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agregolos objetos creados al formulario
        $this->addElements(array($codigo,$nombre,$modalidad,$duracion,$fechainicio,$fechafin,$descripcion, $submit));
    }


}
