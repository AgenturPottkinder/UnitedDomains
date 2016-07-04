<?php
/**
 * Created by PhpStorm.
 * User: avalarion
 * Date: 12.06.16
 * Time: 13:53
 */

namespace Pottkinder\UnitedDomains\Domain\Model;


use Pottkinder\UnitedDomains\Service\ArrayService;

class Response
{
    /**
     * @var int $code
     */
    protected $code = 0;

    /**
     * @var string $description
     */
    protected $description = '';
    /**
     * @var string $rawResponse
     */
    protected $rawResponse = '';

    /**
     * @var array $responseArray
     */
    protected $responseArray = array();

    /**
     * Response constructor.
     *
     * @param int $code
     * @param string $description
     * @param string $rawResponse
     * @param array $responseArray
     */
    public function __construct($code = 0, $description = '', $rawResponse = '', array $responseArray = array())
    {
        $this->code          = $code;
        $this->description   = $description;
        $this->rawResponse   = $rawResponse;
        $this->responseArray = $responseArray;
    }

    /**
     * function getResponseArray
     *
     * @return array
     */
    public function getResponseArray()
    {
        return $this->responseArray;
    }

    /**
     * function setResponseArray
     *
     * @param array $responseArray
     * @return void
     */
    public function setResponseArray($responseArray)
    {
        $this->responseArray = $responseArray;
    }

    /**
     * function addProperty
     *
     * @param string $fieldname
     * @param string $value
     * @return void
     */
    public function addProperty($fieldname, $value)
    {
        $tmp = explode('[', $fieldname);
        $fieldnames = array();
        for($i = 0; $i < count($tmp); $i++)
        {
            $fieldname = trim(str_replace(array('[', ']'), array('', ''), $tmp[$i]));
            if(strlen($fieldname) > 0 )
            {
                $fieldnames[] = $fieldname;
            }
        }
        $this->responseArray =  ArrayService::extendArray($this->responseArray, $fieldnames, $value);
    }

    /**
     * function getCode
     *
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * function setCode
     *
     * @param int $code
     * @return void
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * function getRawResponse
     *
     * @return string
     */
    public function getRawResponse()
    {
        return $this->rawResponse;
    }

    /**
     * function setRawResponse
     *
     * @param string $rawResponse
     * @return void
     */
    public function setRawResponse($rawResponse)
    {
        $this->rawResponse = $rawResponse;
    }

    /**
     * function getDescription
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * function setDescription
     *
     * @param string $description
     *
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}