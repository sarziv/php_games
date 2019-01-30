<?php
//faker data
require "fakerFactory.php";

$data = fakerGenerate(10);

//constants
const Line_corner = "+";
const Line_endline = PHP_EOL;
const Line_row_end = "|";


//data types length name, email ,etc.
function maxHeadLengths ($data)
{
    $head = [];
    foreach (array_keys($data[0]) as $key) {
        $lengths = strlen($key);
        array_push($head, $lengths);
    }
    return $head;
}

//max for each name, email , etc.
function maxDataLengths ($data)
{
    $head = maxHeadLengths($data);
    $maxData = [];
    foreach (array_keys($data[0]) as $array_key) {
        $lengths = array_map('strlen', array_column($data, $array_key));
        array_push($maxData, max($lengths));
    }
    //data all length compare to data types
    for ($i = 0; $i < sizeof($maxData); $i++) {
        if ($maxData[$i] < $head[$i]) {
            $maxData[$i] = $head[$i];
        }
    }
    return $maxData;
}
//draw +------------+ top and bottom, middle
function drawSeparationLines($data){
//Top Line
    $max = maxDataLengths($data);
    echo Line_corner;
    foreach ($max as $value) {
        echo str_repeat("-", $value+3) ;
    }
    echo Line_corner . Line_endline;
    //Top Line end
}

//draw name, email, etc. lines.
function drawTypes ($data)
{
    $max = maxDataLengths($data);
    //Data type
     $i=0;
    foreach (array_keys($data[0]) as $key) {
        echo "| " . $key . str_repeat(" ",($max[$i]-strlen($key))). " ";
        $i++;
    }
    echo " ". Line_row_end . Line_endline;
}
//draw all data names, email, etc.
function drawAllData($data){

    $max = maxDataLengths($data);
    //Data type

    for ($k=0;sizeof($data) > $k;$k++) {
        $i=0;
        foreach ($data[$k] as $key) {
            echo "| " . $key . str_repeat(" ", ($max[$i] - (strlen($key)))) . " ";
            $i++;
        }
        echo " " . Line_row_end . Line_endline;
    }
}

//order of everything
function DrawEverything($data){
    drawSeparationLines($data);
    drawTypes($data);
    drawSeparationLines($data);
    drawAllData($data);
    drawSeparationLines($data);
}
//this function getting called here.
DrawEverything($data);