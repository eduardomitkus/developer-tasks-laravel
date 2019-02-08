<?php

namespace DeveloperTasks\Repository\Technology;

use DeveloperTasks\Model\Technology\Technology;

class TechnologyRepository
{
    
    private $eloquent;

    public function __construct(Technology $eloquent)
    {        
        $this->eloquent = $eloquent;
    }

    public function save($attributes)
    {
        $this->eloquent->fill($attributes);
        return $this->eloquent->save();
    }

    public function all()
    {
        return $this->eloquent->all();
    }
    
    public function find($id)
    {
        return $this->eloquent->find($id);        
    }

    public function update($id, $attributes)
    {
        $technology = $this->find($id);
        $technology->fill($attributes);
        return $technology->save();
    }

    public function delete($id)
    {
        $technology = $this->find($id);        
        return $technology->delete();

    }

}