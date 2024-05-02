<?php

namespace Tests\Feature;

use App\Models\Quote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test if the requested_amount goes up by 1.
     */
    public function test_the_count_of_existing_quotes (): void
    {
        Quote::factory()->count(20)->make();

        //todo: get one quote, use upsert job and check if amount is +1
    }

}
