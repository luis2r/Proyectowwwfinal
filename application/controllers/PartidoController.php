<?php

class PartidoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */        
    }

    public function indexAction()
    {
        // action body
        // creo objeto que maneja la tabla album              
        $table = Application_Model_Partido::all();
        //obtengo listado de todas las filas de la tabla, y las
        //coloco en la variable datos de la pagina web (de la vista) 
        //que vamos a mostrar
        $this->view->datos = $table;
    }

    public function crearAction()
    {
        $this->view->title = "Crear Partido";
        //valor para <head><title>
        $this->view->headTitle($this->view->title);
        //creo el formulario
        $form = new Application_Form_Partidoformulario();
        //cambio el texto del boton submit
        $form->submit->setLabel('Agregar partido');
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
                $jugadoruno = $form->getValue('jugadoruno');
                $jugadordos = $form->getValue('jugadordos');
                $juez = $form->getValue('juez');
                $puntosjugadoruno1 = $form->getValue('puntosjugadoruno1'); 
                $puntosjugadordos1 = $form->getValue('puntosjugadordos1'); 
                $puntosjugadoruno2 = $form->getValue('puntosjugadoruno2');
                $puntosjugadordos2 = $form->getValue('puntosjugadordos2');
                $puntosjugadoruno3 = $form->getValue('puntosjugadoruno3');
                $puntosjugadordos3 = $form->getValue('puntosjugadordos3');
                $puntosjugadoruno4 = $form->getValue('puntosjugadoruno4');
                $puntosjugadordos4 = $form->getValue('puntosjugadordos4');
                $puntosjugadoruno5 = $form->getValue('puntosjugadoruno5');
                $puntosjugadordos5 = $form->getValue('puntosjugadordos5');
                $puntosjugadoruno6 = $form->getValue('puntosjugadoruno6');
                $puntosjugadordos6 = $form->getValue('puntosjugadordos6');
                $puntosjugadoruno7 = $form->getValue('puntosjugadoruno7');
                $puntosjugadordos7 = $form->getValue('puntosjugadordos7');
                $puntosjugadoruno8 = $form->getValue('puntosjugadoruno8');
                $puntosjugadordos8 = $form->getValue('puntosjugadordos8');                
                $torneo = $form->getValue('torneo');

                try {
                    // open connection to MongoDB server
                    $conn = new Mongo('localhost');
                    // access database
                    $db = $conn->proyecto;
                    // access collection
                    $collection = $db->partido;
                    // insert a new document
                    $item = array(
                        'jugadoruno' => $jugadoruno,
                        'jugadordos' => $jugadordos,
                        'juez' => $juez,
                        'puntosjugadoruno1' => $puntosjugadoruno1,
                        'puntosjugadordos1' => $puntosjugadordos1,
                        'puntosjugadoruno2' => $puntosjugadoruno2,
                        'puntosjugadordos2' => $puntosjugadordos2,
                        'puntosjugadoruno3' => $puntosjugadoruno3,
                        'puntosjugadordos3' => $puntosjugadordos3,
                        'puntosjugadoruno4' => $puntosjugadoruno4,
                        'puntosjugadordos4' => $puntosjugadordos4,
                        'puntosjugadoruno5' => $puntosjugadoruno5,
                        'puntosjugadordos5' => $puntosjugadordos5,
                        'puntosjugadoruno6' => $puntosjugadoruno6,
                        'puntosjugadordos6' => $puntosjugadordos6,
                        'puntosjugadoruno7' => $puntosjugadoruno7,
                        'puntosjugadordos7' => $puntosjugadordos7,
                        'puntosjugadoruno8' => $puntosjugadoruno8,
                        'puntosjugadordos8' => $puntosjugadordos8,
                        'torneo' => $torneo,
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
        // action body
    }

    public function modificarAction()
    {
        $this->view->title = "Editar Partido";
        //valor para <head><title>
        $this->view->headTitle($this->view->title);
        //creo el formulario
        $form = new Application_Form_Partidoformulario();
        //cambio el texto del boton submit
        $form->submit->setLabel('Modificar partido');
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
                // $jugadorCrear = new Application_Model_Jugador();
                $_id = $this->_getParam('_id', 0);
                $jugadoruno = $form->getValue('jugadoruno');
                $jugadordos = $form->getValue('jugadordos');
                $juez = $form->getValue('juez');
                $puntosjugadoruno1 = $form->getValue('puntosjugadoruno1');
                $puntosjugadordos1 = $form->getValue('puntosjugadordos1');
                $puntosjugadoruno2 = $form->getValue('puntosjugadoruno2');
                $puntosjugadordos2 = $form->getValue('puntosjugadordos2');
                $puntosjugadoruno3 = $form->getValue('puntosjugadoruno3');
                $puntosjugadordos3 = $form->getValue('puntosjugadordos3');
                $puntosjugadoruno4 = $form->getValue('puntosjugadoruno4');
                $puntosjugadordos4 = $form->getValue('puntosjugadordos4');
                $puntosjugadoruno5 = $form->getValue('puntosjugadoruno5');
                $puntosjugadordos5 = $form->getValue('puntosjugadordos5');
                $puntosjugadoruno6 = $form->getValue('puntosjugadoruno6');
                $puntosjugadordos6 = $form->getValue('puntosjugadordos6');
                $puntosjugadoruno7 = $form->getValue('puntosjugadoruno7');
                $puntosjugadordos7 = $form->getValue('puntosjugadordos7');
                $puntosjugadoruno8 = $form->getValue('puntosjugadoruno8');
                $puntosjugadordos8 = $form->getValue('puntosjugadordos8');
                $torneo = $form->getValue('torneo');
    
                try {
                    // open connection to MongoDB server
                    $conn = new Mongo('localhost');

                    // access database
                    $db = $conn->proyecto;

                    // access collection
                    $collection = $db->partido;

                    // insert a new document
                    // retrieve existing document 
                    $criteria = array(
                        '_id' => new MongoId($_id),
                       
                    );
                    
                    $doc = $collection->findOne($criteria);

                    // update document with new values
                    // save back to collection
                    $doc['jugadoruno'] = $jugadoruno;
                    $doc['jugadordos'] = $jugadordos;
                    $doc['juez'] = $juez;
                    $doc['puntosjugadoruno1'] = $puntosjugadoruno1;
                    $doc['puntosjugadordos1'] = $puntosjugadordos1;
                    $doc['puntosjugadoruno2'] = $puntosjugadoruno2;
                    $doc['puntosjugadordos2'] = $puntosjugadordos2;
                    $doc['puntosjugadoruno3'] = $puntosjugadoruno3;
                    $doc['puntosjugadordos3'] = $puntosjugadordos3;
                    $doc['puntosjugadoruno4'] = $puntosjugadoruno4;
                    $doc['puntosjugadordos4'] = $puntosjugadordos4;
                    $doc['puntosjugadoruno5'] = $puntosjugadoruno5;
                    $doc['puntosjugadordos5'] = $puntosjugadordos5;
                    $doc['puntosjugadoruno6'] = $puntosjugadoruno6;
                    $doc['puntosjugadordos6'] = $puntosjugadordos6;
                    $doc['puntosjugadoruno7'] = $puntosjugadoruno7;
                    $doc['puntosjugadordos7'] = $puntosjugadordos7;
                    $doc['puntosjugadoruno8'] = $puntosjugadoruno8;
                    $doc['puntosjugadordos8'] = $puntosjugadordos8;
                    $doc['torneo'] = $torneo;
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
                    $collection = $db->partido;

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
        // action body
    }

    public function eliminarAction()
    {
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
                $collection = $db->partido;

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

            //llamo a la funcion borrar     
            //redirijo a la accion index de este controlador, es decir,
            //al listado de albumes
            $this->_helper->redirector('index');
//        }
        // action body
    
    }

    public function mostrarAction()
    {
        // action body
        // creo objeto que maneja la tabla album       
        $_id = $this->_getParam('_id', 0);
        $table1 = Application_Model_Partido::find($_id);
        //obtengo listado de todas las filas de la tabla, y las
        //coloco en la variable datos de la pagina web (de la vista) 
        //que vamos a mostrar
        $this->view->d = $table1;
    }

    public function modificarmobilAction()
    {
        $this->_helper->layout()->disableLayout(); 
//        $this->_helper->viewRenderer->setNoRender(true);
        
        
    }

    public function partidofinalAction()
    {
         $this->_helper->layout()->disableLayout(); 
        // action body
    }

    public function partidonormAction()
    {
      $this->_helper->layout()->disableLayout(); 
    }


}





