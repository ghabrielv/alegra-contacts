<?php

class Application_Model_ContactMapper
{
    private $uri;
    private $email;
    private $token;
    private $http;

    public function __construct()
    {
        $dataAlegra = Zend_Controller_Front::getInstance()->getParam('bootstrap')->getOption('alegraApi');

        $this->uri = $dataAlegra['uri'] . 'contacts';
        $this->email = $dataAlegra['email'];
        $this->token = $dataAlegra['token'];

        $this->http = new Zend_Http_Client();
        $this->http->setUri($this->uri);
        $this->http->setAuth($this->email, $this->token, Zend_Http_Client::AUTH_BASIC);
    }

    public function listContact()
    {
        $response = $this->http->request('GET');
        $data = $response->getBody();
        $data = json_decode($data, true);

        $contacts = array();

        foreach ($data as $row) {
            $contact = new Application_Model_Contact($row);
            $contacts[] = $contact;
        }

        return [
          'data' => $contacts,
        ];
    }

    public function consultContact($id)
    {
        $this->http->setUri($this->uri . "/$id");
        $response = $this->http->request('GET');

        $data = $response->getBody();
        $data = json_decode($data, true);

        $contact = new Application_Model_Contact($data);

        return [
          'data' => $contact,
        ];
    }

    public function insertOrEditContact(Application_Model_Contact $contact)
    {
        if ($contact->getId() == 0) {
            $params = array(
              'name' => $contact->getName(),
              'identification' => $contact->getIdentification(),
              'email' => $contact->getEmail(),
              'phonePrimary' => $contact->getPhoneprimary(),
              'phoneSecondary' => $contact->getPhonesecondary(),
              'fax' => $contact->getFax(),
              'mobile' => $contact->getMobile(),
              'observations' => $contact->getObservations(),
              'priceList' => empty($contact->getPriceList()) ? null : $contact->getPriceList(),
              'seller' => empty($contact->getSeller()) ? null : $contact->getSeller(),
              'term' => empty($contact->getTerm()) ? null : $contact->getTerm(),
              'address' => $contact->getAddress(),
              'type' => $contact->getType(),
              'internalContacts' => $contact->getInternalContacts(),
            );

            $this->http->setUri($this->uri);
            $response = $this->http->setRawData(json_encode($params))->request('POST');
            $data = $response->getBody();
            $data = json_decode($data, true);
        } else {
            $params = array(
              'id' => $contact->getId(),
              'name' => $contact->getName(),
              'identification' => $contact->getIdentification(),
              'email' => $contact->getEmail(),
              'phonePrimary' => $contact->getPhoneprimary(),
              'phoneSecondary' => $contact->getPhonesecondary(),
              'fax' => $contact->getFax(),
              'mobile' => $contact->getMobile(),
              'observations' => $contact->getObservations(),
              'priceList' => empty($contact->getPriceList()) ? null : $contact->getPriceList(),
              'seller' => empty($contact->getSeller()) ? null : $contact->getSeller(),
              'term' => empty($contact->getTerm()) ? null : $contact->getTerm(),
              'address' => $contact->getAddress(),
              'type' => $contact->getType(),
              'internalContacts' => $contact->getInternalContacts(),
            );

            $this->http->setUri($this->uri . "/$id");
            $response = $this->http->setRawData(json_encode($params))->request('PUT');
            $data = $response->getBody();
            $data = json_decode($data, true);
        }

        return $data;
    }
}
