<?php

use App\Mail\RegistrationCompleted as Email;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

Artisan::command('mail', function () {

    // This is the data for our Mailer
    $data = [
        'to' => [
            'first_name' => $faker->firstName(),
            'email' => env('RECIPIENT_EMAIL', $faker->safeEmail()),
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
    Mail::send(new Email($data));
});