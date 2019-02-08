<?php

namespace DeveloperTasks\Model\Technology;

use Illuminate\Database\Eloquent\Model;
use DeveloperTasks\Model\ListTask\ListTask;

class Technology extends Model
{
    protected $table = 'technologies';

    protected $fillable = [
        'name', 'platform'
    ];

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPlatform()
    {
        return $this->platform;
    }

    public function lists()
    {
        return $this->hasMany(ListTask::class);
    }

    public function getLists()
    {
        return $this->lists;
    }

    public function notHasLists()
    {
        return $this->lists()->count() == 0;
    }
}
