<?php

class BeerSong {
    public function lyrics(): string
    {
        return $this->verses(99, 0);
    }
    public function verses(int $start, int $end): string
    {
        assert($start > -1, '$start must be positive');
        assert($end > -1, '$end must be positive');
        assert($start < $end, '$start must be greater than $end');
        $nums = range($start, $end, -1);
        ob_start();
        foreach ($nums as $index => $num) {
            echo $this->verse($num);
            if ($index != count($nums) - 1) {
                echo "\n";
            }
        }
        return ob_get_clean();
    }
    public function verse(int $num): string
    {
        assert($num, '$num must be positive');
        switch ($num) {
        case 0:
            return "No more bottles of beer on the wall, no more bottles of beer.\n"
                 . "Go to the store and buy some more, 99 bottles of beer on the wall.";
            break;
        case 1:
            return "1 bottle of beer on the wall, 1 bottle of beer.\n"
                 . "Take it down and pass it around, no more bottles of beer on the wall.\n";
            break;
        case 2:
            return "2 bottles of beer on the wall, 2 bottles of beer.\n"
                 . "Take one down and pass it around, 1 bottle of beer on the wall.\n";
            break;
        default:
            return "$num bottles of beer on the wall, $num bottles of beer.\n"
                 . "Take one down and pass it around, " . ($num - 1) . " bottles of beer on the wall.\n";
        }
    }
}