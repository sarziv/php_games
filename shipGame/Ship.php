<?php

require ("Generate.php");

class Ship extends Generate
{

    public function player_grid (array $data,$type)
    {
        $grid = array(
            array(0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0),
        );
        if($type == 1){
            foreach ($data as $loc) {
                $grid[$loc[0]][$loc[1]] = 1;
            }
        }elseif ($type == 2){
            foreach ($data as $loc) {
                $grid[$loc[0]][$loc[1]] = 2;
            }
        }

        echo "---------" . "\n";
        foreach ($grid as $grid_line) {
            foreach ($grid_line as $value) {
                if ($value == 1) {
                    echo "\033[32mS\033[0m";
                }elseif ($value == 2) {
                    echo "\033[32mX\033[0m";
                }else {
                    echo $value;
                }
            }
            echo "\n";
        }
        echo "---------" . "\n";
        return $grid;
    }

    public function array_find ($array, $search)
    {
        $ans = true;
        foreach ($array as $key) {
                if(in_array($search,$key)){
                    $ans = false;
                }
        }
        return $ans;
    }

    public function ship_shoot (array $data)
    {
        $count = 0;
        $grid = $this->player_grid($data,1);
        $arr = array();
        $shots = array();

        while ($sink=$this->array_find($grid, 1) != true){
            echo "Shoot the ship" . "\n";
            echo "Location: X and Y " . "\n";
            for ($i = 0; $i < 2; $i++) {
                $arr[$i] = readline();
                if($arr[$i] > 8){
                    echo "\033[31mIt's from 0 to 8 grid\033[0m\n";
                    $i--;
                }
            }
            array_push($shots, $arr);
            echo "Spot to shoot: " . "$arr[0]" . " " . "$arr[1]" . "\n";
            if ($grid[$arr[0]][$arr[1]] == 1) {
                echo "\033[31mYou Shot me\033[0m\n";
                $grid[$arr[0]][$arr[1]] = 2;
                $count++;
            }else{
                echo "Miss!" . "\n";
                $grid[$arr[0]][$arr[1]] = 2;
                $count++;
            }
            $this->player_grid($shots,2);
        }
        echo "\e[1;37;41mYOU WINNER!\e[0m\n";
        echo "You made: " . "\033[32m$count\033[0m" . " hits.";
    }

}


$player_enemy = new Ship();
$gen = new Generate();

echo "Enemy grid\n";
$player_enemy->ship_shoot($gen->random_array(8));
//$player_enemy->ship_shoot(array(array(0, 1)));
//$player_enemy->ship_shoot(array((array(0, 1)), array(1, 4), array(1, 1)));

