<?php

function isIsogram($string)
{
    // memformat masukan
    $string = str_replace('-', '', $string);
    $string = str_replace(' ', '', $string);

    // Searches subject for all matches
    preg_match_all('/./u', mb_strtolower($string), $letters);

    // menentukan return value
    return count(array_unique($letters[0])) == count($letters[0]);
}
