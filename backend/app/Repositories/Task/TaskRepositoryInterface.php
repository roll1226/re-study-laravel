<?php

namespace App\Repositories\Task;

use App\Models\Task;

interface TaskRepositoryInterface
{
    /**
     * @param int $id
     * @return Task
     */
    public function getTaskById($id);

    /**
     * @return Task[]
     */
    public function getAllTasks();
}
