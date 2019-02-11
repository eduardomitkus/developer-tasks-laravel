<?php

namespace DeveloperTasks\Repository\Developer;

use DeveloperTasks\Model\Developer\Developer;
use Illuminate\Support\Facades\Hash;

class DeveloperRepository
{

    private $eloquent;

    public function __construct()
    {
        $this->eloquent = new Developer;
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

    public function update($id,$attributes)
    {
        $eloquent = $this->find($id);     
        $eloquent->fill($attributes);
        return $eloquent->save();
    }

    public function newInstance()
    {
        return new Developer;
    }
   
}