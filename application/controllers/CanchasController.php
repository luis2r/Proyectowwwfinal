<?php

class CanchasController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function crearAction()
    {
      //creo el formulario        
        $form = new Application_Form_Canchasformulario();
        //cambio el texto del boton submit
        $form->submit->setLabel('Agregar Cancha');
        //lo asigno oa la accion (la pag web que se mostrara)
        $this->view->form = $form;
         // action body
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
                $canchamodelo = new Application_Model_Juez();
                $canchamodelo->codigo = $form->getValue('codigo');
                $canchamodelo->ubicacion = $form->getValue('ubicacion');
                $canchamodelo->fecha = $form->getValue('fecha');               
                $canchamodelo->hora =$form->getvalue('hora');
                $canchamodelo->torneo=$form ->getValue('torneo');
               //creo objeto Juez del modelo que controla la 
                 //$status = $juezmodelo->save();

               //comentado porque ahi va lo de Shanti y se crea las funciones en juezmodel
//                $juezmodel= new Application_Model_Juez();              
//                $juez->agregra($documentoidentidad,$nombre,$experiencia,$codigotorneo);
                               
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
        // action b
    }

    public function eliminarAction()
    {
        // action body
    }

    public function actualizasAction()
    {
        // action body
    }


}







