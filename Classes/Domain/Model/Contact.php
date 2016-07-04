<?php
namespace Pottkinder\UnitedDomains\Domain\Model;

class Contact 
{
	/**
	 * @var string $firstname
	 */
	protected $firstName = '';

	/**
	 * @var string $lastName
	 */
	protected $lastName = '';

	/**
	 * @var string $organization
	 */
	protected $organization = '';

	/**
	 * @var string $street
	 */
	protected $street = '';

	/**
	 * @var string $city
	 */
	protected $city = '';

	/**
	 * @var string $state
	 */
	protected $state = '';

	/**
	 * @var string $zip
	 */
	protected $zip = '';

	/**
	 * @var string $country
	 */
	protected $country = '';

	/**
	 * @var string $phone
	 */
	protected $phone = '';

	/**
	 * @var string $email
	 */
	protected $email = '';

	/**
	 * Contact constructor.
	 *
	 * @param string $firstName
	 * @param string $lastName
	 * @param string $organization
	 * @param string $street
	 * @param string $city
	 * @param string $state
	 * @param string $zip
	 * @param string $country
	 * @param string $phone
	 * @param string $email
	 */
	public function __construct(
		$firstName,
		$lastName,
		$organization,
		$street,
		$city,
		$state,
		$zip,
		$country,
		$phone,
		$email
	) {
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->organization = $organization;
		$this->street = $street;
		$this->city = $city;
		$this->state = $state;
		$this->zip = $zip;
		$this->country = $country;
		$this->phone = $phone;
		$this->email = $email;
	}


	/**
	 * function getFirstName
	 *
	 * @return string
	 */
	public function getFirstName()
	{
		return $this->firstName;
	}

	/**
	 * function setFirstName
	 *
	 * @param string $firstName
	 *
	 * @return void
	 */
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}

	/**
	 * function getLastName
	 *
	 * @return string
	 */
	public function getLastName()
	{
		return $this->lastName;
	}

	/**
	 * function setLastName
	 *
	 * @param string $lastName
	 *
	 * @return void
	 */
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}

	/**
	 * function getOrganization
	 *
	 * @return string
	 */
	public function getOrganization()
	{
		return $this->organization;
	}

	/**
	 * function setOrganization
	 *
	 * @param string $organization
	 *
	 * @return void
	 */
	public function setOrganization($organization)
	{
		$this->organization = $organization;
	}

	/**
	 * function getStreet
	 *
	 * @return string
	 */
	public function getStreet()
	{
		return $this->street;
	}

	/**
	 * function setStreet
	 *
	 * @param string $street
	 *
	 * @return void
	 */
	public function setStreet($street)
	{
		$this->street = $street;
	}

	/**
	 * function getCity
	 *
	 * @return string
	 */
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * function setCity
	 *
	 * @param string $city
	 *
	 * @return void
	 */
	public function setCity($city)
	{
		$this->city = $city;
	}

	/**
	 * function getState
	 *
	 * @return string
	 */
	public function getState()
	{
		return $this->state;
	}

	/**
	 * function setState
	 *
	 * @param string $state
	 *
	 * @return void
	 */
	public function setState($state)
	{
		$this->state = $state;
	}

	/**
	 * function getZip
	 *
	 * @return string
	 */
	public function getZip()
	{
		return $this->zip;
	}

	/**
	 * function setZip
	 *
	 * @param string $zip
	 *
	 * @return void
	 */
	public function setZip($zip)
	{
		$this->zip = $zip;
	}

	/**
	 * function getCountry
	 *
	 * @return string
	 */
	public function getCountry()
	{
		return $this->country;
	}

	/**
	 * function setCountry
	 *
	 * @param string $country
	 *
	 * @return void
	 */
	public function setCountry($country)
	{
		$this->country = $country;
	}

	/**
	 * function getPhone
	 *
	 * @return string
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * function setPhone
	 *
	 * @param string $phone
	 *
	 * @return void
	 */
	public function setPhone($phone)
	{
		$this->phone = $phone;
	}

	/**
	 * function getEmail
	 *
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * function setEmail
	 *
	 * @param string $email
	 *
	 * @return void
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}



}