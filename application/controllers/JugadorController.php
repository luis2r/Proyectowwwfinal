<?php

class JugadorController extends Zend_Controller_Action
{

    public function init()
    {        
    }

    public function indexAction()
    {
        // action body
    }

    public function crearAction()
    {
       //creo el formulario
        $form = new Application_Form_Jugadorformulario();
        //cambio el texto del boton submit
        $form->submit->setLabel('Agregar jugador');
        //lo asigno oa la accion (la pag web que se mostrara)
        $this->view->form = $form;
        
        //los formularios envian sus datos a traves de POST
        //si vienen datos de post, es que el usuario ha enviado el formulario
        if ($this->getRequest()->isPost())
        {
            //extrae un arreglo con los datos recibidos por POST
            //es decir, los datos clave=>valor del formulario
            $formData = $this->getRequest()->getPost();   
            
            //isValid() revisa todos los validadores y filtros que le
            //aplicamos a los objetos del formulario: se asegura de que los
            //campos requeridos se hallan llenado, que el formato de la fecha
            //sea el correcto, etc
            if ($form->isValid($formData))
            {
                //aca ya estamos seguros de que los datos son validos
                //ahora los extraemos como se ve abajo
                $jugadorCrear = new Application_Model_Jugador();
                $jugadorCrear->codigo = $form->getValue('codigo');
                $jugadorCrear->nombre = $form->getValue('nombre');
                $jugadorCrear->documento = $form->getValue('documento');
                $jugadorCrear->modalidad = $form->getValue('modalidad');
                $jugadorCrear->torneo = $form->getValue('torneo');
                $jugadorCrear->tipo = $form->getValue('tipo');
                $jugadorCrear->categoria = $form->getValue('categoria');
                $jugadorCrear->ranking = $form->getValue('ranking');
                $jugadorCrear->grupo = $form->getValue('grupo');
                $jugadorCrear->pareja = $form->getValue('pareja');
                $status = $jugadorCrear->save();
                
                 $this->_helper->redirector('index');
            }
            //si los datos del formulario no son validos, es decir, falta ingresar
            //algunos o el formato es incorrecto...
            else
            {
                //esta funcion vuelve a cargar el formulario con los datos que se
                //enviaron, Y ADEMAS CON LOS MENSAJES DE ERROR, los que se le mostrarán
                //al usuario
                $form->populate($formData);
            }
        }
    }

    public function modificarAction()
    {
        // action body
    }

    public function eliminarAction()
    {
        // action body
    }


}







