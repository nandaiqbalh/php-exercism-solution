<?php

declare(strict_types=1);
class Series {
    public function __construct($series) {
        $this->series = strval($series);
    }
    public function largestProduct($size) {
        $series_digits = strlen($this->series);
        // Check that the string contains only digits and no other character
        if (!preg_match('/^[0-9]*$/', $this->series)) {
            throw new InvalidArgumentException();
        }
        if ($size > $series_digits || $size < 0) {
            throw new InvalidArgumentException();
        }
        if (!$size || !$series_digits) {
            return 1;
        }
        $largest_product = 0;
        for ($i = 0; $i < ($series_digits - $size + 1); ++$i) {
            $current_product = 1;
            for ($j = 0; $j < $size; ++$j) {
                $current_product *= intval($this->series[$i + $j]);
            }
            if ($current_product > $largest_product) {
                $largest_product = $current_product;
            }
        }
        return $largest_product;
    }
}

 ?>
