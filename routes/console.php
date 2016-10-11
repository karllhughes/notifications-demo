<?php

use App\Mail\RegistrationCompleted as Email;
use App\Notifications\RegistrationCompleted as Notification;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

Artisan::command('mail', function () {

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
    Mail::send(new Email($data));
});

Artisan::command('notify', function () {

    // Using faker for some faux data
    $faker = Faker\Factory::create();

    // Instantiate a new user object
    $user = new User([
        'name' => $faker->name(),
        'email' => 'khughes.me@gmail.com',
    ]);

    $data = [
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
    $user->notify(new Notification($data));
});
