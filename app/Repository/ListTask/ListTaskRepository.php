<?php

namespace DeveloperTasks\Repository\ListTask;

use DeveloperTasks\Model\ListTask\ListTask;

class ListTaskRepository
{

    private $eloquent;
    
    public function __construct()
    {
        $this->eloquent = new ListTask;
    }

    public function save($attributes)
    {                
        $this->eloquent->fill($attributes);
        return $this->eloquent->save();
    }
        
    public function find($id)
    {
        return $this->eloquent->find($id);
    }

    public function update($id, $attributes)
    {
        $list = $this->eloquent->find($id);
        $list->fill($attributes);
        return $list->save();
    }

    public function delete($id)
    {
        $list = $this->eloquent->find($id);   
        $this->eloquent->deleteDetach($list);
        return $list->delete();
    }

    public function all()
    {
        $developerLoged = auth()->user()->getId();

        return $this->eloquent->whereHas('developer', function($query) use ($developerLoged){
            return $query->whereId($developerLoged);
        })->orderBy('title')
        ->get();
    }

    public function developerList($idList)
    {
        $list = $this->all();
        return $list->first()->whereId($idList)->first();
    }
    
    
}
