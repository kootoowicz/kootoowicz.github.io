<?php
/**
 * Author: Kotowicz 17018747
 */

class Input
{
    public static function get($item)
    {
        if(isset($_POST[$item]))
            return $_POST[$item];
        else if(isset($_GET[$item]))
            return $_GET[$item];

        return '';
    }
}