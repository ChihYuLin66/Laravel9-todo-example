<?php

namespace App\Repositories;

use App\Models\TodoContent;

class TodoContentRepository
{
    /**
     * TodoContent model
     * var TodoContent
     */
    private TodoContent $todoContent;

    public function __construct()
    {
        $this->todoContent = new TodoContent;
    }

    public function find($id)
    {
        try {
            return $this->todoContent->find($id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * 新增
     * @param int todoId 
     * @param array $data
     * 
     * @return int
     */
    public function store($todoId, $data)
    {
        $this->todoContent->todo_id = $todoId;
        $this->todoContent->content = $data['content'];
        $this->todoContent->save();
        return $this->todoContent;
    }
    
}
