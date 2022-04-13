<?php

class Bob
{
    public function respondTo($_message)
    {
        // mengambil masukan dari user dengan trim agar menghapus spacing yg tidak diperlukan
        $message = trim($_message);
        // Bob answers 'Sure.' if you ask him a question.
        if (strpos($message, '?') == strlen($message) - 1) {
            // He answers 'Calm down, I know what I'm doing!' if you yell a question at him.
            if (preg_match_all("/^[A-Z? ,]+$/", $message)) {
                return 'Calm down, I know what I\'m doing!';
            }
            return 'Sure.';
        }
        // He answers 'Whoa, chill out!' if you yell at him.
        if (ctype_upper(str_replace(' ', '', $message))) {
            return 'Whoa, chill out!';
        }
        if (strpos($message, '!')) {
            if (preg_match("/^[A-Z1-3!%^*@#$(*^ ,]+$/", $message)) {
                return 'Whoa, chill out!';
            }
        }
        // He says 'Fine. Be that way!' if you address him without actually saying anything.
        if (strlen($message) === 0) {
            return "Fine. Be that way!";
        }
        // He answers 'Whatever.' to anything else.
        return 'Whatever.';
    }
}
