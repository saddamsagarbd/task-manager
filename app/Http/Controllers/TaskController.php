<?php

namespace App\Http\Controllers;

use App\Data\DTOs\CreateTaskData;
use App\Data\DTOs\UpdateTaskData;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\TaskService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function __construct(private TaskService $service) {}

    public function index(): View
    {
        $tasks = $this->service->getAll();
        return view('tasks.index', compact('tasks'));
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request): RedirectResponse
    {
        $dto = CreateTaskData::formRequest($request->validated());
        
        $this->service->create($dto);

        return redirect()->route('tasks.index')->with('success', 'Task created!');
    }

    public function edit($id): View
    {
        $task = $this->service->find($id);
        return view('tasks.edit', $task);
    }   
    
    public function update($id, UpdateTaskRequest $request): RedirectResponse
    {
        $dto = UpdateTaskData::formRequest($request->validated());
        
        $this->service->update($id, $dto);

        return redirect()->route('tasks.index')->with('success', 'Task created!');
    }
}
