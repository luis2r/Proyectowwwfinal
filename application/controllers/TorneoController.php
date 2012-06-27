<?php

class TorneoController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function crearAction() {
        // action body
        // action body
        //creo el formulario
        $form = new Application_Form_Torneoformulario();
        //cambio el texto del boton submit
        $form->submit->setLabel('Agregar torneo');
        //lo asigno oa la accion (la pag web que se mostrara)
        $this->view->form = $form;

        //los formularios envian sus datos a traves de POST
        //si vienen datos de post, es que el usuario ha enviado el formulario
        if ($this->getRequest()->isPost()) {
            //extrae un arreglo con los datos recibidos por POST
            //es decir, los datos clave=>valor del formulario
            $formData = $this->getRequest()->getPost();

            //isValid() revisa todos los validadores y filtros que le
            //aplicamos a los objetos del formulario: se asegura de que los
            //campos requeridos se hallan llenado, que el formato de la fecha
            //sea el correcto, etc
            if ($form->isValid($formData)) {


                //como mi fecha viene en el formato dia-mes-año y Mysql
                //guarda fechas en la forma año-mes-dia, procedo a cambiar el formato
                //cambio formato de fecha para mysql
                $torneoCrear = new Application_Model_Torneo();
                $torneoCrear->codigo = $form->getValue('codigo');
                $torneoCrear->nombre = $form->getValue('nombre');
                $torneoCrear->modalidad = $form->getValue('modalidad');
                $torneoCrear->duracion = $form->getValue('duracion');
                $torneoCrear->fechainicio = $form->getValue('fechainicio');
                $torneoCrear->fechafin = $form->getValue('fechafin');
                $torneoCrear->descripcion = $form->getValue('descripcion');
                $status = $torneoCrear->save();

                //creo objeto Album que controla la talba Album de la base de datos
//  $albums = new Application_Model_DbTable_Album ();
//                //llamo a la funcion agregar, con los datos que recibi del form
//                $albums->agregar($artista_id, $nombre, $fecha, $descripcion);
                //indico que despues de haber agregado el album,
                //me redirija a la accion index de AlbumController, es decir,
                //a la pagina que me muestra el listado de albumes
                $this->_helper->redirector('index');
            }
            //si los datos del formulario no son validos, es decir, falta ingresar
            //algunos o el formato es incorrecto...
            else {
                //esta funcion vuelve a cargar el formulario con los datos que se
                //enviaron, Y ADEMAS CON LOS MENSAJES DE ERROR, los que se le mostrarán
                //al usuario
                $form->populate($formData);
            }
        }
    }

    public function modificarAction() {
        // action body
    }

    public function eliminarAction() {
        // action body
    }

}