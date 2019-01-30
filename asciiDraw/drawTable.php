<?php
//faker data
require "fakerFactory.php";

$data = fakerGenerate(10);
const Line_corner = "+";
const Line_endline = PHP_EOL;
const Line_row_end = "|";
function maxHeadLengths ($data)
{
    $head = [];
    foreach (array_keys($data[0]) as $key) {
        $lengths = strlen($key);
        array_push($head, $lengths);
    }
    return $head;
}

function maxDataLengths ($data)
{
    $head = maxHeadLengths($data);
    $maxData = [];
    foreach (array_keys($data[0]) as $array_key) {
        $lengths = array_map('strlen', array_column($data, $array_key));
        array_push($maxData, max($lengths));
    }
    //data length compare to data names
    for ($i = 0; $i < sizeof($maxData); $i++) {
        if ($maxData[$i] < $head[$i]) {
            $maxData[$i] = $head[$i];
        }
    }
    return $maxData;
}

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


function DrawEverything($data){
    drawSeparationLines($data);
    drawTypes($data);
    drawSeparationLines($data);
    drawAllData($data);
    drawSeparationLines($data);
}

DrawEverything($data);