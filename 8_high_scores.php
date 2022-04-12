<?php

declare(strict_types=1);

class HighScores
{
    // membuat properties untuk menampung nilai
    public int $latest;
    public int $personalBest;
    /** @var int[] */
    public array $personalTopThree;

    // contructor
    public function __construct(public array $scores)
    {
        $this->latest = end($this->scores);
        $this->personalBest = max($this->scores);
        rsort($scores);
        $this->personalTopThree = array_slice($scores, 0, 3);
    }
}
