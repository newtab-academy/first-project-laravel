<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskViewTest extends TestCase {
    
    public function test_example() {
        $response = $this->get('/tasks');
        $response->assertStatus(200);
    }

    public function testTaskView() {
        $this->get('/tasks/create')->assertStatus(200);
        $this->get('/tasks/create')->assertViewHas('employees');
    }
}
