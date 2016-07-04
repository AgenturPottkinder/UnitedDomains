<?php

namespace Pottkinder\UnitedDomains\Service;


class ArrayService
{

    /**
     * function extendArray
     *
     * @param array $array
     * @param array $keys
     * @param string $value
     *
     * @return array
     */
    public static function extendArray($array, $keys, $value) {
        if(count($keys) === 1)
        {
             $array[$keys[0]] = $value;
            return $array;
        }else{
            $newKey = array_shift($keys);
            if(isset($array[$newKey]))
            {
                $array[$newKey] = ArrayService::extendArray($array[$newKey], $keys, $value);
            } else {
                $array[$newKey] = array();
                $array[$newKey] = ArrayService::extendArray($array[$newKey], $keys, $value);
            }
            return $array;
        }
    }
}