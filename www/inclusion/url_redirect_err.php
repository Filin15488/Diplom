<?php
function url_redirect (array $arr, string $parent_url)
{
    $url = "Location: ./". $parent_url .  "?";
    foreach ($arr as $key=>$value)
    {
        if ($key != array_key_last($arr)){
            $url .= $value . "=1&";
        }
        else{
            $url .= $value . "=1";
        }
    }
    return $url;

}