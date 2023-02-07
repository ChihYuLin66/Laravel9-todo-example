<?php

namespace App\Repositories;

use App\Models\TodoContent;

class TodoContentRepository
{
    public function __construct()
    {
        
    }

    public function find($id)
    {
        try {
            return TodoContent::find($id);
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
        $todoContent = new TodoContent;
        $todoContent->todo_id = $todoId;
        $todoContent->content = $data['content'];
        $todoContent->save();
        return $todoContent;
    }
    
}
