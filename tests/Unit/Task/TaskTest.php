<?php

namespace Tests\Unit\Task;

use Tests\TestCase;
use DeveloperTasks\Model\Developer\Developer;
use DeveloperTasks\Model\Technology\Technology;
use DeveloperTasks\Model\ListTask\ListTask;
use DeveloperTasks\Model\Task\Task;
use DeveloperTasks\Types\PrioritiesType;
use DeveloperTasks\Types\StagesType;
use DeveloperTasks\Repository\Task\TaskRepository;

class TaskTest extends TestCase
{

    private $taskRepository;

    private function getListTaskId()
    {
        $developer = factory(Developer::class)->make();
        $developer->save();        
        $developer = $developer->getId();

        $technology = factory(Technology::class)->make();
        $technology->save();
        $technology = $technology->getId();

        $listTask = factory(ListTask::class)->make();
        $listTask->developer_id = $developer;
        $listTask->technology_id = $technology;
        $listTask->save();

        return $listTask->getId();

    }
    
    public function testCreate()
    {
        $listTaskId = $this->getListTaskId();

        $task = factory(Task::class)->make();
        $task->priority = PrioritiesType::AVERAGE;
        $task->list_task_id = $listTaskId;
        $task->start = StagesType::WAITING;

        $this->taskRepository = new TaskRepository;
        $isSalved = $this->taskRepository->save(collect($task));

        $this->assertTrue($isSalved);
    }

    public function testSelectACreatedTask()
    {
        $listTaskId = $this->getListTaskId();

        $task = factory(Task::class)->make();
        $task->priority = PrioritiesType::AVERAGE;
        $task->list_task_id = $listTaskId;
        $task->stage = StagesType::WAITING;
        $task->save();

        $taskId = $task->getId();

        $this->taskRepository = new TaskRepository;
        $find = $task
        ->whereId($taskId)
        ->first();        

        $this->assertInstanceOf(Task::class, $find);
        $this->assertEquals($find->getDescription(), $task->description);
    }

    public function testUpdate()
    {
        $listTaskId = $this->getListTaskId();

        $task = factory(Task::class)->make();
        $task->priority = PrioritiesType::AVERAGE;
        $task->list_task_id = $listTaskId;
        $task->stage = StagesType::WAITING;
        $task->save();

        $taskId = $task->getId();

        $search = $task
        ->whereId($taskId)
        ->first();

        $idSaved = $search->getId();

        $newTask = factory(Task::class)->make();

        $this->taskRepository = new TaskRepository;
        $isUpdated = $this->taskRepository->update($idSaved, collect($newTask));
        
        $this->assertTrue($isUpdated);
    }

    public function testDelete()
    {
        $listTaskId = $this->getListTaskId();

        $task = factory(Task::class)->make();
        $task->priority = PrioritiesType::AVERAGE;
        $task->list_task_id = $listTaskId;
        $task->stage = StagesType::WAITING;
        $task->save();

        $taskId = $task->getId();

        $this->taskRepository = new TaskRepository;
        $isDeleted = $this->taskRepository->delete($taskId);

        $search = $task
        ->whereId($taskId)->get();

        $isEmpty = $search->isEmpty();

        $this->assertTrue($isDeleted);
        $this->assertTrue($isEmpty);
    }

    public function testWaitingStage()
    {
        $listTaskId = $this->getListTaskId();

        $task = factory(Task::class)->make();
        $task->priority = PrioritiesType::AVERAGE;
        $task->list_task_id = $listTaskId;
        $task->stage = StagesType::WAITING;
        $task->save();

        $taskIsWaiting = $task->taskIsWaiting();

        $this->assertTrue($taskIsWaiting);
    }

    public function testRunningStage()
    {
        $listTaskId = $this->getListTaskId();

        $task = factory(Task::class)->make();
        $task->priority = PrioritiesType::AVERAGE;
        $task->list_task_id = $listTaskId;
        $task->stage = StagesType::RUNNING;
        $task->save();

        $taskIsRunning = $task->taskIsRunning();

        $this->assertTrue($taskIsRunning);
    }

    public function testCompletedStage()
    {
        $listTaskId = $this->getListTaskId();

        $task = factory(Task::class)->make();
        $task->priority = PrioritiesType::AVERAGE;
        $task->list_task_id = $listTaskId;
        $task->stage = StagesType::COMPLETED;
        $task->save();

        $taskIsCompleted = $task->taskIsCompleted();

        $this->assertTrue($taskIsCompleted);
    }

    public function testPriorityLevelLow()
    {
        $listTaskId = $this->getListTaskId();

        $task = factory(Task::class)->make();
        $task->priority = PrioritiesType::LOW;
        $task->list_task_id = $listTaskId;
        $task->stage = StagesType::COMPLETED;
        $task->save();

        $priorityIsLow = $task->priorityIsLow();

        $this->assertTrue($priorityIsLow);
    }

    public function testPriorityLevelAverage()
    {
        $listTaskId = $this->getListTaskId();

        $task = factory(Task::class)->make();
        $task->priority = PrioritiesType::AVERAGE;
        $task->list_task_id = $listTaskId;
        $task->stage = StagesType::COMPLETED;
        $task->save();

        $priorityIsAverage = $task->priorityIsAverage();

        $this->assertTrue($priorityIsAverage);
    }

    public function testPriorityLevelHigh()
    {
        $listTaskId = $this->getListTaskId();

        $task = factory(Task::class)->make();
        $task->priority = PrioritiesType::HIGH;
        $task->list_task_id = $listTaskId;
        $task->stage = StagesType::COMPLETED;
        $task->save();

        $priorityIsHigh = $task->priorityIsHigh();

        $this->assertTrue($priorityIsHigh);
    }

}