<?php

namespace helpers;

class Html
{
    public static function encode($str)
    {
        return htmlspecialchars($str, ENT_QUOTES);
    }
}
