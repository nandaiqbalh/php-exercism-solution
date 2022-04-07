<?php

declare(strict_types=1);
class Tournament
{
    // membuat constant untuk menyimpan string keadaan hasil pertandingan
    protected const WIN = 'win';
    protected const DRAW = 'draw';
    protected const LOSS = 'loss';
    // membuat array
    protected array $teams = [];
    // fungsi tally 
    public function tally(string $scores): string
    {
        $this->recordGames($scores);
        return $this->sortTeams()->renderTable();
    }
    // funsgi untuk membuat tampilan tabel
    protected function renderTable(): string
    {
        $table = new Table;
        $table->addRow(['Team', 'MP', 'W', 'D', 'L', 'P']);
        // looping untuk membuat row sesuai jumlah masukan teams
        foreach ($this->teams as $team => $games) {
            $table->addRow([
                $team,
                $games->played(),
                $games->wins(),
                $games->draws(),
                $games->losses(),
                $games->points(),
            ]);
        }
        return $table->render();
    }
    protected function recordGames(string $scores): void
    {
        if (empty($scores)) {
            return;
        }
        foreach (explode("\n", $scores) as $score) {
            [$a, $b, $result] = explode(';', $score);
            match ($result) {
                self::WIN => $this->win($a, $b),
                self::DRAW => $this->draw($a, $b),
                self::LOSS => $this->win($b, $a),
            };
        }
    }
    // fungsi untuk menentukan keadaan suatu hasil pertandingan (siapa yang menang siapa yang kalah)
    protected function win(string $a, string $b): void
    {
        $this->team($a)->win();
        $this->team($b)->lose();
    }
    protected function draw(string $a, string $b): void
    {
        $this->team($a)->draw();
        $this->team($b)->draw();
    }
    protected function team(string $name): Games
    {
        if (!isset($this->teams[$name])) {
            $this->teams[$name] = new Games;
        }
        return $this->teams[$name];
    }

    protected function sortTeams(): self
    {
        uksort($this->teams, function ($a, $b): int {
            if ($this->team($a)->points() === $this->team($b)->points()) {
                return strcasecmp($a, $b);
            }
            return ($this->team($a)->points() < $this->team($b)->points()) ? 1 : -1;
        });
        return $this;
    }
}
class Table
{
    protected array $rows = [];
    public function addRow(array $data): void
    {
        $this->rows[] = $data;
    }
    public function render(): string
    {
        return implode("\n", array_map([$this, 'format'], $this->rows));
    }
    protected function format(array $row): string
    {
        return vsprintf("%-30s | %2s | %2s | %2s | %2s | %2s", $row);
    }
}
class Games
{
    protected const WIN = 3;
    protected const DRAW = 1;
    protected const LOSS = 0;
    protected $wins = 0;
    protected $draws = 0;
    protected $losses = 0;
    public function win(): int
    {
        return $this->wins++;
    }
    public function draw(): int
    {
        return $this->draws++;
    }
    public function lose(): int
    {
        return $this->losses++;
    }
    public function wins(): int
    {
        return $this->wins;
    }
    public function draws(): int
    {
        return $this->draws;
    }
    public function losses(): int
    {
        return $this->losses;
    }
    public function points(): int
    {
        return array_sum([
            $this->wins * self::WIN,
            $this->draws * self::DRAW,
            $this->losses * self::LOSS,
        ]);
    }
    public function played(): int
    {
        return array_sum([
            $this->wins,
            $this->draws,
            $this->losses,
        ]);
    }
}
