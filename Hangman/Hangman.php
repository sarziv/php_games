<?php

require("Word.php");

class Hangman extends Word
{
    public function __construct()
    {
        echo "Let's play Hangman!".PHP_EOL;
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
        echo $word = $this->wordToGuess().PHP_EOL;
        print_r($chars = $this->splitWord($word));
        echo $hidden = $this->hideLetter($word).PHP_EOL;

        while(!sizeof($chars) == 0){
            echo "Enter letter: " .PHP_EOL;
            $input = readline();
            echo "Guessing: ".$input.PHP_EOL;
            if(in_array($input,$chars)){
                echo 'Found!';
            }else{
                echo 'Not found';
            }
        }

    }

}

$test = new Hangman();
echo $test->HangmanLogic();
