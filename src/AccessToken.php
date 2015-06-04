<?php
/**
 * @copyright  Copyright (c) 2015 Souq.com. All rights reserved.
 * @author     Mohamad Jazaery(mjazaery@souq.com), created on 6/04/15
 * @package    SouqAPI
 * @version    1.0
 */
namespace SouqAPI;

class AccessToken{
    /**
     * @var string
     */
    private $value;

    /**
     * @var int
     */
    private $customerId;

    /**
     * @var array
     */
    private $authorizedScopes;

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $expires_in;

    /**
     * @param array $tokenInfo
     * @param $authorizeScopes
     */
    public function __construct($tokenInfo,$authorizeScopes=array())
    {
        $this->value=$tokenInfo['access_token'];
        $this->customerId=$tokenInfo['customer_id'];
        if(isset($tokenInfo['type']))
            $this->type=$tokenInfo['type'];
        if(isset($tokenInfo['expires_in']))
            $this->expires_in=$tokenInfo['expires_in'];
        $this->setAuthorizedScopes($authorizeScopes);
    }

    public function getAccessTokenVal(){
        return $this->value;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed
     */
    public function setAuthorizedScopes($authorizedScopes)
    {
        if(!is_array($authorizedScopes) && !empty($authorizedScopes))
            $authorizedScopes=explode(',',$authorizedScopes);
        $this->authorizedScopes=$authorizedScopes;
    }

    /**
     * @return array
     */
    public function getAuthorizedScopes()
    {
        return $this->authorizedScopes;
    }

    /**
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @return int
     */
    public function getExpiresIn()
    {
        return $this->expires_in;
    }


}
