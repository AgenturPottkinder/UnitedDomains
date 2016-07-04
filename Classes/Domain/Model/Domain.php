<?php
/**
 * Created by PhpStorm.
 * User: avalarion
 * Date: 04.07.16
 * Time: 20:52
 */

namespace Pottkinder\UnitedDomains\Domain\Model;


class Domain
{
    /**
     * @var string
     */
    protected $domainName = '';

    public function __construct($domainName)
    {
        $this->domainName = $domainName;
    }

    /**
     * function getDomainName
     *
     * @return string
     */
    public function getDomainName()
    {
        return $this->domainName;
    }

    /**
     * function setDomainName
     *
     * @param string $domainName
     * @return void
     */
    public function setDomainName($domainName)
    {
        $this->domainName = $domainName;
    }

}