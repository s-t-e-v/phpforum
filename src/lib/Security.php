<?php
/*
 * @Author: Steven Bandaogo 
 * @Email: steven@sbandaogo.com
 * @Date: 2023-09-07 22:21:22 
 * @Last Modified by: Steven Bandaogo
 * @Last Modified time: 2023-09-07 22:23:45
 * @Description: Security methods
 */

class Security
{

    /**
     * Checks wether the entered password is valid or not
     * @param string $candidate The password
     * @return bool True if valid, False otherwise
     */
    protected static function valid_pass($candidate): bool
    {
        $r1 = '/[A-Z]/';  //Uppercase
        $r2 = '/[a-z]/';  //lowercase
        $r3 = '/[!@#$%^&*()\-_=+{};:,<.>]/';  // whatever you mean by 'special char'
        $r4 = '/[0-9]/';  //numbers

        if (preg_match_all($r1, $candidate, $o) < 1) return FALSE;

        if (preg_match_all($r2, $candidate, $o) < 1) return FALSE;

        if (preg_match_all($r3, $candidate, $o) < 1) return FALSE;

        if (preg_match_all($r4, $candidate, $o) < 1) return FALSE;

        if (strlen($candidate) < 7) return FALSE;

        return TRUE;
    }

    /**
     * Checks wether the image is valid or not
     * @return bool True if valid, False otherwise
     */
    protected static function valid_image(): bool
    {
        return (($_FILES['pp']['type'] == 'image/jpeg' ||
            $_FILES['pp']['type'] == 'image/png' ||
            $_FILES['pp']['type'] == 'image/webp' ||
            $_FILES['pp']['type'] == 'image/gif')  &&
            $_FILES['pp']['size'] < 3000000);
    }
}
