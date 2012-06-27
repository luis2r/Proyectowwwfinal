<?php
class Application_Form_Jugadorformulario extends Zend_Form
{
    public function init()
    {
        $this->setName('Jugador');
        
        //creamos <input text> para escribir nombre album
        $codigo = new Zend_Form_Element_Text('codigo');
        $codigo->setLabel('Codigo:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');        
        
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
        $torneo->setLabel("Torneo:")->setRequired(true);
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
        $categoria->setLabel("Categoria:")->setRequired(true);
        $datos = Application_Model_Categoria::all();
        foreach($datos as $c)
        {
            $categoria->addMultiOption($c->_id,$c->nombre);
        }
        
        //creamos <input text> para escribir el grupo del jugador
        $grupo = new Zend_Form_Element_Text('grupo');
        $grupo->setLabel('Grupo:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //creamos <input text> para escribir pareja del jugador
        $pareja = new Zend_Form_Element_Text('pareja');
        $pareja->setLabel('Pareja:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //boton para enviar formulario
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agrego los objetos creados al formulario
        $this->addElements(array($codigo,$nombre,$documento,$modalidad,$torneo,$tipo,$categoria,$grupo,$pareja,$submit));
    }
}

