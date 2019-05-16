<?php

require("Word.php");

class Hangman extends Word
{
    public function __construct()
    {
        echo "Let's play Hangman!" . PHP_EOL;
    }

    public function hideLetter($hide)
    {
        $size = strlen($hide) - 2;
        $hiddenletters = str_repeat('_', $size);
        return $hiddenletters;
    }

    public function splitWord($word)
    {
        $charList = str_split($word);
        array_pop($charList);
        array_pop($charList);
        return $charList;
    }


    public function HangmanLogic()
    {
        $lives = 5;
        $guessList = array();
        $word = $this->wordToGuess() . PHP_EOL;
        $chars = $this->splitWord($word);
        echo $hidden = $this->hideLetter($word) . PHP_EOL;


        while (strpos($hidden, '_') !== false) {
            if ($lives == 0) {
                echo 'Game over!'.PHP_EOL;
                echo 'Word was: '.$word;
                exit;
            }
            echo "Enter letter: " . PHP_EOL;
            $input = readline();
            if (in_array($input,$guessList)) {
                echo 'You guessed that letter: '. $input.PHP_EOL;
            } else {
                array_push($guessList, $input);
                echo "Guessing: " . $input . PHP_EOL;
                if (in_array($input, $chars)) {
                    echo 'Found!' . PHP_EOL;
                    $i = 0;
                    foreach ($chars as $guess) {
                        if ($guess == $input) {
                            $hidden[$i] = $input;
                        }
                        $i++;
                    }

                } else {
                    echo 'Not found ' . $lives . " lives left." . PHP_EOL;
                    $lives--;
                }
                echo $hidden . PHP_EOL;
            }
        }
        echo 'You won!';
    }

}

$test = new Hangman();
echo $test->HangmanLogic();
