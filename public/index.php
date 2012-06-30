<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';


//agrego esto
require_once 'Zend/Loader/Autoloader.php';
Zend_Loader_Autoloader::getInstance ();

$translator = new Zend_Translate(
                'array',
                '../resources/languages',
                'es',
                array('scan' => Zend_Translate::LOCALE_DIRECTORY)
);
Zend_Validate_Abstract::setDefaultTranslator($translator);

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$view = new Zend_View();
    $view->addHelperPath('ZendX/JQuery/View/Helper/', 'ZendX_JQuery_View_Helper');
     
    $viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
    $viewRenderer->setView($view);
    Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
$application->bootstrap()
            ->run();