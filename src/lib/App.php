<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-14 15:38:44 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-20 21:39:10
 * @Description: Helper methods
 */

class App
{

    /**
     * Checks if the current page is the home page and returns the provided class name if true.
     *
     * This function checks the 'is_home_page' session variable. If it's set and true, 
     * the function returns the provided class name. Otherwise, it returns an empty string.
     *
     * @param string $class The class name to return if the current page is the home page.
     * @return string The class name if the current page is the home page, or an empty string otherwise.
     */
    public static function addClassIfHomePage($class): string
    {
        return (isset($_SESSION['is_home_page']) && $_SESSION['is_home_page']) ? $class : '';
    }
}
