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
        $torneo = $this->createElement('select', 'torneo');
        $torneo->setLabel("Torneo:");
        $datos = Application_Model_Torneo::all();
        foreach($datos as $c)
        {
            $torneo->addMultiOption($c->_id,$c->nombre);
        }

        //creamos <input text> para escribir el tipo del jugador
        $tipo = $this->createElement('select', 'tipo');
        $tipo->setLabel("Tipo:")->setRequired(true);
        $tipo->addMultiOption('Individual', 'Individual');        
        $tipo->addMultiOption('Pareja', 'Pareja');
        
        //creamos select para seleccionar torneo
        $categoria = $this->createElement('select', 'categoria');
        $categoria->setLabel("Categoria:");
        $datos = Application_Model_Categoria::all();
        foreach($datos as $c)
        {
            $categoria->addMultiOption($c->_id,$c->nombre);
        }
        
        //creamos select para seleccionar torneo
        $grupo = $this->createElement('select', 'grupo');
        $grupo->setLabel("Grupo:");
        $grupo->addMultiOption(11111,'Ninguno');
        $datos = Application_Model_Grupo::all();
        foreach($datos as $c)
        {
            $grupo->addMultiOption($c->_id,$c->nombre);
        }
        
        //creamos select para seleccionar torneo
        $pareja = $this->createElement('select', 'pareja');
        $pareja->setLabel("Pareja:");
        $pareja->addMultiOption(11111,'Ninguna');
        $datos = Application_Model_Pareja::all();
        foreach($datos as $c)
        {
            $pareja->addMultiOption($c->_id,$c->nombre);
        }
        
        //boton para enviar formulario
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agrego los objetos creados al formulario
        $this->addElements(array($nombre,$documento,$modalidad,$torneo,$tipo,$categoria,$grupo,$pareja,$submit));
    }
}

