<?php

namespace DeveloperTasks\Repository\Developer;

use DeveloperTasks\Model\Developer\Developer;
use Illuminate\Support\Facades\Hash;

class DeveloperRepository
{

    private $eloquent;

    public function __construct(Developer $eloquent)
    {
        $this->eloquent = $eloquent;
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
    
   
}