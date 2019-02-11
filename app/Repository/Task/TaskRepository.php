<?php

namespace DeveloperTasks\Repository\Task;

use DeveloperTasks\Model\Task\Task;
use DeveloperTasks\Types\StagesType;

class TaskRepository
{

    private $eloquent;

    public function __construct()
    {        
        $this->eloquent = new Task;
    }

    public function newInstance()
    {
        return $this->eloquent;
    }

    public function find($id)
    {
        return $this->eloquent->find($id);
    }

    public function save($attributes)
    {        
        $task = $this->setStages($this->eloquent,$attributes);
        $this->eloquent->fill($attributes->all());
        $this->eloquent->create_date = date('Y-m-d');
        return $this->eloquent->save();
    }
        
    public function listTasks($idList)
    {
        return $this->newInstance()->whereHas('listTask', function($query) use ($idList){
            $query->whereId($idList);
        })->orderBy('title')
        ->get();
    }

    public function setStages($task, $attributes)
    {
        switch ($attributes) {

            case $attributes->has('start'):
                 $task->stage = StagesType::RUNNING;
                 $task->start_date = date('Y-m-d');
                break;

            case $attributes->has('conclused'):
                 $task->stage = StagesType::COMPLETED;
                 $task->end_date = date('Y-m-d');
                break;

            case $attributes->has('waiting'):
                 $task->stage = StagesType::WAITING;
                break;

            default:
                $task->stage = StagesType::WAITING;
                break;

        }

        return $task;
        
    }

    public function updateStage($id, $attributes)
    {        
        $task = $this->eloquent->find($id);
        $task = $this->setStages($task,$attributes);
        return $task->save();
    }

    public function update($id, $attributes)
    {
        $task = $this->eloquent->find($id);
        $task = $this->setStages($task,$attributes);
        $task->fill($attributes->all());
        return $task->save();
    }

    public function delete($id)
    {
        $task = $this->eloquent->find($id);        
        $this->eloquent->deleteDetach($task);
        return $task->delete();
    }

    public function findByDeveloperLogged()
    {
        $developerLogged = auth()->user()->getId();        

        return $this->newInstance()->whereHas('listTask.developer', function($query) use ($developerLogged){
            $query->whereId($developerLogged);
        })->orderBy('title');
        
    }
    
    public function findByStage($stage)
    {
        $tasks = $this->findByDeveloperLogged();        
        return $tasks->whereStage($stage)->get();        
    }    
    
}