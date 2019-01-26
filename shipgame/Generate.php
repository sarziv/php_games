<?php

class Generate{

    public function random_array($size){
        $randomArray = array();
        for ($i = 0; $i < $size; $i++) {
            $generated = array(rand(0,8),rand(0,8));
            array_push($randomArray,$generated);
        }
        return $randomArray;
    }

}