<?php

namespace DeveloperTasks\Model\Developer;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DeveloperTasks\Model\ListTask\ListTask;

class Developer extends Authenticatable
{
    use Notifiable;

    protected $table = 'developers';

    protected $fillable = [
        'name', 'nick_name', 'email', 'birth_date', 'password'
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'birth_date', 'created_at', 'updated_at'
    ];

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNickName()
    {
        return $this->nick_name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getBirthDateISO()
    {
        return $this->birth_date ? date('Y-m-d', \strtotime($this->birth_date)): null;
    }

    public function getBirthDate()
    {
        return $this->birth_date ? $this->birth_date->format('d/m/Y'): null;
    }    

    public function listTasks()
    {
        return $this->hasMany(ListTask::class);
    }

    public function getListTasks()
    {
        return $this->listTasks;
    }



}
