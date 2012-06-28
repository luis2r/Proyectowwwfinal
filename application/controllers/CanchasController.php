<?php

class CanchasController extends Zend_Controller_Action
{
    public function init() {
        
    }

    public function indexAction()
    {
        //creo objeto que maneja la tabla album
        $table = Application_Model_Torneo::all();
        //obtengo listado de todas las filas de la tabla, y las
        //coloco en la variable datos de la pagina web (de la vista) 
        //que vamos a mostrar

        $this->view->datos = $table;
    }

    public function crearAction() 
    {
        //creo el formulario
        $form = new Application_Form_Canchasformulario();
        //cambio el texto del boton submit
        $form->submit->setLabel('Agregar cancha');
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
                $ubicacion = $form->getValue('ubicacion');
                $fecha = $form->getValue('fecha');
                $hora = $form->getValue('hora');
                $torneo = $form->getValue('torneo');
                
                try {
                    // open connection to MongoDB server
                    $conn = new Mongo('localhost');
                    // access database
                    $db = $conn->proyecto;
                    // access collection
                    $collection = $db->cancha;
                    // insert a new document
                    $item = array(                        
                        'ubicacion' => $ubicacion,
                        'fecha' => $fecha,
                        'hora' => $hora,
                        'torneo' => $torneo                        
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
    }//fin action crear.....

    public function modificarAction() {
        // action body
    }

    public function eliminarAction() {
        // action body
    }


}

