<?php

//This were player fight
class Board
{

    public function fight ($deck)
    {
        $p1_count = 0;
        $p2_count = 0;
        for ($i = 0; $i < 26; $i++) {
            if ($deck[0][$i] < $deck[1][$i]) {

                echo "Player 2 Have higher. Cards: P1: " . $deck[0][$i] ." P2: " .$deck[1][$i] ."\n";
                $p2_count++;
            }elseif ($deck[0][$i] > $deck[1][$i]) {
                echo "Player 1 Have higher. Cards: P1 " . $deck[1][$i] ." P2: " .$deck[0][$i] ."\n";
                $p1_count++;
            }elseif ($deck[0][$i] == $deck[1][$i]){
                echo "It's a tie!"."\n";
            }
            sleep(1);
        }
        echo "Score: " . $p1_count ." vs " .$p2_count ."\n";
        if($p1_count < $p2_count){
            echo "Player 1 Won!" ."\n";
        }elseif ($p2_count == $p1_count){
            echo "It's a Tie!" ."\n";
        }else{
            echo "Player 2 Won!" ."\n";
        }

    }

}