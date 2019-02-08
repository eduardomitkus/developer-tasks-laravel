<?php

namespace DeveloperTasks\Http\Controllers;

use DeveloperTasks\Repository\Task\TaskRepository;
use DeveloperTasks\Repository\ListTask\ListTaskRepository;
use DeveloperTasks\Http\Requests\TaskCreateAndEdit;
use Illuminate\Http\Request;
use DeveloperTasks\Types\PrioritiesType;

class TaskController extends Controller
{

    private $taskRepository;
    private $listTaskRepository;

    public function __construct(
        TaskRepository $taskRepository,
        ListTaskRepository $listTaskRepository
        )
    {
        $this->taskRepository = $taskRepository;
        $this->listTaskRepository = $listTaskRepository;
    }

    public function index($idList)
    {                                
        $developerList = $this->listTaskRepository->developerList($idList);        
        $listTasks = $this->taskRepository->listTasks($idList);

        return view('task.index', compact('developerList', 'listTasks'));
    }

    public function create($idList)
    {
        $priorities = new PrioritiesType;
        return view('task.create', compact('idList', 'priorities'));
    }

    public function store(TaskCreateAndEdit $request)
    {             
        $this->taskRepository->save($request);
        
        return redirect()
        ->route('task.index',$request->input('list_task_id'))
        ->with('sucess','Task adicionada');
    }

    public function updateStage($id, Request $request)
    {        
        $this->taskRepository->updateStage($id, $request);

        return redirect()
        ->route('task.index',$request->input('list_task_id'))
        ->with('sucess','Task movimentada');
    }

    public function edit($idList,$idTask)
    {        
        $task = $this->taskRepository->find($idTask);
        return view('task.edit', compact('idList','task'));
    }

    public function update($id, TaskCreateAndEdit $request)
    {
        $this->taskRepository->update($id, $request);

        return redirect()
        ->route('task.index',$request->input('list_task_id'))
        ->with('sucess','Task editada');
    }

    public function destroy($id, Request $request)
    {
        $this->taskRepository->delete($id);

        return redirect()
        ->route('task.index',$request->input('list_task_id'))
        ->with('sucess','Task deletada');
    }        
    
}