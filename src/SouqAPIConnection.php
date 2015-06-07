<?php
/**

 * @copyright  Copyright (c) 2015 Souq.com. All rights reserved.
 * @author     Mohamad Jazaery(mjazaery@souq.com), created on 6/04/15
 * @package    SouqAPI
 * @version    1.0
 */
namespace SouqAPI;

use SouqAPI\Utils\Exception\APICallException;
use SouqAPI\Utils\Http\Client\Exception;
use SouqAPI\Utils\Http\Client\Provider\Curl;

class SouqAPIConnection
{

    private $apiBaseUrl = 'https://api.souq.com';
    private $apiUrl = 'https://api.souq.com/v1/';
    private $authorizeUrl = '/oauth/authorize';
    private $accessTokenUrl = '/oauth/access_token';
    private $defaultCountry = 'ae';
    private $defaultLanguage = 'ar';
    private $clientId;
    private $clientSecret;

    /**
     * @var AccessToken
     */
    private $accessToken;
    private $httpClient;

    //Const
    const KEY_ACCESS_TOKEN = "access_token";
    const KEY_APP_ID = 'app_id' ;
    const KEY_APP_SECRET = 'app_secret' ;
    const KEY_MESSAGE = 'message' ;
    const KEY_LANGUAGE = 'language' ;
    const KEY_COUNTRY = 'country' ;
    const KEY_CUSTOMER_ID = 'customer_id' ;

    public function __construct($clientId,$clientSecret)
    {
        $this->httpClient = new Curl();
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * @return AccessToken
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param AccessToken $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return string
     */
    public function getAccessTokenUrl()
    {
        return $this->accessTokenUrl;
    }

    /**
     * @param string $accessTokenUrl
     */
    public function setAccessTokenUrl($accessTokenUrl)
    {
        $this->accessTokenUrl = $accessTokenUrl;
    }

    /**
     * @return string
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * @param string $apiUrl
     */
    public function setApiUrl($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }


    /**
     * @return string
     */
    public function getDefaultCountry()
    {
        return $this->defaultCountry;
    }

    /**
     * @param string $defaultCountry
     */
    public function setDefaultCountry($defaultCountry)
    {
        $this->defaultCountry = $defaultCountry;
    }

    /**
     * @return string
     */
    public function getDefaultLanguage()
    {
        return $this->defaultLanguage;
    }

    /**
     * @param string $defaultLanguage
     */
    public function setDefaultLanguage($defaultLanguage)
    {
        $this->defaultLanguage = $defaultLanguage;
    }

    /**
     * @return string
     */
    public function getAuthorizeUrl()
    {
        return $this->authorizeUrl;
    }

    /**
     * @param string $authorizeUrl
     */
    public function setAuthorizeUrl($authorizeUrl)
    {
        $this->authorizeUrl = $authorizeUrl;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param mixed $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return mixed
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * @param mixed $clientSecret
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }

    /**
     * @return \SouqAPI\Utils\Http\Client\Provider\Curl
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param \SouqAPI\Utils\Http\Client\Provider\Curl $httpClient
     */
    public function setHttpClient($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param $method
     * @param $uri
     * @param  array $params
     * @return SouqAPIResult CallResult
     * @throws APICallException
     */
    private function apiCall($method, $uri, $params =array())
    {
        //add Key to call
        $params[SouqAPIConnection::KEY_APP_ID] = $this->clientId;
        $params[SouqAPIConnection::KEY_APP_SECRET] = $this->clientSecret;
        $params[SouqAPIConnection::KEY_LANGUAGE] = $this->getDefaultLanguage();
        $params[SouqAPIConnection::KEY_COUNTRY] = $this->getDefaultCountry();

        if (!empty($this->accessToken)){
            $params[SouqAPIConnection::KEY_ACCESS_TOKEN] = $this->accessToken->getAccessTokenVal();
            $params[SouqAPIConnection::KEY_CUSTOMER_ID] = $this->accessToken->getCustomerId();
            $this->getHttpClient()->header->set('Authorization',$this->getAccessToken()->getType().' '.$this->accessToken->getAccessTokenVal());
        }

        $url=$this->apiUrl.$uri;
        try {

            $oResponse = $this->getHttpClient()->$method($url, $params);
            if (empty($oResponse->body)) {
                $oResponse = $this->getHttpClient()->$method($url, $params);
            }
        } catch (Exception $e) {
            throw new APICallException(500, $e);
        }

        try {
            $oOutput = json_decode($oResponse->body, true);
        } catch (Exception $e) {
            throw new APICallException(500, $e);
        }

        $callResult = new SouqAPIResult($oResponse->header->statusCode, $oOutput);

        return $callResult;
    }


    /**
     * @param $uri
     * @param $params
     * @return SouqAPIResult CallResult
     * @throws APICallException
     */
    public function get($uri, $params =array()){
        return $this->apiCall('get', $uri, $params);
    }

    /**
     * @param $uri
     * @param $params
     * @return SouqAPIResult CallResult
     * @throws APICallException
     */
    public function post($uri, $params =array()){
        return $this->apiCall('post', $uri, $params);
    }

    /**
     * @param $uri
     * @param $params
     * @return SouqAPIResult CallResult
     * @throws APICallException
     */
    public function put($uri, $params =array()){
        return $this->apiCall('put', $uri, $params);
    }

    /**
     * @param $uri
     * @param $params
     * @return SouqAPIResult CallResult
     * @throws APICallException
     */
    public function delete($uri, $params =array()){
        return $this->apiCall('delete', $uri, $params);
    }

    /**
     * @param $scopes
     * @param $redirect_url
     * @return string
     */
    public function getAuthenticationUrl($redirect_url,$scopes){

        $params['client_id'] = $this->clientId;
        $params['response_type'] = 'code';
        if(is_array($scopes))
            $scopes=implode(',',$scopes);
        $params['scope'] = $scopes;
        $params['redirect_uri'] = $redirect_url;
        return $this->apiBaseUrl.$this->authorizeUrl.'?'.http_build_query($params);
    }

    /**
     * @param $code
     * @param $redirectUrl
     * @param $scopes
     * @return AccessToken
     */
    public function getAccessTokenFromServer($code,$redirectUrl,$scopes){
        $params['code'] = $code;
        $params['redirect_uri'] = urlencode($redirectUrl);
        $params['grant_type'] = 'authorization_code';
        $apiResult=$this->post($this->accessTokenUrl,$params);
        $data=$apiResult->getData();
        $this->setAccessToken(new AccessToken($data,$scopes));
        return $this->getAccessToken();
    }

}

