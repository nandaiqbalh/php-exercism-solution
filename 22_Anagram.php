<?php


class Word {
    private string $word;
    private array $letters;
    public function __construct(string $word)
    {
        $this->word = mb_strtolower($word);
        $letters = mb_str_split($this->word);
        sort($letters);
        $this->letters = $letters;
    }
    public function isAnagram(Word $other): bool
    {
        return $this->word != $other->word && $this->letters == $other->letters;
    }
}
function detectAnagrams(string $target_word, array $candidates): array
{
    $word = new Word($target_word);
    return array_values(
        array_filter(
            $candidates,
            fn($c) => $word->isAnagram(new Word($c))
        )
    );
}