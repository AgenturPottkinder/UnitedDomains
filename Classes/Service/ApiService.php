<?php
namespace Pottkinder\UnitedDomains\Service;

use Pottkinder\UnitedDomains\Domain\Model\Contact;

class ApiService
{

    /**
     * @var string $username
     */
    protected $username = '';

    /**
     * @var string $password
     */
    protected $password = '';

    public function __construct($username, $password)
    {
        $this->setUsername($username);
        $this->setPassword($password);
    }

    /**
     * function ensureContact
     *
     * @param Contact $contact
     * @return Contact
     */
    public function ensureContact(Contact $contact)
    {
        $contact = $this->findContact($contact);
        if($contact === NULL)
        {
            $contact = $this->addContact($contact);
        }
        return $contact;
    }

    /**
     * function find Contact
     *
     * @param Contact $contact
     * @return Contact
     */
    protected function findContact(Contact $contact)
    {
        $contactArray = [
            'firstname' => $contact->getFirstName(),
            'lastname' => $contact->getLastName(),
            'organization' => $contact->getOrganization()
        ];
        $response = $this->doApiCall('QueryContactList', $contactArray);
        //git ();
        return $contact;
    }

    /**
     * function moveDomainAndZoneToAccount
     *
     * @param Domain $domain
     * @param User $customer
     * @return boolean
     */
    public function moveDomainAndZoneToAccount($domain, $customer)
    {
        $response = [];
        $response[] = $this->moveDomainToAccount($domain, $customer);
        $response[] = $this->moveZoneToAccount($domain, $customer);
        return $response;
    }

    /**
     * function moveZoneToAccount
     *
     * @param Domain $domain
     * @param User $customer
     * @return boolean
     */
    protected function moveZoneToAccount($domain, $customer)
    {
        return $this->doApiCall('AssignObject', [
            'objectclass' => 'domain',
            'objectid' => $domain->getDomainName() . '.',
            'user' => $customer->getLogin()
        ]);
    }

    /**
     * function moveDomainToAccount
     *
     * @param Domain $domain
     * @param User $customer
     * @return boolean
     */
    protected function moveDomainToAccount($domain, $customer)
    {
        return $this->doApiCall('AssignObject', [
            'objectclass' => 'domain',
            'objectid' => $domain->getDomainName(),
            'user' => $customer->getLogin()
        ]);
    }

    protected function addContact($firstName, $lastName, $organization, $street, $city, $state, $zip, $country, $phone, $email)
    {

    }

    /**
     * function doApiCall
     * Does all the magic
     *
     * @param string $endpoint
     * @param array $config
     *
     * @return \Pottkinder\UnitedDomains\Domain\Model\Response
     */
    protected function doApiCall($endpoint, $config = NULL)
    {
        if(!isset($config) || !is_array($config))
        {
            $config = array();
            $config['s_login'] = $this->username;
            $config['s_pw'] = $this->password;
        }

        if(!isset($config['s_login']) || !isset($config['s_login']))
        {
            $config['s_login'] = $this->username;
            $config['s_pw'] = $this->password;
        }
        $config['command'] = $endpoint;
        $config = array_reverse($config);

        $fields_string = '';
        foreach($config as $key=>$value) 
        {
             $fields_string .= $key.'='.$value.'&'; 
        }
        rtrim($fields_string, '&');
        
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, 'https://api.domainreselling.de/api/call.cgi');
        curl_setopt($ch,CURLOPT_POST, count($config));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //execute post
        $result = curl_exec($ch);

        //close connection
        curl_close($ch);
        return ResponseService::readMessage($result);
    }

    /**
     * function setUsername
     *
     * @param string $username
     * @return void
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * function setPassword
     *
     * @param string $password
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

}