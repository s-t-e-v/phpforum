<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-15 00:21:02 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-15 01:59:58
 * @Description: This file contains the Err class, which provides exception handling with error types and utility functions. 
 */

class Err extends Exception
{
    private $errorType;
    private $userMessage;

    // Constants to represent error types
    const ERROR_TYPE_NOTICE = 0;
    const ERROR_TYPE_SERIOUS = 1;
    const ERROR_TYPE_CRITICAL = 2;

    /**
     * Constructor for Err class.
     *
     * @param string     $message   The error message
     * @param int        $errorType The error type (default: self::ERROR_TYPE_SERIOUS)
     * @param int        $code      The error code (default: 0)
     * @param Throwable $previous  The previous exception (default: null)
     */
    public function __construct($message, $errorType = self::ERROR_TYPE_SERIOUS, $code = 0, Throwable $previous = null)
    {
        $this->errorType = $errorType;
        $this->userMessage = $message;
        parent::__construct($message, $code, $previous);
    }

    /**
     * Setter for userMessage property.
     *
     * @param string $userMessage The user message
     */
    public function setUserMessage($userMessage)
    {
        $this->userMessage = $userMessage;
    }

    /**
     * Getter for userMessage property.
     *
     * @return string The user message
     */
    public function getUserMessage()
    {
        return $this->userMessage;
    }

    /**
     * Check if the error is of critical type.
     *
     * @return bool True if the error is critical, false otherwise
     */
    public function isCriticalError()
    {
        return ($this->errorType == self::ERROR_TYPE_CRITICAL);
    }

    /**
     * Check if the error is of serious type.
     *
     * @return bool True if the error is serious, false otherwise
     */
    public function isSeriousError()
    {
        return ($this->errorType == self::ERROR_TYPE_SERIOUS);
    }

    /**
     * Report the error by displaying an error message on the screen
     * (only in development) and logging the error.
     *
     * @param Exception $e The caught exception
     */
    public static function reportError(Exception $e)
    {
        // Check the PHP.ini configuration for error display
        if (ini_get('display_errors') && $e) {
            $_SESSION['debug'] = $e;
        }
        // Log the error
        error_log('Exception: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
    }
}
