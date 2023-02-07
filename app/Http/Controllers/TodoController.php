<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TodoService;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    use ApiResponseTrait;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'page' => 'required|integer',
            // 'count' => 'integer',
            // 'type' => 'integer|in:0,1',
        ]);
    
        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 'invalid');
        }

        $todoService = new TodoService();
        $todos = $todoService->getList();

        return $this->successResponse($todos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            // 'count' => 'integer',
            // 'type' => 'integer|in:0,1',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 'invalid');
        }

        $todoService = new TodoService();
        $todo = $todoService->store([
            'content' => $request->content
        ]);

        return $this->successResponse($todo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}