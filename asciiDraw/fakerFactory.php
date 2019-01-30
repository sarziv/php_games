<?php
require_once 'vendor/fzaninotto/faker/src/autoload.php';
//https://github.com/fzaninotto/Faker
//composer require fzaninotto/faker

function fakerGenerate ($size)
{
    $faker = Faker\Factory::create();

    //Data list
    $data = [];

    for ($i = 0; $i < $size; $i++) {
        array_push($data, $new = [
            'name' => $faker->name,
            'email' => $faker->email,
            'state' => $faker->state,
            'phoneNumber' => $faker->phoneNumber,
            'randomDigit' => $faker->randomDigit,
        ]);
    }
    return $data;
}






