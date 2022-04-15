<?php

declare(strict_types=1);
class Robot {
    const
        DIRECTION_NORTH = [  0,  1 ],
        DIRECTION_EAST  = [  1,  0 ],
        DIRECTION_SOUTH = [  0, -1 ],
        DIRECTION_WEST  = [ -1,  0 ];
    public
        $position,
        $direction;
    // ini konstruktor
    public function __construct(array $position, array $direction) {
        assert(count($position) == 2);
        $this->position = $position;
        $this->direction = $direction;
    }
    public function turnRight(): Robot {
        [$x, $y] = $this->direction;
        $this->direction = [$y, -$x];
        return $this;
    }
    public function turnLeft(): Robot {
        [$x, $y] = $this->direction;
        $this->direction = [-$y, $x];
        return $this;
    }
    public function advance(): Robot {
        $this->position[0] += $this->direction[0];
        $this->position[1] += $this->direction[1];
        return $this;
    }
    public function instructions(string $steps): Robot {
        if (!preg_match('/^[LRA]*$/', $steps)) {
            throw new InvalidArgumentException('Instruction set must only contains L, R or A.');
        }
        for ($i = 0; $i < strlen($steps); $i++) {
            switch ($steps[$i]) {
            case 'L': $this->turnLeft(); break;
            case 'R': $this->turnRight(); break;
            case 'A': $this->advance(); break;
            }
        }
        return $this;
    }
}
 ?>
