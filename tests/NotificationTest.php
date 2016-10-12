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
        $times = rand(2, 10);
        Notification::fake();

        $collection = m::mock('Illuminate\Database\Eloquent\Collection');

        $this->userModel->shouldReceive('newInstance')
            ->times($times)
            ->andReturn($this->userModel);
        $this->userModel->shouldReceive('hydrate')
            ->once()
            ->andReturn($collection);
        $collection->shouldReceive('getKey')
            ->times($times)
            ->andReturn(uniqid());

        Notification::assertSentTo(
            $collection, RegistrationCompleted::class
        );

        $response = $this->command->sendToUser();

        $this->assertNull($response);
    }
}
