<?php
/**

 * @copyright  Copyright (c) 2015 Souq.com. All rights reserved.
 * @author     Mohamad Jazaery(mjazaery@souq.com), created on 6/04/15
 * @package    SouqAPI
 * @version    1.0
 */
namespace SouqAPI;

class SouqAPIResult
{


    private $status = 200;
    private $message;
    private $data;
    private $callResult;

    //const
    Const MESSAGE='message';

    public function __construct($response_code,$CallResult){
        $this->status = is_numeric($response_code)? (int)$response_code : 500;
        $this->callResult = $CallResult;

        $this->data = "";
        if (isset($this->callResult['data']))
            $this->data = $this->callResult['data'];
        if (isset($this->callResult['meta']) &&
            isset($this->callResult['meta'][SouqAPIConnection::KEY_MESSAGE]))
            $this->message = $this->callResult['meta'][SouqAPIConnection::KEY_MESSAGE];
    }

    public function getStatus(){
        return $this->status;
    }

    public function isResponseOK()
    {
        $ok_codes=array(200,201,202);

        if ( in_array( $this->status , $ok_codes ) ){
            return true;
        }
        return false;

    }

    public function isAuthenticationFailed()
    {
        // Forbidden Access
        if( $this->status == 403 ) {
            return true;
        }
        return false;
    }

    public function isExpiredTokenResponse()
    {
        if( $this->status == 401) {
            return true;
        }
        return false;
    }

    public function getMessage(){
        return $this->message;
    }

    public function getData(){
        return $this->data;
    }

    public function getCallResult(){
        return $this->callResult;
    }


}