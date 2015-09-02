<?php

namespace SouqAPI\Mappers;

use SouqAPI\Entity\Product;

class ProductMapper
{
    public static function map($data)
    {
        $product = new Product();

        $data = $data['data'];

        foreach ($data as $key => $value) {
            $name = preg_replace('/_/', ' ', $key);

            $name = ucwords($name);

            $name = preg_replace('/\s+/', '', $name);

            $method = 'set' . $name;

            $product->{$method}($value);
        }

        return $product;
    }
}
