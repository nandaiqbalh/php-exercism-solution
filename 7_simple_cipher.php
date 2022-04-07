<?php

declare(strict_types=1);
class SimpleCipher
{
    private const ENCODE = 1;
    private const DECODE = -1;
    private const CHAR_A = 97;
    private const CHAR_Z = 122;
    private const RANDOM_KEY_LENGTH = 100;
    private const ALPHABET = [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
        'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
        'u', 'v', 'w', 'x', 'y', 'z'
    ];
    public ?string $key;
    public function __construct(?string $key = null)
    {
        $this->key = $key ?? $this->randomString(self::RANDOM_KEY_LENGTH);
        if (!preg_match('/^[a-z]+$/', $this->key)) {
            throw new InvalidArgumentException('invalid key');
        }
    }
    public function encode(string $plainText): string
    {
        return $this->convertText($plainText, self::ENCODE);
    }
    public function decode(string $cipherText): string
    {
        return $this->convertText($cipherText, self::DECODE);
    }
    private function convertText(string $text, int $direction): string
    {
        $value = '';
        foreach (str_split($text) as $index => $character) {
            $value .= $this->getShiftedValue($index, $character, $direction);
        }
        return $value;
    }
    private function getShiftedValue(int $index, string $character, int $direction): string
    {
        $key = str_split($this->key);
        $indexLookup = array_flip(self::ALPHABET);
        $distance = $indexLookup[$key[$index]] * $direction;
        $shift = $indexLookup[$character] + $distance;
        if ($shift < 0 || $shift >= count(self::ALPHABET)) {
            $shift += (count(self::ALPHABET) * -$direction);
        }
        return self::ALPHABET[$shift];
    }
    private function randomString(int $length): string
    {
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= chr(random_int(self::CHAR_A, self::CHAR_Z));
        }
        return $randomString;
    }
}
