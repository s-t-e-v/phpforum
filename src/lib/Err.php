<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-15 00:21:02 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-15 01:59:58
 * @Description: Exception with exception type.
 */

class Err extends Exception
{
    private $errorType;

    public function __construct($message, $errorType = 'fatal', $code = 0, Throwable $previous = null)
    {
        $this->errorType = $errorType;
        parent::__construct($message, $code, $previous);
    }

    public function getErrorType()
    {
        return $this->errorType;
    }
}
