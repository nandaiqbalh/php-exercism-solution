<?php

function encode($word)
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $alp_len = strlen($alphabet);
    $arr = [];
    $word = strtolower($word);
    $arr_str = str_split($word);
    foreach ($arr_str as $val) {
        for ($i = 0; $i < $alp_len; $i++) {
            if ($val == $alphabet[$i]) {
                $arr[] = substr($alphabet, - ($i + 1), 1);
            } elseif (is_numeric($val)) {
                $arr[] = $val;
                break;
            }
        }
    }
    $arr = array_chunk($arr, 5);
    $new = [];
    for ($i = 0; $i < count($arr); $i++) {
        $new[] = join('', $arr[$i]);
    }
    $res = join(' ', $new);
    return $res;
}