<?php

function parse_binary(string $binary): int
{
    $chars   = array_reverse(str_split($binary));
    $decimal = 0;
    foreach ($chars as $index => $char) {
        if ($char !== '1' && $char !== '0') {
            throw new InvalidArgumentException("'${char}' is not a valid binary value");
        }
        $decimal += $char * (2 ** $index);
    }
    return $decimal;
}