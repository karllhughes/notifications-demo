<?php

namespace App\Console\Commands;

use App\Notifications\RegistrationCompleted;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class Notify extends Command
{
    public $data;

    public $user;

    protected $signature = 'notify {number}';

    protected $description = 'Demonstrates the notifications in Laravel';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
        $this->faker = \Faker\Factory::create();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->data = $this->emailData();
        if ($this->argument('number') == 1) {
            $this->info("Sending notification to single user");
            $this->sendToUser();
        } elseif ($this->argument('number') > 1) {
            $this->info("Sending notification to multiple users");
            $this->sendToManyUsers($this->argument('number'));
        } else {
            $this->info("No notifications sent. Please specify number of users.");
        }
    }

    public function sendToUser()
    {
        // Instantiate a new user object
        $user = $this->user->newInstance([
            'name' => $this->faker->name(),
            'email' => env('RECIPIENT_EMAIL', $this->faker->safeEmail()),
        ]);

        // Send our mail
        $user->notify(new RegistrationCompleted($this->data));
    }

    public function sendToManyUsers($number = 2)
    {
        // Create a collection of 5 user objects
        $users = $this->user->hydrate(
            array_map(function($index) {
                return $this->user->newInstance([
                    'name' => $this->faker->name(),
                    'email' => env('RECIPIENT_EMAIL', $this->faker->safeEmail()),
                ])->toArray();
            }, array_fill(1, $number, null))
        );

        // Send our mail
        Notification::send($users, new RegistrationCompleted($this->data));
    }

    private function emailData()
    {
        return [
            'from' => [
                'first_name' => $this->faker->firstName(),
                'company' => $this->faker->company(),
                'email' => $this->faker->email(),
                'address' => $this->faker->address(),
            ],
            'link' => [
                'url' => $this->faker->url(),
                'text' => $this->faker->sentence(),
            ],
        ];
    }
}
