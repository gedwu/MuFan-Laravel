<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticlesTest extends TestCase
{
    use WithFaker, RefreshDatabase;


    /** @test */
    public function a_user_can_create_article()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph
        ];

        $this->post('/articles',$attributes)->assertRedirect('/articles');

        $this->assertDatabaseHas('articles', $attributes);

        $this->get('/articles')->assertSee($attributes['title']);
    }

    /** @test  */
    public function a_article_requires_a_title() {
        $attributes = factory('App\Article')->raw(['title' => '']);

        $this->post('/articles', $attributes)->assertSessionHasErrors('title');
    }

    /** @test  */
    public function a_article_requires_a_body() {
        $attributes = factory('App\Article')->raw(['body' => '']);

        $this->post('/articles', $attributes)->assertSessionHasErrors('body');
    }
}
