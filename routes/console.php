<?php

use App\Mail\RegistrationCompleted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

Artisan::command('mail', function () {

    // Using faker for some faux data
    $faker = Faker\Factory::create();

    // This is the data for our Mailer
    $data = [
        'to' => [
            'first_name' => $faker->firstName(),
            'email' => 'khughes.me@gmail.com',
        ],
        'from' => [
            'first_name' => $faker->firstName(),
            'company' => $faker->company(),
            'email' => $faker->email(),
            'address' => $faker->address(),
        ],
        'link' => [
            'url' => $faker->url(),
            'text' => $faker->sentence(),
        ],
    ];

    // Send our mail
    Mail::send(new RegistrationCompleted($data));
});
