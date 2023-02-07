<?php

namespace App\Repositories;

use App\Models\Todo;

class TodoRepository
{
    public function __construct()
    {

    }

    public function find($id)
    {
        try {
            return Todo::find($id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * 取todolist getTodolist
     * 
     * @return array
     */
    public function getList()
    {
        $todoList = Todo::get();
        return $todoList;
    }

    /**
     * 新增
     * @param array $data
     * 
     * @return int
     */
    public function store($data = [])
    {
        $todo = Todo::create();
        return $todo->id;
    }


}
