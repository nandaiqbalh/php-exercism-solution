<?php

declare(strict_types=1);
function squareOfSum(int $limit) {
    $sum = 0;
    foreach (range(0, $limit) as $number) {
        $sum += $number;
    }
    return pow($sum, 2);
}
function sumOfSquares(int $limit) {
    $sum = 0;
    foreach (range(0, $limit) as $number) {
        $sum += pow($number, 2);
    }
    return $sum;
}
function difference(int $limit) {
    return squareOfSum($limit) - sumOfSquares($limit);
}
 ?>
