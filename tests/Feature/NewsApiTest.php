<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Factories\UserFactory;
use App\Models\User;
use App\Models\NewsItem;

class NewsApiTest extends TestCase
{
    // This trait resets the database after each test.
    use RefreshDatabase;
    
    /**
     * Test the index method.
     *
     * @return void
     */
    public function testIndex() {
        // Create a user.
        $user = User::factory()->create();

        // Create a news item.
        $newsItem = NewsItem::factory()->create();

        // Authenticate the user and call the API.
        $response = $this->actingAs($user, 'api')->get('/api/news');

        // Create a personal access token for the user.
        $token = $user->createToken('test-token')->plainTextToken;
        
        // Authenticate the user.
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])->get('/api/news');

        
        // Call the API.
        $response = $this->get('/api/news');
        
        // Assert that the response has a 200 status code.
        $response->assertStatus(200);

        // Assert that the response contains the news item.
        $response->assertSee($newsItem->title);
    }
}
