<?php

namespace helpers;

class Html
{
    public static function encode($str)
    {
        return htmlspecialchars($str, ENT_QUOTES);
    }

    public static function setGetValue($getVarName, $getVarValue)
    {
        $query = $_GET;
        $query[$getVarName] = $getVarValue;
        return $_SERVER['PHP_SELF'] . '?' . http_build_query($query);
    }
}
