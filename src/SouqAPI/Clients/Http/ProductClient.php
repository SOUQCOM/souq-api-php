<?php

namespace SouqAPI\Clients\Http;

use SouqAPI\Mappers\ProductMapper;

class ProductClient extends BaseClient
{
    protected $id;

    protected $showOffers = false;

    protected $showAttributes = true;

    protected $showVariations = true;

    public function perform()
    {
        $url = $this->buildUrl();

        $this->mergeParams([
            'show_offers' => $this->showOffers,
            'show_attributes' => $this->showAttributes,
            'show_variations' => $this->showVariations,
        ]);

        $response = $this->get($url);

        $data = $this->getData($response->getBody());

        $product = ProductMapper::map($data);

        return $product;
    }

    public function buildUrl()
    {
        $url = $this->appConfig->get('api.endpoints.products');

        $url .= '/' . $this->id;

        return $url;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setShowOffers($show_offers)
    {
        $this->show_offers = $show_offers;

        return $this;
    }

    public function setShowAttributes($show_attributes)
    {
        $this->show_attributes = $show_attributes;

        return $this;
    }

    public function setShowVariations($show_variations)
    {
        $this->show_variations = $show_variations;

        return $this;
    }
}
