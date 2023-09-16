<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-15 00:21:02 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-15 01:59:58
 * @Description: Exception with errotype and error utility functions. 
 */

class Err extends Exception
{
    private $errorType;
    private $userMessage;

    const NOTICE = 0;
    const SERIOUS = 1;
    const CRITICAL = 2;

    public function __construct($message, $errorType = self::SERIOUS, $code = 0, Throwable $previous = null)
    {
        $this->errorType = $errorType;
        $this->userMessage = $message;
        parent::__construct($message, $code, $previous);
    }

    public function setUserMessage($userMessage)
    {
        $this->userMessage = $userMessage;
    }

    public function getUserMessage()
    {
        return $this->userMessage;
    }

    public function isCriticalError()
    {
        return ($this->errorType == self::CRITICAL);
    }

    public function isSeriousError()
    {
        return ($this->errorType == self::SERIOUS);
    }
    /**
     * Report the error by an error message display on the screen 
     * (only in development) and an error log.
     * 
     * @param Exception $e the caught exception
     */
    public static function err_report(Exception $e)
    {
        // Check the PHP.ini configuration for error display
        if (ini_get('display_errors') && $e) {
            $_SESSION['debug'] = $e;
        }
        // Log the error
        error_log('Exception: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
    }
}
