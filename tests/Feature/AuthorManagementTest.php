<?php

namespace Tests\Feature;

use Carbon\Carbon;
use App\Author;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_author_can_be_added()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/authors', [
            'name' => 'Gabriel Dias',
            'dob' => '06/12/1995'
        ]);

        $authors = Author::all();

        $this->assertCount(1, $authors);

        $author = $authors->first();

        $this->assertInstanceOf(Carbon::class, $author->dob);
        $this->assertEquals('1995/12/06', $author->dob->format('Y/d/m'));
        $response->assertRedirect($author->path());
    }
}
