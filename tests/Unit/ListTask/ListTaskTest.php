<?php

namespace Tests\Unit\ListTask;

use Tests\TestCase;
use DeveloperTasks\Repository\ListTask\ListTaskRepository;
use DeveloperTasks\Repository\Technology\TechnologyRepository;
use DeveloperTasks\Model\Developer\Developer;
use DeveloperTasks\Model\Technology\Technology;
use DeveloperTasks\Model\ListTask\ListTask;

class ListTaskTest extends TestCase
{

    private $listTaskRepository;

    private function getUser()
    {
        $developer = factory(Developer::class)->make();
        $developer->save();

        return $developer->getId();        
    }

    private function getTechnology()
    {                
        $technology = factory(Technology::class)->make();

        $technologyRepository = new TechnologyRepository;
        $technologyRepository->save($technology->toArray());

        $searchByUnique = $technologyRepository->newInstance()
        ->whereName($technology->name)
        ->first();

        return $searchByUnique->getId();        
    }

    public function testCreate()
    {                        
        $developer = $this->getUser();
        $technology = $this->getTechnology();

        $listTask = factory(ListTask::class)->make();
        $listTask->developer_id = $developer;
        $listTask->technology_id = $technology;

        $this->listTaskRepository = new ListTaskRepository;
        $isSalved = $this->listTaskRepository->save($listTask->toArray());

        $this->assertTrue($isSalved);
    }

    public function testSelectACreatedListTask()
    {        
        $developer = $this->getUser();
        $technology = $this->getTechnology();

        $listTask = factory(ListTask::class)->make();
        $listTask->developer_id = $developer;
        $listTask->technology_id = $technology;

        $listTask->save();

        $searchByUnique = $listTask
        ->whereTitle($listTask->title)
        ->first();

        $this->assertInstanceOf(ListTask::class, $searchByUnique);
        $this->assertEquals($searchByUnique->getDescription(),$listTask->description);
    }

    public function testUpdate()
    {
        $developer = $this->getUser();
        $technology = $this->getTechnology();

        $listTask = factory(ListTask::class)->make();
        $listTask->developer_id = $developer;
        $listTask->technology_id = $technology;
        $listTask->save();
        
        $searchByUnique = $listTask
        ->whereTitle($listTask->title)
        ->first();

        $idSaved = $searchByUnique->getId();

        $newListTask = factory(ListTask::class)->make();

        $this->listTaskRepository = new ListTaskRepository;
        $isUpdated = $this->listTaskRepository->update($listTask->getId(), $newListTask->toArray());

        $searchByUnique = $listTask
        ->whereTitle($newListTask->title)
        ->first();

        $idUpdated = $searchByUnique->getId();        

        $this->assertTrue($isUpdated);
        $this->assertEquals($idSaved,$idUpdated);
    }

    public function testDelete()
    {
        $developer = $this->getUser();
        $technology = $this->getTechnology();

        $listTask = factory(ListTask::class)->make();
        $listTask->developer_id = $developer;
        $listTask->technology_id = $technology;
        $listTask->save();

        $this->listTaskRepository = new ListTaskRepository;
        $isDeleted = $this->listTaskRepository->delete($listTask->getId(), $listTask->toArray());

        $this->assertTrue($isDeleted);
    }
    
}