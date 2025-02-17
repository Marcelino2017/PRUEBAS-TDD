<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_task_crated_success(): void
    {
        $response = $this->post(route('tasks.store', [
            'title' => 'Test Task',
            'description' => 'Test task Description',
            'status' => 'pending'
        ]));

        $response->assertStatus(200);

        $response->assertJson([
            'title' => 'Test Task',
            'description' => 'Test task Description',
            'status' => 'pending'
        ]);

        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Task',
            'description' => 'Test task Description',
            'status' => 'pending'
        ]);
    }

    public function test_no_validations_passed()
    {
        $response = $this->post(route('tasks.store'), [
            'title' => '',
            'description' => '',
            'status' => ''
        ], [
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(422);
    }
}
