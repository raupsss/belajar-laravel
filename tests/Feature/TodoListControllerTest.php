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

    public function testAddTodoFailed()
    {
        $this->withSession([
            "user" => "ghani"
        ])->post("/todoList", [])
            ->assertSeeText("Todo is Required");
    }

    public function testAddTodoSuccess()
    {
        $this->withSession([
            "user" => "ghani"
        ])->post("/todoList", [
                "todo" => "raups"
            ])
            ->assertRedirect("/todoList");
    }

    public function testRemoveTodoList()
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
        ])->post("/todoList/1/delete")
            ->assertRedirect("/todoList");
    }
}
