<?php

namespace SouqAPI;

use SouqAPI\Clients\Http\ProductClient;

use Stash\Driver\Memcache;
use Stash\Pool;

/**
 * Class SouqAPI
 *
 * @package SouqAPI
 */
class SouqAPI extends Singleton
{
    public $searchApi;

    public $productApi;

    public $productTypesApi;

    public $productTypeApi;

    public $offersApi;

    public $offerApi;

    public $customerProfileApi;

    public $customerDemographicsProfileApi;

    public $cartsApi;

    public $cartApi;

    public static function getInstance()
    {
        $instance = parent::getInstance();

        $initializers = [
            'ProductApi'
        ];

        foreach ($initializers as $initializer) {

            $function = 'init' . $initializer;

            $instance->{$function}();
        }

        return $instance;
    }

    private function initProductApi()
    {
        $this->productApi = new ProductClient();

        return $this->productApi;
    }
}
