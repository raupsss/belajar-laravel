<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListControllerTest extends TestCase
{
    public function testTodo()
    {
        $this->withSession([
            "user" => "ghani",
            "todoList" => [
                [
                    "id" => "1",
                    "todo" => "raup"
                ],
                [
                    "id" => "2",
                    "todo" => "raups"
                ],
            ]
        ])->get('/todoList')
            ->assertSeeText("1")
            ->assertSeeText("raup")
            ->assertSeeText("2")
            ->assertSeeText("raups");
    }
}
