<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $first = factory('App\Post')->create();
        $second = factory('App\Post')->create(
          [
            'created_at' => \Carbon\Carbon::now()->subMonth()
          ]);
        $posts = Post::archives();

        $this->assertEquals([
          [
            "year" => $first->created_at->format('Y'),
            "month" => $first->created_at->format('F'),
            "published" => 2
          ],
          [
            "year" => $second->created_at->format('Y'),
            "month" => $second->created_at->format('F'),
            "published" => 2
          ]
        ], $posts);
    }
}
