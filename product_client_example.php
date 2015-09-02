<?php

require_once __DIR__ . '/vendor/autoload.php';

use SouqAPI\SouqAPI;

$api = SouqAPI::getInstance();

$product = $api->productApi->setId(7993579)
    ->setShowOffers(false)
    ->setShowAttributes(false)
    ->perform();

echo $product->getId();
