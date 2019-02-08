<?php

namespace DeveloperTasks\Http\Controllers;

use Illuminate\Http\Request;
use DeveloperTasks\Repository\Task\TaskRepository;
use DeveloperTasks\Types\StagesType;

class StageController extends Controller
{

    private $taskRepository;    

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;        
    }

    public function waiting()
    {
        $stageType = StagesType::WAITING;
        $tasks = $this->taskRepository->findByStage($stageType);

        return view('task.stages.waiting', compact('tasks'));
    }

    public function running()
    {
        $stageType = StagesType::RUNNING;
        $tasks = $this->taskRepository->findByStage($stageType);

        return view('task.stages.running', compact('tasks'));
    }

    public function completed()
    {
        $stageType = StagesType::COMPLETED;        
        $tasks = $this->taskRepository->findByStage($stageType);

        return view('task.stages.completed', compact('tasks'));
    }

    public function allStages()
    {
        $tasks = $this->taskRepository->findByDeveloperLogged()->get();        
        return view('task.stages.all', compact('tasks'));
    }
    
}