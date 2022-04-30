<?php
function rebase(int $from, array $input, int $to): ?array
{
    if ($from < 2 || $to < 2) {
        return null;
    }
    if (! $input || $input[0] === 0 || min($input) < 0 || max($input) >= $from) {
        return null;
    }
    $base = 0;
    foreach (array_reverse($input) as $key => $value) {
        $base += $value * ($from ** $key);
    }
    while ($base >= $to) {
        $digits[] = $base % $to;
        $base /= $to;
    }
    $digits[] = (int) $base;
    return array_reverse($digits);
}