<?php

namespace Tests\Unit\Controllers;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_returns_a_list_of_all_projects() {
        Project::factory()->count(3)->create();

        $response = $this->get('/api/projects');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_it_creates_a_project() {
        $title = "Test Project Title";
        $response = $this->postJson('/api/projects', ["title" => $title]);

        $this->assertDatabaseCount(Project::class, 1);
        $response->assertJson([
            "title" => $title
        ]);
    }

    public function test_it_gets_a_project_by_id()
    {
        $id = 2;
        Project::factory()->count(5)->create();

        $response = $this->getJson("/api/projects/$id");
        $response->assertJson([
            "id" => $id
        ]);
    }
}
