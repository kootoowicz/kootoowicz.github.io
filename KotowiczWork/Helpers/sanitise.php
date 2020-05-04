<?php
/**
 * Author: Kotowicz 17018747
 */
function escape($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}