<?php


class Word
{
    private function wordArray()
    {
        //Reading a word array from file
        $wordArray = array(file('wordlist.txt'));
        return $wordArray[0];
    }

    private function randomNumber()
    {
        $size = sizeof($this->wordArray());
        $randomNumber = rand(0, $size);
        $this->wordArray();
        return $randomNumber;
    }

    public function wordToGuess()
    {
        $list = $this->wordArray();
        $number = $this->randomNumber();
        return $list[$number];
    }

}