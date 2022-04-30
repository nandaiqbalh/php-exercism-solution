<?php
function acronym($phrase) {
    $letters = array();
    $phrase = mb_ereg_replace('-', ' ', $phrase);
    $phrase = mb_ereg_replace('([a-z])([A-Z])', "\\1 \\2" , $phrase);
    $words = explode(' ', $phrase);
    if (count($words) > 1) {
        foreach ($words as $word) {
            $letters[] = mb_strtoupper(mb_substr($word, 0, 1));
        }
    }
    return join('', $letters);
}