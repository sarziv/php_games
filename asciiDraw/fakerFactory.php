<?php

//https://github.com/fzaninotto/Faker
//composer require fzaninotto/faker

function fakerGenerate ($size)
{
    require_once 'vendor/fzaninotto/faker/src/autoload.php';
    $faker = Faker\Factory::create();

    //Data list
    $data = [];

    for ($i = 0; $i < $size; $i++) {
        array_push($data, $new = [
            'name' => $faker->name,
            'email' => $faker->email,
            'state' => $faker->state,
        ]);
    }
    return $data;
}






