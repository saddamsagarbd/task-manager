<?php

namespace App\Services;

use App\Data\DTOs\CreateTaskData;
use App\Data\DTOs\UpdateTaskData;
use App\Models\Task;
use App\Repositories\Contracts\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    public function __construct(
        private TaskRepositoryInterface $repository
    ) {}

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function find(int $id): ?Task
    {
        return $this->repository->find($id);
    }

    public function create(CreateTaskData $data): ?Task
    {
        $title = ucfirst(trim($data->title));

        return $this->repository->create(
            [
                "title" => $title,
                "description" => $data->description,
            ]
        );

    }

    public function update(int $id, UpdateTaskData $data): ?Task
    {
        $title = ucfirst(trim($data->title));

        return $this->repository->update($id, [
            "title" => $title,
            "description" => $data->description,
            "status" => $data->description,
        ]);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    public function updateStatus(int $id, string $status): ?Task
    {
        return $this->repository->updateStatus($id, $status);
    }
}