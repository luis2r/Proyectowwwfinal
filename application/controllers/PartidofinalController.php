<?php

class PartidofinalController extends Zend_Controller_Action
{

    public function init()
    {
        
    }

    public function indexAction()
    {
        // action body
        // creo objeto que maneja la tabla album
        $table = Application_Model_Partidofinal::all();
        //obtengo listado de todas las filas de la tabla, y las
        //coloco en la variable datos de la pagina web (de la vista)
        //que vamos a mostrar
        $this->view->datos = $table;
    }

    public function crearAction()
    {
        $this->view->title = "Crear Partido Final";
        //valor para <head><title>
        $this->view->headTitle($this->view->title);
        //creo el formulario
        $form = new Application_Form_Partidofinalformulario();        
        //cambio el texto del boton submit
        $form->submit->setLabel('Agregar partido final');
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
                $puntosjugadoruno1set1 = $form->getValue('puntosjugadoruno1set1'); 
                $puntosjugadordos1set1 = $form->getValue('puntosjugadordos1set1'); 
                $puntosjugadoruno2set1 = $form->getValue('puntosjugadoruno2set1');
                $puntosjugadordos2set1 = $form->getValue('puntosjugadordos2set1');
                $puntosjugadoruno3set1 = $form->getValue('puntosjugadoruno3set1');
                $puntosjugadordos3set1 = $form->getValue('puntosjugadordos3set1');
                $puntosjugadoruno4set1 = $form->getValue('puntosjugadoruno4set1');
                $puntosjugadordos4set1 = $form->getValue('puntosjugadordos4set1');
                $puntosjugadoruno5set1 = $form->getValue('puntosjugadoruno5set1');
                $puntosjugadordos5set1 = $form->getValue('puntosjugadordos5set1');
                $puntosjugadoruno6set1 = $form->getValue('puntosjugadoruno6set1');
                $puntosjugadordos6set1 = $form->getValue('puntosjugadordos6set1');
                $puntosjugadoruno1set2 = $form->getValue('puntosjugadoruno1set2'); 
                $puntosjugadordos1set2 = $form->getValue('puntosjugadordos1set2'); 
                $puntosjugadoruno2set2 = $form->getValue('puntosjugadoruno2set2');
                $puntosjugadordos2set2 = $form->getValue('puntosjugadordos2set2');
                $puntosjugadoruno3set2 = $form->getValue('puntosjugadoruno3set2');
                $puntosjugadordos3set2 = $form->getValue('puntosjugadordos3set2');
                $puntosjugadoruno4set2 = $form->getValue('puntosjugadoruno4set2');
                $puntosjugadordos4set2 = $form->getValue('puntosjugadordos4set2');
                $puntosjugadoruno5set2 = $form->getValue('puntosjugadoruno5set2');
                $puntosjugadordos5set2 = $form->getValue('puntosjugadordos5set2');
                $puntosjugadoruno6set2 = $form->getValue('puntosjugadoruno6set2');
                $puntosjugadordos6set2 = $form->getValue('puntosjugadordos6set2');
                $puntosjugadoruno1set3 = $form->getValue('puntosjugadoruno1set3'); 
                $puntosjugadordos1set3 = $form->getValue('puntosjugadordos1set3'); 
                $puntosjugadoruno2set3 = $form->getValue('puntosjugadoruno2set3');
                $puntosjugadordos2set3 = $form->getValue('puntosjugadordos2set3');
                $puntosjugadoruno3set3 = $form->getValue('puntosjugadoruno3set3');
                $puntosjugadordos3set3 = $form->getValue('puntosjugadordos3set3');
                $puntosjugadoruno4set3 = $form->getValue('puntosjugadoruno4set3');
                $puntosjugadordos4set3 = $form->getValue('puntosjugadordos4set3');
                $puntosjugadoruno5set3 = $form->getValue('puntosjugadoruno5set3');
                $puntosjugadordos5set3 = $form->getValue('puntosjugadordos5set3');
                $puntosjugadoruno6set3 = $form->getValue('puntosjugadoruno6set3');
                $puntosjugadordos6set3 = $form->getValue('puntosjugadordos6set3');
                $torneo = $form->getValue('torneo');

                try {
                    // open connection to MongoDB server
                    $conn = new Mongo('localhost');
                    // access database
                    $db = $conn->proyecto;
                    // access collection
                    $collection = $db->partidofinal;
                    // insert a new document
                    $item = array(
                        'jugadoruno' => $jugadoruno,
                        'jugadordos' => $jugadordos,
                        'juez' => $juez,
                        'puntosjugadoruno1set1' => $puntosjugadoruno1set1,
                        'puntosjugadordos1set1' => $puntosjugadordos1set1,
                        'puntosjugadoruno2set1' => $puntosjugadoruno2set1,
                        'puntosjugadordos2set1' => $puntosjugadordos2set1,
                        'puntosjugadoruno3set1' => $puntosjugadoruno3set1,
                        'puntosjugadordos3set1' => $puntosjugadordos3set1,
                        'puntosjugadoruno4set1' => $puntosjugadoruno4set1,
                        'puntosjugadordos4set1' => $puntosjugadordos4set1,
                        'puntosjugadoruno5set1' => $puntosjugadoruno5set1,
                        'puntosjugadordos5set1' => $puntosjugadordos5set1,
                        'puntosjugadoruno6set1' => $puntosjugadoruno6set1,
                        'puntosjugadordos6set1' => $puntosjugadordos6set1,
                        'puntosjugadoruno1set2' => $puntosjugadoruno1set2,
                        'puntosjugadordos1set2' => $puntosjugadordos1set2,
                        'puntosjugadoruno2set2' => $puntosjugadoruno2set2,
                        'puntosjugadordos2set2' => $puntosjugadordos2set2,
                        'puntosjugadoruno3set2' => $puntosjugadoruno3set2,
                        'puntosjugadordos3set2' => $puntosjugadordos3set2,
                        'puntosjugadoruno4set2' => $puntosjugadoruno4set2,
                        'puntosjugadordos4set2' => $puntosjugadordos4set2,
                        'puntosjugadoruno5set2' => $puntosjugadoruno5set2,
                        'puntosjugadordos5set2' => $puntosjugadordos5set2,
                        'puntosjugadoruno6set2' => $puntosjugadoruno6set2,
                        'puntosjugadordos6set2' => $puntosjugadordos6set2,
                        'puntosjugadoruno1set3' => $puntosjugadoruno1set3,
                        'puntosjugadordos1set3' => $puntosjugadordos1set3,
                        'puntosjugadoruno2set3' => $puntosjugadoruno2set3,
                        'puntosjugadordos2set3' => $puntosjugadordos2set3,
                        'puntosjugadoruno3set3' => $puntosjugadoruno3set3,
                        'puntosjugadordos3set3' => $puntosjugadordos3set3,
                        'puntosjugadoruno4set3' => $puntosjugadoruno4set3,
                        'puntosjugadordos4set3' => $puntosjugadordos4set3,
                        'puntosjugadoruno5set3' => $puntosjugadoruno5set3,
                        'puntosjugadordos5set3' => $puntosjugadordos5set3,
                        'puntosjugadoruno6set3' => $puntosjugadoruno6set3,
                        'puntosjugadordos6set3' => $puntosjugadordos6set3,
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
        $this->view->title = "Editar Partido Final";
        //valor para <head><title>
        $this->view->headTitle($this->view->title);
        //creo el formulario
        $form = new Application_Form_Partidofinalformulario();
        //cambio el texto del boton submit
        $form->submit->setLabel('Modificar partido final');
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
                $puntosjugadoruno1set1 = $form->getValue('puntosjugadoruno1set1');
                $puntosjugadordos1set1 = $form->getValue('puntosjugadordos1set1');
                $puntosjugadoruno2set1 = $form->getValue('puntosjugadoruno2set1');
                $puntosjugadordos2set1 = $form->getValue('puntosjugadordos2set1');
                $puntosjugadoruno3set1 = $form->getValue('puntosjugadoruno3set1');
                $puntosjugadordos3set1 = $form->getValue('puntosjugadordos3set1');
                $puntosjugadoruno4set1 = $form->getValue('puntosjugadoruno4set1');
                $puntosjugadordos4set1 = $form->getValue('puntosjugadordos4set1');
                $puntosjugadoruno5set1 = $form->getValue('puntosjugadoruno5set1');
                $puntosjugadordos5set1 = $form->getValue('puntosjugadordos5set1');
                $puntosjugadoruno6set1 = $form->getValue('puntosjugadoruno6set1');
                $puntosjugadordos6set1 = $form->getValue('puntosjugadordos6set1');
                $puntosjugadoruno1set2 = $form->getValue('puntosjugadoruno1set2');
                $puntosjugadordos1set2 = $form->getValue('puntosjugadordos1set2');
                $puntosjugadoruno2set2 = $form->getValue('puntosjugadoruno2set2');
                $puntosjugadordos2set2 = $form->getValue('puntosjugadordos2set2');
                $puntosjugadoruno3set2 = $form->getValue('puntosjugadoruno3set2');
                $puntosjugadordos3set2 = $form->getValue('puntosjugadordos3set2');
                $puntosjugadoruno4set2 = $form->getValue('puntosjugadoruno4set2');
                $puntosjugadordos4set2 = $form->getValue('puntosjugadordos4set2');
                $puntosjugadoruno5set2 = $form->getValue('puntosjugadoruno5set2');
                $puntosjugadordos5set2 = $form->getValue('puntosjugadordos5set2');
                $puntosjugadoruno6set2 = $form->getValue('puntosjugadoruno6set2');
                $puntosjugadordos6set2 = $form->getValue('puntosjugadordos6set2');
                $puntosjugadoruno1set3 = $form->getValue('puntosjugadoruno1set3');
                $puntosjugadordos1set3 = $form->getValue('puntosjugadordos1set3');
                $puntosjugadoruno2set3 = $form->getValue('puntosjugadoruno2set3');
                $puntosjugadordos2set3 = $form->getValue('puntosjugadordos2set3');
                $puntosjugadoruno3set3 = $form->getValue('puntosjugadoruno3set3');
                $puntosjugadordos3set3 = $form->getValue('puntosjugadordos3set3');
                $puntosjugadoruno4set3 = $form->getValue('puntosjugadoruno4set3');
                $puntosjugadordos4set3 = $form->getValue('puntosjugadordos4set3');
                $puntosjugadoruno5set3 = $form->getValue('puntosjugadoruno5set3');
                $puntosjugadordos5set3 = $form->getValue('puntosjugadordos5set3');
                $puntosjugadoruno6set3 = $form->getValue('puntosjugadoruno6set3');
                $puntosjugadordos6set3 = $form->getValue('puntosjugadordos6set3');
                $torneo = $form->getValue('torneo');
    
                try {
                    // open connection to MongoDB server
                    $conn = new Mongo('localhost');

                    // access database
                    $db = $conn->proyecto;

                    // access collection
                    $collection = $db->partidofinal;

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
                    $doc['puntosjugadoruno1set1'] = $puntosjugadoruno1set1;
                    $doc['puntosjugadordos1set1'] = $puntosjugadordos1set1;
                    $doc['puntosjugadoruno2set1'] = $puntosjugadoruno2set1;
                    $doc['puntosjugadordos2set1'] = $puntosjugadordos2set1;
                    $doc['puntosjugadoruno3set1'] = $puntosjugadoruno3set1;
                    $doc['puntosjugadordos3set1'] = $puntosjugadordos3set1;
                    $doc['puntosjugadoruno4set1'] = $puntosjugadoruno4set1;
                    $doc['puntosjugadordos4set1'] = $puntosjugadordos4set1;
                    $doc['puntosjugadoruno5set1'] = $puntosjugadoruno5set1;
                    $doc['puntosjugadordos5set1'] = $puntosjugadordos5set1;
                    $doc['puntosjugadoruno6set1'] = $puntosjugadoruno6set1;
                    $doc['puntosjugadordos6set1'] = $puntosjugadordos6set1;
                    $doc['puntosjugadoruno1set2'] = $puntosjugadoruno1set2;
                    $doc['puntosjugadordos1set2'] = $puntosjugadordos1set2;
                    $doc['puntosjugadoruno2set2'] = $puntosjugadoruno2set2;
                    $doc['puntosjugadordos2set2'] = $puntosjugadordos2set2;
                    $doc['puntosjugadoruno3set2'] = $puntosjugadoruno3set2;
                    $doc['puntosjugadordos3set2'] = $puntosjugadordos3set2;
                    $doc['puntosjugadoruno4set2'] = $puntosjugadoruno4set2;
                    $doc['puntosjugadordos4set2'] = $puntosjugadordos4set2;
                    $doc['puntosjugadoruno5set2'] = $puntosjugadoruno5set2;
                    $doc['puntosjugadordos5set2'] = $puntosjugadordos5set2;
                    $doc['puntosjugadoruno6set2'] = $puntosjugadoruno6set2;
                    $doc['puntosjugadordos6set2'] = $puntosjugadordos6set2;
                    $doc['puntosjugadoruno1set3'] = $puntosjugadoruno1set3;
                    $doc['puntosjugadordos1set3'] = $puntosjugadordos1set3;
                    $doc['puntosjugadoruno2set3'] = $puntosjugadoruno2set3;
                    $doc['puntosjugadordos2set3'] = $puntosjugadordos2set3;
                    $doc['puntosjugadoruno3set3'] = $puntosjugadoruno3set3;
                    $doc['puntosjugadordos3set3'] = $puntosjugadordos3set3;
                    $doc['puntosjugadoruno4set3'] = $puntosjugadoruno4set3;
                    $doc['puntosjugadordos4set3'] = $puntosjugadordos4set3;
                    $doc['puntosjugadoruno5set3'] = $puntosjugadoruno5set3;
                    $doc['puntosjugadordos5set3'] = $puntosjugadordos5set3;
                    $doc['puntosjugadoruno6set3'] = $puntosjugadoruno6set3;
                    $doc['puntosjugadordos6set3'] = $puntosjugadordos6set3;
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
                    $collection = $db->partidofinal;

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
                $collection = $db->partidofinal;

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
        $table1 = Application_Model_Partidofinal::find($_id);
        //obtengo listado de todas las filas de la tabla, y las
        //coloco en la variable datos de la pagina web (de la vista) 
        //que vamos a mostrar
        $this->view->d = $table1;
    }
    
    
}









