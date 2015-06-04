<?php
/**

 * @copyright  Copyright (c) 2015 Souq.com. All rights reserved.
 * @author     Mohamad Jazaery(mjazaery@souq.com), created on 6/04/15
 * @package    SouqAPI
 * @version    1.0
 */
namespace SouqAPI\Utils\Exception;

class BaseException extends \Exception
{

    /**
     * @var \Exception
     */
    protected $parentEx;

    /**
     * @param string $message
     * @param int $code
     * @param \Exception $parentEx
     */
    public function __construct($message, $code, $parentEx = null)
    {
        $this->message = $message;
        $this->code = $code;
        $this->parentEx = $parentEx;
    }


    /**
     * @return \Exception
     */
    public function getParentException()
    {
        return $this->parentEx;
    }
}