<?php

use App\Mail\RegistrationCompleted as Email;
use App\Notifications\RegistrationCompleted as NotificationObject;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

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

Artisan::command('notify', function () {

    // Using faker for some faux data
    $faker = Faker\Factory::create();

    // Instantiate a new user object
    $user = new User([
        'name' => $faker->name(),
        'email' => env('RECIPIENT_EMAIL', $faker->safeEmail()),
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
    $user->notify(new NotificationObject($data));
});

Artisan::command('notify-trait', function () {

    // Using faker for some faux data
    $faker = Faker\Factory::create();

    // Create a collection of 5 user objects
    $users = new Collection(
        array_map(function($index) use ($faker) {
            return new User([
                'name' => $faker->name(),
                'email' => env('RECIPIENT_EMAIL', $faker->safeEmail()),
            ]);
        }, array_fill(1, 5, null))
    );

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
    Notification::send($users, new NotificationObject($data));
});