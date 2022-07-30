<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Tag;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStoreDataTag()
    {
        $this->post('tags', [
            'name' => 'PHP'
        ])->assertRedirect('/');

        $this->assertDatabaseHas('tags', ['name' => 'PHP']);
    }

    public function testDestroyDataTag(){

        $tag = Tag::factory()->create();

        $this->delete("tags/$tag->id")->assertRedirect('/');

        $this->assertDatabaseMissing('tags', ['name' => $tag->name]);
    }

    public function testValidateNotNullDataTag(){
        $this->post('tags', ['name' => ''])->assertSessionHasErrors('name');
    }
}
