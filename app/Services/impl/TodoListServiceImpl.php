<?php

namespace App\Services\impl;

use App\Services\TodoListService;
use Illuminate\Support\Facades\Session;

class TodoListServiceImpl implements TodoListService
{

    /**
     * @param string $id
     * @param string $todo
     */
    public function saveTodo(string $id, string $todo): void
    {
        if (!Session::exists("todoList")) {
            Session::put("todoList", []);
        }

        Session::push("todoList", [
            "id" => $id,
            "todo" => $todo
        ]);
    }


    /**
     * @return array
     */
    public function getTodoList(): array
    {
        return Session::get("todoList", []);
    }
    /**
     * @param string $todoId
     * @return mixed
     */
    public function removeTodo(string $todoId)
    {

        $todoList = Session::get("todoList");

        foreach ($todoList as $index => $value) {
            if ($value['id'] == $todoId) {
                unset($todoList[$index]);
                break;
            }
        }

        Session::put("todoList", $todoList);
    }
}
