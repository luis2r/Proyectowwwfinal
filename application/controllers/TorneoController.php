<?php

class TorneoController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function crearAction() {
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
                //aca ya estamos seguros de que los datos son validos
                //ahora los extraemos como se ve abajo
//                $jugadorCrear = new Application_Model_Jugador();
                $codigo = $form->getValue('codigo');
                $nombre = $form->getValue('nombre');
                $modalidad = $form->getValue('modalidad');
                $duracion = $form->getValue('duracion');
                $fechainicio = $form->getValue('fechainicio');
                $fechafin = $form->getValue('fechafin');
                $descripcion = $form->getValue('descripcion');                
//              $status = $jugadorCrear->save();

                try {
                    // open connection to MongoDB server
                    $conn = new Mongo('localhost');
                    // access database
                    $db = $conn->proyecto;
                    // access collection
                    $collection = $db->torneo;
                    // insert a new document
                    $item = array(
                        'codigo' => $codigo,
                        'nombre' => $nombre,
                        'modalidad' => $modalidad,
                        'duracion' => $duracion,
                        'fechainicio' => $fechainicio,
                        'fechafin' => $fechafin,
                        'descripcion' => $descripcion                        
                    );
                    $collection->insert($item);
                    // disconnect from server
                    $conn->close();
                } catch (MongoConnectionException $e) {
                    die('Error connecting to MongoDB server');
                } catch (MongoException $e) {
                    die('Error: ' . $e->getMessage());
                }
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