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


    /**
     * 
     * @param string $forumName
     * @return string The cekln 
     */
    public static function convertToURLFriendly($str)
    {
        // Transliterate non-ASCII characters to ASCII
        $transliterator = Transliterator::create('Any-Latin; Latin-ASCII; [\u0080-\u7fff] remove');
        $str = $transliterator->transliterate($str);

        // Convert to lowercase
        $str = mb_strtolower($str, 'UTF-8');

        // Remove special characters and non-URL-friendly characters
        $str = preg_replace('/[^a-z0-9\-]/', '', $str);

        // Replace spaces with dashes
        $str = str_replace(' ', '-', $str);

        return $str;
    }
}
