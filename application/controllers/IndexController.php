<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
//        $uri = $this->_request->getPathInfo();    	
//		$activeNav = $this->view->navigation()->findByUri($uri);
//		$activeNav->active = true;
//		$activeNav->setClass("active");
    }

    public function indexAction()
    {
        // action body
                $this->view->autocompleteElement = new ZendX_JQuery_Form_Element_AutoComplete('ac');
        $this->view->autocompleteElement->setLabel('Autocomplete');
//        $this->view->autocompleteElement->setJQueryParam(
//                'source', 'index/city');
        $this->view->autocompleteElement->setJQueryParam('data', array('monte','nada'));
    }

    public function cityAction()
    {
        // action body
                $results = Model_City::search($this->_getParam('term'));
        $this->_helper->json(array_values($results));
    }


}



