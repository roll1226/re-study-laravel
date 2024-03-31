<?php

namespace App\Http\Controllers;

use App\Services\Task\TaskService;
use App\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private TaskServiceInterface $taskService;

    public function __construct()
    {
        $this->taskService = new TaskService();
    }

    public function show($id)
    {
        $task = $this->taskService->getTask($id);
        dd($task);
    }

    public function index()
    {
        $tasks = $this->taskService->getTasksList();
        dd($tasks);
    }
}
