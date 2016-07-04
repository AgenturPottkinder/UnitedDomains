<?php
/**
 * Created by PhpStorm.
 * User: avalarion
 * Date: 04.07.16
 * Time: 20:54
 */

namespace Pottkinder\UnitedDomains\Domain\Model;

class User
{
    /**
     * @var string
     */
    protected $login;

    /**
     * Constructor
     *
     * @param string $login
     */
    public function __construct($login)
    {
        $this->login = $login;
    }

    /**
     * function getLogin
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * function setLogin
     *
     * @param string $login
     * @return void
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

}