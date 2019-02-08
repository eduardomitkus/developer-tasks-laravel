<?php

namespace DeveloperTasks\Model\ListTask;

use Illuminate\Database\Eloquent\Model;
use DeveloperTasks\Model\Developer\Developer;
use DeveloperTasks\Model\Task\Task;
use DeveloperTasks\Model\Technology\Technology;

class ListTask extends Model
{
    protected $table = 'list_tasks';

    protected $fillable = [
        'title', 'description', 'developer_id', 'technology_id'
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

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function getDeveloper()
    {
        return $this->developer()->get();
    }

    public function getDeveloperId()
    {
        return $this->developer_id;
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function getTasks()
    {
        return $this->tasks;
    }

    public function getTotalTasks()
    {
        return $this->tasks()->count();
    }

    public function deleteDetach($listEloquent)
    {
        $listEloquent->developer_id = null;
        $listEloquent->save();
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }
    

}
