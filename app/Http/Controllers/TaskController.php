<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    // /**
    //  * @param TaskRepository $tasks
    //  */
    // public function __construct(TaskRepository $task)
    // {
    //     $this->task = $task;
    // }

	/**
     * @return JSON
     */
    public function index()
    {
    	$Tasks  = Task::with('priority');
        return response()->json($Tasks);
    }

	/**
     * @return JSON
     */
    public function createTask(Request $request)
    {
    	$Task = Task::create($request->all());
        return response()->json($Task);
    }

	/**
	 * @return JSON
	 */
	public function getTask($id) 
	{
		$Task  = Task::find($id);
        return response()->json($Task);
	}

	/**
     * @param Request $request
     * @param $id Task ID
     * @return JSON updated task
     */
    public function updateTask(Request $request,$id)
    {
        $Task  = Task::find($id);
        $Task->title = $request->input('title');
        $Task->author = $request->input('author');
        $Task->isbn = $request->input('isbn');
        $Task->save();
  
        return response()->json($Task);
    }

	/**
     * @return mixed
     */
    public function deleteTask($id)
    {
        $Task  = Task::find($id);
        $Task->delete();
        return response()->json('deleted');
    }
}
