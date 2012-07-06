<?php

require_once 'Zend/Db/Table/Abstract.php';

class Application_Model_User extends Zend_Db_Table_Abstract {

    /**
     * The default table name
     */
    protected $_name = 'users';

    public function createUser($username, $password, $firstName, $lastName, $role) {
// create a new row
        $rowUser = $this->createRow();
        if ($rowUser) {
// update the row values
            $rowUser->username = $username;
            $rowUser->password = md5($password);
            $rowUser->first_name = $firstName;
            $rowUser->last_name = $lastName;
            $rowUser->role = $role;
            $rowUser->save();
//return the new user
            return $rowUser;
        } else {
            throw new Zend_Exception("Could not create user!");
        }
    }

    public static function getUsers() {
        $userModel = new self();
        $select = $userModel->select();
        $select->order(array('last_name', 'first_name'));
        return $userModel->fetchAll($select);
    }

    public function updateUser($id, $username, $firstName, $lastName, $role) {
        $userForm = new Form_User();
        $userForm->setAction('/user/update');
        $userForm->removeElement('password');
        $userModel = new Model_User();
        if ($this->_request->isPost()) {
            if ($userForm->isValid($_POST)) {
                $userModel->updateUser(
                        $userForm->getValue('id'), $userForm->getValue('username'), $userForm->getValue('first_name'), $userForm->getValue('last_name'), $userForm->getValue('role')
                );
                return $this->_forward('list');
            }
        } else {
            $id = $this->_request->getParam('id');
            $currentUser = $userModel->find($id)->current();
            $userForm->populate($currentUser->toArray());
        }
        $this->view->form = $userForm;
    }
    




}