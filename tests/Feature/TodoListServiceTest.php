<?php

namespace Tests\Feature;

use App\Services\TodoListService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class TodoListServiceTest extends TestCase
{
    private TodoListService $todoListService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->todoListService = $this->app->make(TodoListService::class);
    }

    public function testTodoListNotNull()
    {
        self::assertNotNull($this->todoListService);
    }

    public function testSaveTodo()
    {
        $this->todoListService->saveTodo("1", "raup");

        $todoList = Session::get("todoList");

        foreach ($todoList as $value) {
            self::assertEquals("1", $value["id"]);
            self::assertEquals("raup", $value["todo"]);
        }
    }

    public function testGetTodoListEmpty()
    {
        self::assertEquals([], $this->todoListService->getTodoList());
    }

    public function testTodoListNotEmpty()
    {
        $expected = [
            [
                "id" => "1",
                "todo" => "raup"
            ],
            [
                "id" => "2",
                "todo" => "raups"
            ],
        ];

        $this->todoListService->saveTodo("1", "raup");
        $this->todoListService->saveTodo("2", "raups");

        self::assertEquals($expected, $this->todoListService->getTodoList());
    }

    public function testRemoveTodo()
    {
        $this->todoListService->saveTodo("1", "raup");
        $this->todoListService->saveTodo("2", "raups");

        self::assertEquals(2, sizeof($this->todoListService->getTodoList()));

        $this->todoListService->removeTodo("3");

        self::assertEquals(2, sizeof($this->todoListService->getTodoList()));

        $this->todoListService->removeTodo("1");

        self::assertEquals(1, sizeof($this->todoListService->getTodoList()));

        $this->todoListService->removeTodo("2");

        self::assertEquals(0, sizeof($this->todoListService->getTodoList()));
    }
}
