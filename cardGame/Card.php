<?php
//Card WAR
require ("Board.php");

class Card extends Board
{

    public function deck_split ()
    {
        //split deck in half
        $shuffled_deck = $this->deck_shuffled();
        $split=array_chunk($shuffled_deck, 26);
            return $split;
    }


    private function deck_shuffled ()
    {
        //shuffle the deck
        $shuffled_deck= $this->standard_deck();
        shuffle($shuffled_deck);
        return $shuffled_deck;
    }

    private function standard_deck ()
    {
        // Deck of 52 standard cards.
        //just a simple array without any type. Type does not matter at WAR.
        $deck = array(
            2, 2, 2, 2,
            3, 3, 3, 3,
            4, 4, 4, 4,
            5, 5, 5, 5,
            6, 6, 6, 6,
            7, 7, 7, 7,
            8, 8, 8, 8,
            9, 9, 9, 9,
            10, 10, 10, 10,
            11, 11, 11, 11,//Jack
            12, 12, 12, 12,//Queen
            13, 13, 13, 13,//King
            13, 13, 13, 13,//Ace

            /*"Jack", "Jack", "Jack", "Jack",
           "Queen", "Queen", "Queen", "Queen",
           "King", "King", "King", "King",
           "Ace", "Ace", "Ace", "Ace",*/
        );
        return $deck;
    }

}

$newDeck = new Card();
$board= new Card();

$board->fight($newDeck->deck_split());