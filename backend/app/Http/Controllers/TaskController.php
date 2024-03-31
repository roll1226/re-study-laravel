<?php

namespace App\Http\Controllers;

use App\Repositories\Task\TaskRepository;
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

    public function showTask()
    {
        $task = $this->taskService->getTask(3);
        dd($task);
    }

    public function showTasksList()
    {
        $tasks = $this->taskService->getTasksList();
        dd($tasks);
    }
}
