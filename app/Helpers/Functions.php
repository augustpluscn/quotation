<?php

function getDd()
{
    $path = base_path();
    $path .= "/public/dd.json";
    $json_string = file_get_contents($path);
    $data = json_decode($json_string, true);
    return (object) $data;
}
