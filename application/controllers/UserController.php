<?php

class UserController extends Zend_Controller_Action
{

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }
    }

    public function createAction() {
        // action body
        $userForm = new Application_Form_User();
        if ($this->_request->isPost()) {
            if ($userForm->isValid($_POST)) {
                $userModel = new Application_Model_User();
                $userModel->createUser(
                        $userForm->getValue('username'), $userForm->getValue('password'), $userForm->getValue('first_name'), $userForm->getValue('last_name'), $userForm->getValue('role')
                );
                return $this->_forward('list');
            }
        }
        $userForm->setAction('/zendwww/public/user/create');
        $this->view->form = $userForm;
    }

    public function listAction() {
        // action body
        $currentUsers = Application_Model_User::getUsers();
        if ($currentUsers->count() > 0) {
            $this->view->users = $currentUsers;
        } else {
            $this->view->users = null;
        }
    }

    public function updateAction() {
        // action body
        $userForm = new Application_Form_User();
        $userForm->setAction('/user/update');
        $userForm->removeElement('password');
        $id = $this->_request->getParam('id');
        $userModel = new Application_Model_User();
        $currentUser = $userModel->find($id)->current();
        $userForm->populate($currentUser->toArray());
        $this->view->form = $userForm;
    }

    public function passwordAction() {
        // action body
        $passwordForm = new Application_Form_User();
        $passwordForm->setAction('user/password');
        $passwordForm->removeElement('first_name');
        $passwordForm->removeElement('last_name');
        $passwordForm->removeElement('username');
        $passwordForm->removeElement('role');
        $userModel = new Application_Model_User();
        if ($this->_request->isPost()) {
            if ($passwordForm->isValid($_POST)) {
                $userModel->updatePassword(
                        $passwordForm->getValue('id'), $passwordForm->getValue('password')
                );
                return $this->_forward('/zendwww/public/user/list');
            }
        } else {
            $id = $this->_request->getParam('id');
            $currentUser = $userModel->find($id)->current();
            $passwordForm->populate($currentUser->toArray());
        }
        $this->view->form = $passwordForm;
    }

    public function deleteAction() {
        $id = $this->_request->getParam('id');
        $userModel = new Application_Model_User();
        $userModel->deleteUser($id);
        return $this->_forward('list');
    }

    public function loginAction() {
        // action body
        $userForm = new Application_Form_User();
        $userForm->setAction('/zendwww/public/user/login');
        $userForm->removeElement('first_name');
        $userForm->removeElement('last_name');
        $userForm->removeElement('role');
        if ($this->_request->isPost() && $userForm->isValid($_POST)) {
            $data = $userForm->getValues();
//set up the auth adapter
// get the default db adapter
            $db = Zend_Db_Table::getDefaultAdapter();
//create the auth adapter
            $authAdapter = new Zend_Auth_Adapter_DbTable($db, 'users',
                            'username', 'password');
//set the username and password
            $authAdapter->setIdentity($data['username']);
            $authAdapter->setCredential(md5($data['password']));
//authenticate
            $result = $authAdapter->authenticate();
            if ($result->isValid()) {
// store the username, first and last names of the user
                $auth = Zend_Auth::getInstance();
                $storage = $auth->getStorage();
                $storage->write($authAdapter->getResultRowObject(
                                array('username', 'first_name', 'last_name', 'role')));
                return $this->_forward('index');
            } else {
                $this->view->loginMessage = "login o contraseña incorrectos";
            }
        }
        $this->view->form = $userForm;
    }

    public function logoutAction() {
        // action body
        $authAdapter = Zend_Auth::getInstance();
        $authAdapter->clearIdentity();
    }


}















