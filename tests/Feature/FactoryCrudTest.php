<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Factories as Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FactoryCrudTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_can_view_factories_index()
    {
        $this->actingAs($this->user)->get('/admin/factories')->assertStatus(200);
    }

    public function test_can_view_create_factory_page()
    {
        $this->actingAs($this->user)->get('/admin/factories/create')->assertStatus(200);
    }
    public function test_can_create_factory()
    {
        $data = [
            'factory_name' => 'Test Factory',
            'location' => 'Test City',
            'email' => 'test@example.com',
            'website' => 'https://test.com',
        ];

        $this->actingAs($this->user)->post('/admin/factories/create', $data)->assertStatus(200);
        $this->assertDatabaseHas('factories', [
            'factory_name' => 'Test Factory',
            'email' => 'test@example.com',
        ]);
    }
    public function test_can_update_factory()
    {
        $factory = Factory::factory()->create([
            'factory_name' => 'Old Factory',
            'location' => 'Old City',
            'email' => 'old@example.com',
            'website' => 'https://old.com',
        ]);

        $updateData = [
            'id' => $factory->id, // Include the factory ID
            'factory_name' => 'Updated Factory',
            'location' => 'Updated City',
            'email' => 'updated@example.com',
            'website' => 'https://updated.com',
        ];

        // Send POST request and expect redirect (302) instead of 200
        $this->actingAs($this->user)->post('/admin/factories/edit', $updateData)->assertStatus(302);

        // Verify database updated
        $this->assertDatabaseHas('factories', [
            'id' => $factory->id,
            'factory_name' => 'Updated Factory',
            'location' => 'Updated City',
            'email' => 'updated@example.com',
            'website' => 'https://updated.com',
        ]);
    }

    public function test_can_delete_factory()
    {
        $factory = Factory::factory()->create();

        $this->actingAs($this->user)
            ->delete("/admin/factories/{$factory->id}")
            ->assertStatus(200);

        $this->assertDatabaseMissing('factories', [
            'id' => $factory->id,
        ]);
    }
    
}
