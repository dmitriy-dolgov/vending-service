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

    public static function handlePostUri(&$query, $name)
    {
        if (!empty($_POST[$name]) && $_POST[$name] != '') {
            $query[$name] = $_POST[$name];
        } else {
            unset($query[$name]);
        }
    }

    public static function uriPost2Query(&$query)
    {
        foreach ($_POST as $name => $val) {
            self::handlePostUri($query, $name);
        }
    }
}
