<?php
/**
 * @copyright  Copyright (c) 2015 Souq.com. All rights reserved.
 * @author     Ahmed El.Hussaini(ahussaini@souq.com)
 * @package    SouqAPI
 * @version    1.1
 */

namespace SouqAPI\Entity;

/**
 * Super class for all Entities
 */
class Entity
{
    public static function loadFromXml($xmlData)
    {}

    public static function loadFromJson($jsonData)
    {
        $data = json_decode($jsonData, true);
        foreach ($data['data'] as $key => $value) {
            $this->{$key} = $value;
        }
    }
}
