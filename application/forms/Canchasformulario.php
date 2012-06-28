<?php

class Application_Form_Canchasformulario extends Zend_Form
{

  public function init()
    {
      $this->setName('canchas');
               
        $ubicacion = new Zend_Form_Element_Text('ubicacion');
        $ubicacion->setLabel('Ubicacion:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->addValidator('NotEmpty');

        // creamos <input text> para escribir nombre de juez
        $fecha = new Zend_Form_Element_Text('fecha');
        $fecha->setLabel('Fecha :')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->addValidator('NotEmpty');
        
        // creamos <input text> para escribir nombre de juez
        $hora = new Zend_Form_Element_Text('hora');
        $hora->setLabel('Hora :')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->addValidator('NotEmpty');        
         
        //creamos select para seleccionar torneo
        $torneo = $this->createElement('select', 'torneo');
        $torneo->setLabel("Torneo:")->setRequired(true);
        $datos = Application_Model_Torneo::all();
        foreach($datos as $c)
        {
            $torneo->addMultiOption($c->_id,$c->nombre);
        }
     
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
         //agregolos objetos creados al formulario
        $this->addElements(array($ubicacion,$fecha,$hora,$torneo,$submit));
        
    }


}

