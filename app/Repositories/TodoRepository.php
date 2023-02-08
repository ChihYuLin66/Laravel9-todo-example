<?php

namespace App\Repositories;

use App\Models\Todo;

class TodoRepository
{
    /**
     * Todo model
     * var Todo
     */
    private Todo $todo;

    public function __construct()
    {
        $this->todo = new Todo;
    }

    public function find($id)
    {
        try {
            return $this->todo->find($id);
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
        return $this->todo->get()->load('content');
    }

    /**
     * 新增
     * @param array $data
     * 
     * @return int
     */
    public function store($data = [])
    {
        $todo = $this->todo->create();
        return $todo->id;
    }


}
