<?php

//https://github.com/fzaninotto/Faker
//composer require fzaninotto/faker

require_once 'vendor/fzaninotto/faker/src/autoload.php';
$faker = Faker\Factory::create();

//Size for generating the array
$size = 4;
//Data list
$data = [];


for ($i = 0; $i < $size; $i++) {
    array_push($data, $new = [
        'name' => $faker->name,
        'email' => $faker->email,
        'state' => $faker->state,
    ]);
}
//File output
file_put_contents(__DIR__ .'/testFiles/testData.txt', print_r($data,true),true);





