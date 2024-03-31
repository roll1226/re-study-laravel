<?php

namespace App\Repositories\Task;

use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function getTaskById($id)
    {
        return Task::where('id', '=', $id)->get();
    }

    public function getAllTasks()
    {
        return Task::all();
    }
}
