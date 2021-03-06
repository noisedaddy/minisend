<?php

namespace Tests\Feature;

use App\Jobs\ExampleJob;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testBusFake() {
        $this->withoutExceptionHandling();
        Bus::fake();
        $user = factory(User::class)->create();
        $this->get("/api/example/job");
        Bus::assertDispatched(ExampleJob::class, function ($job) use ($user){
            return $job->user->id = $user->id;
        });
    }

    public function testAPICovid(){

        $this->json('get', 'api/home')
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    'data' => [
                            'Cases',
                            'City',
                            'Country',
                            'CountryCode',
                            'Date',

                    ]
                ]
            );
    }

    public function testEvent(){

        Event::fake();
        Event::dispatch(Login::class);
        Event::assertDispatched(Login::class,function ($e) {
            return ($e);
        });

    }
}
