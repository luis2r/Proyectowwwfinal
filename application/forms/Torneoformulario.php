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
                
        $fechainicio = new ZendX_JQuery_Form_Element_DatePicker(
                'fechainicio',
                array('jQueryParams' => array(
                    'defaultDate' => '2012/10/10',
                    'closeText' => 'Cerrar',
                    'prevText' => '<Ant',
                    'nextText' => 'Sig',
                    'currentText' => 'Hoy',
                    'monthNames' => array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'),
                    'monthNamesShort' => array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'),
                    'dayNames' => array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'),
                    'dayNamesShort' => array('Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'),
                    'dayNamesMin' => array('Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'),
                    'weekHeader' => 'Sm',
                    'dateFormat' => 'dd/mm/yy',
                    'firstDay' => 1,
                    'isRTL' => false)));
        $fechainicio->setLabel('Fecha Inicio:')->setRequired(true)->setJQueryParam('changeYear', 'true')->
                setJqueryParam('changeMonth','true')->setJqueryParam('yearRange', "2000:2030")->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
                
        $fechafin = new ZendX_JQuery_Form_Element_DatePicker(
                'fechafin',
                array('jQueryParams' => array(
                    'defaultDate' => '2012/10/10',
                    'closeText' => 'Cerrar',
                    'prevText' => '<Ant',
                    'nextText' => 'Sig',
                    'currentText' => 'Hoy',
                    'monthNames' => array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'),
                    'monthNamesShort' => array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'),
                    'dayNames' => array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'),
                    'dayNamesShort' => array('Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'),
                    'dayNamesMin' => array('Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'),
                    'weekHeader' => 'Sm',
                    'dateFormat' => 'dd/mm/yy',
                    'firstDay' => 1,
                    'isRTL' => false)));
        $fechafin->setLabel('Fecha Fin:')->setRequired(true)->setJQueryParam('changeYear', 'true')->
                setJqueryParam('changeMonth','true')->setJqueryParam('yearRange', "2000:2030")->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        $descripcion = new Zend_Form_Element_Textarea('descripcion');
        $descripcion->setLabel('Descripcion:')->setRequired(true)->
                addFilter('StripTags')->addFilter('StringTrim')->
                addValidator('NotEmpty');
        
        //boton para enviar formulario
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        //agregolos objetos creados al formulario
        $this->addElements(array($nombre,$modalidad,$duracion,$fechainicio,$fechafin,$descripcion,$submit));
    }
}