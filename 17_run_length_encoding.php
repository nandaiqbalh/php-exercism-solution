<?php

declare(strict_types=1);
function encode(string $input): string
{
    if ($input === '') {
        return '';
    }
    $c = null;
    $f = 0;
    $rle = '';
    $i = 0;
    while (true) {
        $char = $input[$i++] ?? null;
        if ($c === $char) {
            continue;
        }
        if ($c !== null) {
            $r = $i - $f; // Repeats...
            $rle .= ($r > 1 ? $r : '') . $c;
            if ($char === null) {
                break;
            }
        }
        $c = $char;
        $f = $i; // First occurence.
    }
    return $rle;
}
function decode(string $input): string
{
    if ($input === '') {
        return '';
    }
    $n = $decoded = '';
    $i = 0;
    while (true) {
        $char = $input[$i++] ?? null;
        if (ctype_digit($char)) {
            $n .= $char;
        } elseif ($char !== null) {
            $decoded .= str_repeat($char, $n !== '' ? (int) $n : 1);
            $n = '';
        } else {
            break;
        }
    }
    return $decoded;
}
 ?>
