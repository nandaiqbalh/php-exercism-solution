<?php

function isValid($str)
{
    $sum = 0;
    $str = strrev(preg_replace('/\s/', '', $str));
    if (strlen($str) < 2 || preg_match('/\D/', $str)) {
        return false;
    }

    for ($i = 0; $i < strlen($str); $i++) {
        if ($i % 2 != 0) {
            $sum += $str[$i] > 4 ? $str[$i] * 2 - 9 : $str[$i] * 2;
        } else {
            $sum += $str[$i];
        }
    }
    return $sum % 10 == 0;
}
