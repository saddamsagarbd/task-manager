<?php

namespace App\Repositories\Eloquent;

use App\Models\Task;
use App\Repositories\Contracts\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentTaskRepository implements TaskRepositoryInterface {

    public function getAll(): Collection
    {
        return Task::latest()->get();
    }

    public function find(int $id): ?Task
    {
        return Task::find($id);
    }

    public function create(array $data): Task
    {
        return Task::create($data);
    }

    public function update(int $id, array $data): Task
    {
        $task = Task::find($id);

        $task->update($data);
        
        return $task;
    }

    public function delete(int $id): bool
    {
        return Task::destroy($id);
    }

    public function updateStatus(int $id, string $status): Task
    {
        $task = Task::find($id);
        $task->update([
            'status' => $status,
            'completed_at' => now(),
        ]);
        return $task;
    }
}