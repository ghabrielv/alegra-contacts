<?php

class ContactController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $contacts = new Application_Model_ContactMapper();
        $data = $contacts->listContact();

        return $this->getHelper('json')->sendJson($data);
    }

    public function consultAction()
    {
        $contacts = new Application_Model_ContactMapper();
        $data = $contacts->consultContact($this->getRequest()->getParam('id'));

        return $this->getHelper('json')->sendJson($data);
    }

    public function createAction()
    {
        $params = (array) json_decode($this->getRequest()->getPost('data'));
        unset($params['id']);

        $contact = new Application_Model_ContactMapper();
        $form = new Application_Model_Contact($params);
        $data = $contact->insertOrEditContact($form);

        return $this->getHelper('json')->sendJson($data);
    }

    public function editAction()
    {
        $params = (array) json_decode($this->getRequest()->getPost('data'));

        $contact = new Application_Model_ContactMapper();
        $form = new Application_Model_Contact($params);
        $data = $contact->insertOrEditContact($form);

        return $this->getHelper('json')->sendJson($data);
    }
}
