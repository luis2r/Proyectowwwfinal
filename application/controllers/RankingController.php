    <?php

class RankingController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
         $table = Application_Model_Ranking::all();
        //obtengo listado de todas las filas de la tabla, y las
        //coloco en la variable datos de la pagina web (de la vista) 
        //que vamos a mostrar
        $this->view->datos = $table;
    }

    public function crearAction()
    {$this->view->title = "Crear Ranking";
        //valor para <head><title>
        $this->view->headTitle($this->view->title);
        //creo el formulario
        $form = new Application_Form_Rankingformulario();
        //cambio el texto del boton submit
        $form->submit->setLabel('Agregar ranking');
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
                $posicion = $form->getValue('posicion');
                $jugador = $form->getValue('jugador');
                $categoriajugador = $form->getValue('categoriajugador');
//              $status = $jugadorCrear->save();

                try {
                    // open connection to MongoDB server
                    $conn = new Mongo('localhost');
                    // access database
                    $db = $conn->proyecto;
                    // access collection
                    $collection = $db->ranking;
                    // insert a new document
                    $item = array(
                        'posicion' => $posicion,
                        'jugador' => $jugador,
                        'categoriajugador' => $categoriajugador,                        
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

    public function editarAction()
    {$this->view->title = "Editar Ranking";
        //valor para <head><title>
        $this->view->headTitle($this->view->title);
        //creo el formulario
        $form = new Application_Form_Rankingformulario();
        //cambio el texto del boton submit
        $form->submit->setLabel('Modificar Ranking');
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
                $_id = $this->_getParam('_id', 0);                               
                $posicion = $form->getValue('posicion');
                $jugador= $form->getValue('jugador');
                $categoriajugador = $form->getValue('categoriajugador');
                
                

                try {
                    // open connection to MongoDB server
                    $conn = new Mongo('localhost');

                    // access database
                    $db = $conn->proyecto;

                    // access collection
                    $collection = $db->rankig;

                    // insert a new document
                    // retrieve existing document 
                    $criteria = array(
                        '_id' => new MongoId($_id),
                    );
                    $doc = $collection->findOne($criteria);

                    // update document with new values
                    // save back to collection
                    $doc['posicion'] = $posicion;
                    $doc['jugador'] = $jugador;
                    $doc['categoriajugador'] = $categoriajugador;
                   

                    $collection->save($doc);
//                    echo 'Inserted document with ID: ' . $item['_id'];

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
        // action body
        else {
            //YO HE DECIDIDO QUE DEBE VENIR UN PARAMETRO LLAMADO ID, con el
            //id del album que deseo editar
            //si vienbe un parametro llamado id le asigno su valor a $id;
            //si no viene, le asigno cero
            //esto es como llamar a $_REQUEST
            $_id = $this->_getParam('_id', 0);
            //si viene algun id
            if ($_id != 0) {
                //CREO FORM

                try {
                    // open connection to MongoDB server
                    $conn = new Mongo('localhost');

                    // access database
                    $db = $conn->proyecto;

                    // access collection
                    $collection = $db->ranking;

                    $criteria = array(
                        '_id' => new MongoId($_id),
                    );
                    $doc = $collection->findOne($criteria);
                    $conn->close();
                } catch (MongoConnectionException $e) {
                    die('Error connecting to MongoDB server');
                } catch (MongoException $e) {
                    die('Error: ' . $e->getMessage());
                }


                //populate() toma los datos de $album y los coloca en el formualrio.
                //PARA QUE ESTO FUNCIONE, EL NOMBRE DE LOS OBJETOS DEL FORM DEBE
                //SER IGUAL AL NOMBRE DE LOS CAMPOS EN LA TABLA!!
                $form->populate($doc);
            }
        }
        
    }

    public function eliminarAction()
    {
       // action body
        
        // action body
        //debe venir un parametro, por GET o POST, llamado id, con el id del album a borrar
        $_id = $this->_getParam('_id', 0);
        //si viene algun id
//        if ($codigo != 0) {
            //CREO FORM

            try {
                // open connection to MongoDB server
                $conn = new Mongo('localhost');

                // access database
                $db = $conn->proyecto;

                // access collection
                $collection = $db->ranking;

                $criteria = array(
                    '_id' => $_id,
                );
                $doc = $collection->findOne($criteria);

                $criteria = array(
                    '_id' => new MongoId($_id),
                );
                $collection->remove($criteria);
                $conn->close();
            } catch (MongoConnectionException $e) {
                die('Error connecting to MongoDB server');
            } catch (MongoException $e) {
                die('Error: ' . $e->getMessage());
            }

            //llamo a // action body la funcion borrar     
            //redirijo a la accion index de este controlador, es decir,
            //al listado de albumes
            $this->_helper->redirector('index');
//        }
    }
}







