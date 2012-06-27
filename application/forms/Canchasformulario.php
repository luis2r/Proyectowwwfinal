<?php

class Application_Form_Canchasformulario extends Zend_Form
{

  public function init()
    {
      $this->setName('canchas');
       
       //campo hidden para guardar id de de juez
//        $id = new Zend_Form_Element_Hidden('id');
//        $id->addFilter('Int');
        
        $codigo = new Zend_Form_Element_Text('codigo');
        $codigo->setLabel('Codigo:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->addValidator('NotEmpty');
//        creamos <input text> para escribir nombre de juez
        
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
        $this->addElements(array($codigo,$ubicacion,$fecha,$hora,$torneo,$submit));
        
    }


}

