<?php

class TorneoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
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
        $this->view->title = "Crear Torneo";
        //valor para <head><title>
        $this->view->headTitle($this->view->title);
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

    public function modificarAction()
    {
        $this->view->title = "Editar Torneo";
        //valor para <head><title>
        $this->view->headTitle($this->view->title);
        //creo el formulario
        $form = new Application_Form_Torneoformulario();
        //cambio el texto del boton submit
        $form->submit->setLabel('Modificar Torneo');
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
                $nombre = $form->getValue('nombre');
                $modalidad = $form->getValue('modalidad');
                $duracion = $form->getValue('duracion');
                $fechainicio = $form->getValue('fechainicio');
                $fechafin = $form->getValue('fechafin');                
                $descripcion = $form->getValue('descripcion');

                try {
                    // open connection to MongoDB server
                    $conn = new Mongo('localhost');

                    // access database
                    $db = $conn->proyecto;

                    // access collection
                    $collection = $db->torneo;

                    // insert a new document
                    // retrieve existing document 
                    $criteria = array(
                        '_id' => new MongoId($_id),
                    );
                    $doc = $collection->findOne($criteria);

                    // update document with new values
                    // save back to collection
                    $doc['nombre'] = $nombre;
                    $doc['modalidad'] = $modalidad;
                    $doc['duracion'] = $duracion;
                    $doc['fechainicio'] = $fechainicio;
                    $doc['fechaifin'] = $fechafin;
                    $doc['descripcion'] = $descripcion;

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
                    $collection = $db->torneo;

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
                $collection = $db->torneo;

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
<<<<<<< HEAD
//        }
    } 
    
    public function programarjugadorAction()
    {
        $this->view->title = "Asignar Jugador a Torneo";
        //valor para <head><title>
        $this->view->headTitle($this->view->title);
        //creo el formulario
        $form = new Application_Form_ProgramarJugadorformulario();
        //cambio el texto del boton submit
        $form->submit->setLabel('Agregar jugador');
        //lo asigno oa la accion (la pag web que se mostrara)
        $this->view->form = $form;
        
        $_id = $this->_getParam('_id', 0);
        
        //los formularios envian sus datos a traves de POST
        //si vienen datos de post, es que el usuario ha enviado el formulario
        if ($this->getRequest()->isPost()) {
            //extrae un arreglo con los datos recibidos por POST
            //es decir, los datos clave=>valor del formulario
            $formData = $this->getRequest()->getPost();
=======
//        
    }
>>>>>>> branch 'master' of https://github.com/luis2r/zendwww.git

<<<<<<< HEAD
            //isValid() revisa todos los validadores y filtros que le
            //aplicamos a los objetos del formulario: se asegura de que los
            //campos requeridos se hallan llenado, que el formato de la fecha
            //sea el correcto, etc
            if ($form->isValid($formData)) {
                //aca ya estamos seguros de que los datos son validos
                //ahora los extraemos como se ve abajo
//                $jugadorCrear = new Application_Model_Jugador();
                $jugador = $form->getValue('jugador');
                $torneo = $form->getValue($_id);
                
                try {
                    // open connection to MongoDB server
                    $conn = new Mongo('localhost');
                    // access database
                    $db = $conn->proyecto;
                    // access collection
                    $collection = $db->torneojugador;
                    // insert a new document
                    $item = array(
                        'jugador' => $jugador,
                        'torneo' => $torneo  
                    );
                    $collection->insert($item);
                    // disconnect from server
                    $conn->close();
                } catch (MongoConnectionException $e) {
                    die('Error connecting to MongoDB server');
                } catch (MongoException $e)
                {
                    die('Error: ' . $e->getMessage());
                }                
                $this->_helper->redirector('programarjugador');                
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
       $table1 = Application_Model_Programarjugador::all();
       $this->view->dato = $table1;
    }    
}
=======
    public function programarjugadorAction()
    {
        $this->view->title = "Asignar Jugador a Torneo";
        //valor para <head><title>
        $this->view->headTitle($this->view->title);
        //creo el formulario
        $form = new Application_Form_ProgramarJugadorformulario();
        //cambio el texto del boton submit
        $form->submit->setLabel('Agregar jugador');
        //lo asigno oa la accion (la pag web que se mostrara)
        $this->view->form = $form;
        
        $_id = $this->_getParam('_id', 0);
        
        if($_id!=null)
        {
            
        try {
                // open connection to MongoDB server
                $conn = new Mongo('localhost');
                // access database
                $db = $conn->proyecto;
                // access collection
                $collection = $db->torneojugador;
                // insert a new document
                $item = array(
                    '_id' => 0,
                   'torneo' => $_id
                );
                    $collection->insert($item);
                    // disconnect from server
                    $conn->close();
                } catch (MongoConnectionException $e) {
                    die('Error connecting to MongoDB server');
                } catch (MongoException $e)
                {
                    die('Error: ' . $e->getMessage());
                }
        }  
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
                $jugador = $form->getValue('jugador');
                
                $table = Application_Model_Programarjugador::one();
                $dato = $table->torneo;
                try {
                    // open connection to MongoDB server
                    $conn = new Mongo('localhost');
                    // access database
                    $db = $conn->proyecto;
                    // access collection
                    $collection = $db->torneojugador;
                    // insert a new document
                    $item = array(
                        'jugador' => $jugador,
                        'torneo' => $dato
                    );
                    $collection->insert($item);
                    // disconnect from server
                    $conn->close();
                } catch (MongoConnectionException $e) {
                    die('Error connecting to MongoDB server');
                } catch (MongoException $e)
                {
                    die('Error: ' . $e->getMessage());
                }                
                $this->_helper->redirector(programarjugador);                
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
       $table1 = Application_Model_Programarjugador::all();
       $this->view->dato = $table1;
    }

    public function programarjuezAction()
    {
        $this->view->title = "Asignar Juez a Torneo";
        //valor para <head><title>
        $this->view->headTitle($this->view->title);
        //creo el formulario
        $form = new Application_Form_ProgramarJuezformulario();
        //cambio el texto del boton submit
        $form->submit->setLabel('Agregar juez');
        //lo asigno oa la accion (la pag web que se mostrara)
        $this->view->form = $form;
        
        $_id = $this->_getParam('_id', 0);
        
        if($_id!=null)
        {
            
        try {
                // open connection to MongoDB server
                $conn = new Mongo('localhost');
                // access database
                $db = $conn->proyecto;
                // access collection
                $collection = $db->torneojuez;
                // insert a new document
                $item = array(
                    '_id' => 0,
                   'torneo' => $_id
                );
                    $collection->insert($item);
                    // disconnect from server
                    $conn->close();
                } catch (MongoConnectionException $e) {
                    die('Error connecting to MongoDB server');
                } catch (MongoException $e)
                {
                    die('Error: ' . $e->getMessage());
                }
        }  
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
                $juez = $form->getValue('juez');
                
                $table = Application_Model_Programarjuez::one();
                $dato = $table->torneo;
                try {
                    // open connection to MongoDB server
                    $conn = new Mongo('localhost');
                    // access database
                    $db = $conn->proyecto;
                    // access collection
                    $collection = $db->torneojuez;
                    // insert a new document
                    $item = array(
                        'juez' => $juez,
                        'torneo' => $dato
                    );
                    $collection->insert($item);
                    // disconnect from server
                    $conn->close();
                } catch (MongoConnectionException $e) {
                    die('Error connecting to MongoDB server');
                } catch (MongoException $e)
                {
                    die('Error: ' . $e->getMessage());
                }                
                $this->_helper->redirector(programarjuez);                
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
       $table1 = Application_Model_Programarjuez::all();
       $this->view->dato = $table1;
    }

    public function programarcanchaAction()
    {
        $this->view->title = "Asignar Cancha a Torneo";
        //valor para <head><title>
        $this->view->headTitle($this->view->title);
        //creo el formulario
        $form = new Application_Form_ProgramarCanchaformulario();
        //cambio el texto del boton submit
        $form->submit->setLabel('Agregar cancha');
        //lo asigno oa la accion (la pag web que se mostrara)
        $this->view->form = $form;
        
        $_id = $this->_getParam('_id', 0);
        
        if($_id!=null)
        {
            
        try {
                // open connection to MongoDB server
                $conn = new Mongo('localhost');
                // access database
                $db = $conn->proyecto;
                // access collection
                $collection = $db->torneocancha;
                // insert a new document
                $item = array(
                    '_id' => 0,
                   'torneo' => $_id
                );
                    $collection->insert($item);
                    // disconnect from server
                    $conn->close();
                } catch (MongoConnectionException $e) {
                    die('Error connecting to MongoDB server');
                } catch (MongoException $e)
                {
                    die('Error: ' . $e->getMessage());
                }
        }  
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
                $cancha = $form->getValue('cancha');
                
                $table = Application_Model_Programarcancha::one();
                $dato = $table->torneo;
                try {
                    // open connection to MongoDB server
                    $conn = new Mongo('localhost');
                    // access database
                    $db = $conn->proyecto;
                    // access collection
                    $collection = $db->torneocancha;
                    // insert a new document
                    $item = array(
                        'cancha' => $cancha,
                        'torneo' => $dato
                    );
                    $collection->insert($item);
                    // disconnect from server
                    $conn->close();
                } catch (MongoConnectionException $e) {
                    die('Error connecting to MongoDB server');
                } catch (MongoException $e)
                {
                    die('Error: ' . $e->getMessage());
                }                
                $this->_helper->redirector(programarcancha);                
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
       $table1 = Application_Model_Programarcancha::all();
       $this->view->dato = $table1;
    }

    public function programarparejaAction()
    {
        $this->view->title = "Asignar Pareja a Torneo";
        //valor para <head><title>
        $this->view->headTitle($this->view->title);
        //creo el formulario
        $form = new Application_Form_ProgramarParejaformulario();
        //cambio el texto del boton submit
        $form->submit->setLabel('Agregar pareja');
        //lo asigno oa la accion (la pag web que se mostrara)
        $this->view->form = $form;
        
        $_id = $this->_getParam('_id', 0);
        
        if($_id!=null)
        {
            
        try {
                // open connection to MongoDB server
                $conn = new Mongo('localhost');
                // access database
                $db = $conn->proyecto;
                // access collection
                $collection = $db->torneopareja;
                // insert a new document
                $item = array(
                    '_id' => 0,
                   'torneo' => $_id
                );
                    $collection->insert($item);
                    // disconnect from server
                    $conn->close();
                } catch (MongoConnectionException $e) {
                    die('Error connecting to MongoDB server');
                } catch (MongoException $e)
                {
                    die('Error: ' . $e->getMessage());
                }
        }  
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
                $pareja = $form->getValue('pareja');
                
                $table = Application_Model_Programarpareja::one();
                $dato = $table->torneo;
                try {
                    // open connection to MongoDB server
                    $conn = new Mongo('localhost');
                    // access database
                    $db = $conn->proyecto;
                    // access collection
                    $collection = $db->torneopareja;
                    // insert a new document
                    $item = array(
                        'pareja' => $pareja,
                        'torneo' => $dato
                    );
                    $collection->insert($item);
                    // disconnect from server
                    $conn->close();
                } catch (MongoConnectionException $e) {
                    die('Error connecting to MongoDB server');
                } catch (MongoException $e)
                {
                    die('Error: ' . $e->getMessage());
                }                
                $this->_helper->redirector(programarpareja);                
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
       $table1 = Application_Model_Programarpareja::all();
       $this->view->dato = $table1;
    }
}






>>>>>>> branch 'master' of https://github.com/luis2r/zendwww.git

