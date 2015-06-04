<?php
/**
* @copyright  Copyright (c) 2015 Souq.com. All rights reserved.
 * @author     Mohamad Jazaery(mjazaery@souq.com), created on 6/04/15
 * @package    SouqAPI
 * @version    1.0
 */

namespace SouqAPI\Utils\Exception;

class SessionExpiredException extends BaseException
{
    /**
     * @param int $code
     * @param \Exception $parentEx
     */
    public function __construct($code,$parentEx = null)
    {
        parent::__construct("Session Expired!", $code, $parentEx);
    }
}