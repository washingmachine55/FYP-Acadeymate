<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\EducationalInstitute;

class ViewEducationalInstitutesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the index method.
     *
     * @return void
     */
    public function testIndex()
    {
        // Create some educational institutes
        EducationalInstitute::factory()->count(3)->create();

        // Make a GET request to the index route
        $response = $this->get(route('livewire.view-educational-institutes'));

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the response contains the educational institutes
        $response->assertViewHas('educationalInstitutes');
    }

    /**
     * Test the store method.
     *
     * @return void
     */
    public function testStore()
    {
        // Make a POST request to the store route with some data
        $response = $this->post(route('livewire.view-educational-institutes.store'), [
            'name' => 'Test Institute',
            'email' => 'test@example.com',
        ]);

        // Assert that the response redirects to the index route
        $response->assertRedirect(route('livewire.view-educational-institutes'));

        // Assert that the educational institute was created in the database
        $this->assertDatabaseHas('educational_institutes', [
            'name' => 'Test Institute',
            'email' => 'test@example.com',
        ]);
    }

    /**
     * Test the update method.
     *
     * @return void
     */
    public function testUpdate()
    {
        // Create an educational institute
        $educationalInstitute = EducationalInstitute::factory()->create();

        // Make a PUT request to the update route with some data
        $response = $this->put(route('livewire.view-educational-institutes.update', $educationalInstitute->id), [
            'name' => 'Updated Institute',
            'email' => 'updated@example.com',
        ]);

        // Assert that the response redirects to the index route
        $response->assertRedirect(route('livewire.view-educational-institutes'));

        // Assert that the educational institute was updated in the database
        $this->assertDatabaseHas('educational_institutes', [
            'id' => $educationalInstitute->id,
            'name' => 'Updated Institute',
            'email' => 'updated@example.com',
        ]);
    }

    /**
     * Test the destroy method.
     *
     * @return void
     */
    public function testDestroy()
    {
        // Create an educational institute
        $educationalInstitute = EducationalInstitute::factory()->create();

        // Make a DELETE request to the destroy route
        $response = $this->delete(route('livewire.view-educational-institutes.destroy', $educationalInstitute->id));

        // Assert that the response redirects to the index route
        $response->assertRedirect(route('livewire.view-educational-institutes'));

        // Assert that the educational institute was deleted from the database
        $this->assertDatabaseMissing('educational_institutes', [
            'id' => $educationalInstitute->id,
        ]);
    }
}
