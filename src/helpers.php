<?php

/**
 * @param $array
 * @param $current
 * @return mixed|null
 */
function guessNextElementOnArray($array, $current)
{
    $currentKey = array_search($current, $array);

    if ($currentKey === false)
        return null;

    return array_key_exists($currentKey + 1, $array) ? $array[$currentKey + 1] : $array[0];
}

/**
 * dump and die in a single place
 * useful for debugging
 * @param $var
 * @return void
 */
function dd($var)
{
    var_dump($var);
    die();
}