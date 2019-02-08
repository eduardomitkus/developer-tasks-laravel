<?php

namespace DeveloperTasks\Model\Task;

use Illuminate\Database\Eloquent\Model;
use DeveloperTasks\Model\Developer\Developer;
use DeveloperTasks\Model\ListTask\ListTask;
use DeveloperTasks\Types\StagesType;
use DeveloperTasks\Types\PrioritiesType;

class Task extends Model
{

    protected $table = 'tasks';

    protected $fillable = [
        'title', 'description', 'start_date', 'end_date', 'list_task_id', 'priority'
    ];

    protected $dates = [
        'start_date', 'end_date', 'create_date', 'created_at', 'updated_at'
    ];

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getStartDate()
    {
        return $this->start_date;
    }

    public function getEndDate()
    {
        return $this->end_date;
    }

    public function getCreateDate()
    {
        return $this->create_date;
    }    

    public function getPriority()
    {
        return $this->priority;            
    }

    public function listTask()
    {
        return $this->belongsTo(ListTask::class);
    }
    

    public function getStage()
    {
        return $this->stage;
    }

    public function taskIsWaiting()
    {
        return $this->getStage() == StagesType::WAITING;
    }

    public function taskIsCompleted()
    {
        return $this->getStage() == StagesType::COMPLETED;
    }

    public function taskIsRunning()
    {
        return $this->getStage() == StagesType::RUNNING;
    }
    
    public function priorityIsLow()
    {
        return $this->getPriority() == PrioritiesType::LOW;
    }
    
    public function priorityIsAverage()
    {
        return $this->getPriority() == PrioritiesType::AVERAGE;
    }

    public function priorityIsHigh()
    {
        return $this->getPriority() == PrioritiesType::HIGH;
    }

    public function deleteDetach($taskEloquent)
    {
        $taskEloquent->list_task_id = null;
        return $taskEloquent->save();        
    }
}