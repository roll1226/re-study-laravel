<?php

namespace App\Services\Task;

use App\Repositories\Task\TaskRepository;
use App\Repositories\Task\TaskRepositoryInterface;

class TaskService implements TaskServiceInterface
{
    private TaskRepositoryInterface $taskRepository;

    /**
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct()
    {
        $this->taskRepository = new TaskRepository();
    }

    public function getTask($id)
    {
        return $this->taskRepository->getTaskById($id);
    }

    public function getTasksList()
    {
        return $this->taskRepository->getAllTasks();
    }
}
