<?php

namespace SouqAPI\Clients\Http;

use GuzzleHttp\Client as GuzzClient;
use Noodlehaus\Config as AppConfig;

class BaseClient
{
    protected $appId;

    protected $appSecret;

    protected $countryCode;

    protected $languageCode;

    protected $format = 'json';

    public function __construct()
    {
        # TODO: move this to a config class and make sure to cache it using stash
        $this->appConfig = AppConfig::load(__DIR__ . '/../../../../config/app_config.yml');

        $this->appId = $this->appConfig->get('api.app_id');

        $this->appSecret = $this->appConfig->get('api.app_secret');

        $this->countryCode = $this->appConfig->get('api.country_code');

        if (!$this->countryCode) {
            $this->countryCode = 'ae';
        }

        $this->languageCode = $this->appConfig->get('api.language_code');

        if (!$this->languageCode) {
            $this->languageCode = 'en';
        }

        $this->initBaseParams();

        $this->client = new GuzzClient();
    }

    public function get($url)
    {
        return $this->client->get($url, [
            'query' => $this->params
        ]);
    }

    private function initBaseParams()
    {
        $this->params = [
            'app_id' => $this->appId,
            'app_secret' => $this->appSecret,
            'country' => $this->countryCode,
            'language' => $this->languageCode,
            'format' => $this->format,
        ];
    }

    protected function mergeParams($params)
    {
        array_merge($this->params, $params);
    }

    protected function getData($responseBody)
    {
        if ($this->format == 'json') {
            return json_decode($responseBody, true);
        } else {
            return simplexml_load_string($responseBody);
        }
    }
}

