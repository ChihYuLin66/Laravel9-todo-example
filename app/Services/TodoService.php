<?php
/**
 * TodoService
 * 存取 todolist相關 邏輯
 */

namespace App\Services;

use App\Repositories\TodoRepository;
use App\Repositories\TodoContentRepository;

class TodoService
{
    private TodoRepository $todoRepository;
    
    public function __construct()
    {
        $this->todoRepository = new TodoRepository;
    }

    /**
     * 取todo列表 getTodolist
     * 
     * @return array
     */
    public function getList()
    {
        $todos = $this->todoRepository->getList();

        return $todos->map(fn ($todo) => [
            'id' => $todo->id,
            'content' => $todo->content->content,
            'completed' => $todo->completed,
            'created_at' => $todo->created_at->format('Y.m.d H:i')
        ]);
    }

    /**
     * 新增
     * @param content string
     * 
     * @return bool
     */
    public function store($data)
    {
        $todoRepository = new TodoRepository;
        $todoContentRepository = new TodoContentRepository;

        $todoId = $todoRepository->store();
        $todoContent = $todoContentRepository->store($todoId, [
            'content' => $data['content']
        ]);

        return [
            'todoId' => $todoId,
            'todoContent' => $todoContent
        ];
    }

    /**
     * 更新
     * @param content string
     * 
     * @return bool
     */
    public function update($id, $data)
    {
        $todoRepository = new TodoRepository;
        $todoContentRepository = new TodoContentRepository;

        $todo = $todoRepository->update($id, [
            
        ]);
        $todoContent = $todoContentRepository->update($todo->id, [
            'content' => $data['content']
        ]);

        return [
            'todo' => $todo,
            'todoContent' => $todoContent
        ];
    }
}
