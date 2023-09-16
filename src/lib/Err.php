<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-15 00:21:02 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-15 01:59:58
 * @Description: error utility functions. 
 */

class Err
{
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
