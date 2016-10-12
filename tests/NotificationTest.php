<?php

use Mockery as m;
use App\Console\Commands\Notify;
use App\Notifications\RegistrationCompleted;
use Illuminate\Support\Facades\Notification;

class NotificationTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->faker = Faker\Factory::create();
        $this->userModel = m::mock('App\User');
        $this->command = new Notify($this->userModel);
    }

    public function testItCanSendNotificationToSingleUser()
    {
        $this->userModel->shouldReceive('newInstance')
            ->once()
            ->andReturnSelf();
        $this->userModel->shouldReceive('notify')
            ->once()
            ->andReturnSelf();

        $response = $this->command->sendToUser();

        $this->assertNull($response);
    }

    public function testItCanSendNotificationToManyUsers()
    {
        $this->markTestSkipped(
            "Won't work for multiple notifications yet. PR outstanding: https://github.com/laravel/framework/pull/15804"
        );
        $times = rand(2, 10);
        Notification::fake();

        $collection = collect([$this->userModel]);

        $user = [
            'name' => $this->faker->name(),
            'email' => env('RECIPIENT_EMAIL', $this->faker->safeEmail()),
        ];

        $this->userModel->shouldReceive('newInstance')
            ->times($times)
            ->andReturnSelf();
        $this->userModel->shouldReceive('toArray')
            ->times($times)
            ->andReturn($user);
        $this->userModel->shouldReceive('hydrate')
            ->once()
            ->andReturn($collection);

        $response = $this->command->sendToManyUsers($times);

        Notification::assertSentTo(
            $collection, RegistrationCompleted::class
        );

        $this->assertNull($response);
    }
}
