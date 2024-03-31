<?php

namespace App\Services\Task;

use App\Models\Task;
use App\Repositories\Task\TaskRepositoryInterface;

interface TaskServiceInterface
{
    /**
     * @param string $id
     * @return Task
     */
    public function getTask($id);

    /**
     * @return Task[]
     */
    public function getTasksList();
}
