<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResponseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 404 response
     *
     * @return void
     */
    public function testNotFound()
    {
        $response = $this->get('/not-found-endpoint');

        $response
            ->assertStatus(404)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJson([
                'data' => null,
                'status' => 'fail',
                'message' => 'Not found'
            ], true);
    }

    /**
     * 401 response
     *
     * @return void
     */
    public function testNotAuthorized()
    {
        $response = $this->get('/api/questions');

        $response
            ->assertStatus(401)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJson([
                'data' => null,
                'status' => 'fail',
                'message' => 'Not autorized'
            ], true);
    }

    /**
     * 200 response
     *
     * @return void
     */
    public function testSuccess()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/api/questions');

        $response
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJson([
                'data' => [],
                'status' => 'success',
                'message' => null
            ], true);
    }
}
