<?php

class Application_Form_Canchasformulario extends Zend_Form
{

  public function init()
    {
      $this->setName('canchas');
        
        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->addValidator('NotEmpty');
      
        $ubicacion = new Zend_Form_Element_Text('ubicacion');
        $ubicacion->setLabel('Ubicacion:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->addValidator('NotEmpty');
            
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
         //agregolos objetos creados al formulario
        $this->addElements(array($nombre,$ubicacion,$submit));
        
    }


}

