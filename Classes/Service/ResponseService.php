<?php
namespace Pottkinder\UnitedDomains\Service;

use Pottkinder\UnitedDomains\Domain\Model\Response;

/**
 * Class ResponseService
 * @package Pottkinder\UnitedDomains\Service
 *
 * Used for Reading response from UnitedDomains Reselling
 *
 */
class ResponseService
{

    /**
     * function readMessage
     *
     * @param string $message
     * @return Response
     */
    static function readMessage($message) {
        $response = new Response(0, '', $message);
        $messageArray = explode(PHP_EOL, $message);
        foreach($messageArray as $singleMessageLine)
        {
            $response = self::readLine($singleMessageLine, $response);
        }
        return $response;
    }

    /**
     * function readLine
     *
     * @param string $line
     * @param Response $response
     * @return Response
     */
    static function readLine($line, Response $response)
    {
        list($key, $fieldname, $value) = self::splitLine($line);
        switch ($key) {
            case 'code':
                $response->setCode((int)$value);
                break;

            case 'description':
                $response->setDescription($value);
                break;

            case 'property':
                $response->addProperty($fieldname, $value);
                break;

            case '':
                break;

            case 'EOF':
                break;

            case 'RUNTIME':
                break;

            case 'QUEUETIME':
                break;

            default:
                echo 'Key ' . $key . ' not found' . PHP_EOL;
                break;
        }
        return $response;
    }

    /**
     * function splitLine
     *
     * @param string $line
     * @return array
     */
    static function splitLine($line)
    {
        /**
         * @var $return array
         * + Key
         * + Fieldname
         * + Value
         */
        $return = array('', '', '');
        $tmp = explode('=', $line);
        if(isset($tmp[1])) {
            $return[2] = trim($tmp[1]);
        }
        $keyFieldname = explode('[', $tmp[0]);
        $return[0] = trim(array_shift($keyFieldname));
        $return[1] = isset($keyFieldname) ? '[' . trim(implode('[', $keyFieldname)) : '';
        return $return;
    }
}