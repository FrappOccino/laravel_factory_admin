<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Employees as Employee;
use App\Models\Factories as Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeCrudTest extends TestCase
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
        $this->actingAs($this->user)->get('/admin/employees')->assertStatus(200);
    }

    public function test_can_view_create_factory_page()
    {
        $this->actingAs($this->user)->get('/admin/employees/create')->assertStatus(200);
    }
    public function test_can_create_employee()
    {
        $factory = Factory::factory()->create();

        $data = [
            'firstname' => 'Test First Name',
            'lastname' => 'Test Last Name',
            'factory_id' => $factory->id,
            'email' => 'test@example.com',
            'phone' => '123',
        ];

        $this->actingAs($this->user)->post('/admin/employees/create', $data)->assertStatus(302); // redirect after creation
    }

    public function test_can_update_employee()
    {
        $factory = Factory::factory()->create();
        $employee = Employee::factory()->create([
            'factory_id' => $factory->id,
        ]);

        $updateData = [
            'id' => $employee->id,
            'firstname' => 'Updated First Name',
            'lastname' => 'Updated Last Name',
            'factory_id' => $factory->id,
            'email' => 'updated@example.com',
            'phone' => '456',
        ];

        $this->actingAs($this->user)->put('/admin/employees/edit/', $updateData)->assertStatus(302);
    }
    public function test_can_delete_employee()
    {
        $factory = Factory::factory()->create();

        $employee = Employee::factory()->create([
            'factory_id' => $factory->id,
        ]);

        $this->actingAs($this->user)
            ->delete(route('admin.employees.delete', $employee->id))
            ->assertStatus(200);

        $this->assertDatabaseMissing('employees', [
            'id' => $employee->id,
        ]);
    }
}
