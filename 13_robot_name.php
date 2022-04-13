<?php

class Robot
{
    private ?string $name;
    private static array $names = [];
    private function generateName(): string
    {
        $availableCharacters = range('A', 'Z');
        $lastIndex = array_key_last($availableCharacters);
        do {
            $this->name = $availableCharacters[random_int(0, $lastIndex)] .
                $availableCharacters[random_int(0, $lastIndex)] .
                random_int(0, 9) .
                random_int(0, 9) .
                random_int(0, 9);
        } while (array_key_exists($this->name, self::$names));
        self::$names[$this->name] = null;
        return $this->name;
    }
    public function getName(): string
    {
        return $this->name ?? $this->generateName();
    }
    public function reset(): void
    {
        $this->name = null;
    }
}
