<?php

class JugadorController extends Zend_Controller_Action
{

    public function init()
    {
        $this->initView();
        $this->view->baseUrl = $this->_request->getBaseUrl();
    }

    public function indexAction()
    {
        // action body
    }

    public function crearAction()
    {
        //titulo para la pagina
        $this->view->title = "Agregar jugador";
        //valor para <head><title>
        $this->view->headTitle($this->view->title);
        //creo el formulario
        $form = new Application_Form_Jugadorformulario ();
        //cambio el texto del boton submit
        $form->submit->setLabel('Agregar jugador');
        //lo asigno a la accion (la pag web que se mostrara)
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
                $jugador_id = $form->getValue('jugador_id');
                $nombre = $form->getValue('nombre');
                $documento = $form->getValue('documento');
                $categoria = $form->getValue('categoria');
                $modalidad = $form->getValue('modalidad');
                $tipo = $form->getValue('tipo');
                
                //creo objeto Album que controla la talba Album de la base de datos
                $jugadores= new Application_Model_DBTable_Jugador();
                //llamo a la funcion agregar, con los datos que recibi del form
                $albums->agregar($jugador_id,$nombre,$documento,$categoria,$modalidad,$tipo);
                
                //indico que despues de haber agregado el album,
                //me redirija a la accion index de AlbumController, es decir,
                //a la pagina que me muestra el listado de albumes
                $this->_helper->redirector('crear');
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







