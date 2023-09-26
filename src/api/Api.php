<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-26 20:18:19 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-26 20:48:44
 * @Description: Api endpoints
 */


class Api
{
    public static function get_forums()
    {
        // get all forums
        $forums = Forum::findAll();

        // output the forums as JSON
        header('Content-Type: application/json');
        echo json_encode($forums);
    }
}
