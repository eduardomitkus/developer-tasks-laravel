<?php

namespace DeveloperTasks\Http\Controllers;

use DeveloperTasks\Repository\ListTask\ListTaskRepository;
use DeveloperTasks\Http\Requests\ListTaskCreateAndEdit;
use Illuminate\Http\Request;
use DeveloperTasks\Repository\Technology\TechnologyRepository;


class ListTaskController extends Controller
{

    private $listTaskRepository;
    private $technologyRepository;

    public function __construct(
        ListTaskRepository $listTaskRepository,
        TechnologyRepository $technologyRepository
        )
    {
        $this->listTaskRepository = $listTaskRepository;
        $this->technologyRepository = $technologyRepository;
    }

    public function index()
    {
        $listsTasks = $this->listTaskRepository->all();
        return view('list.index',compact('listsTasks'));
    }

    public function create()
    {
        $technologies = $this->technologyRepository->all();
        return view('list.create', compact('technologies'));
    }

    public function store(ListTaskCreateAndEdit $request)
    {                   
        $this->listTaskRepository->save($request->all());
        return redirect()->route('list.index')->with('sucess','Nova Lista Adicionada');
    }

    public function edit($id)
    {
        $technologies = $this->technologyRepository->all();
        $listTasks = $this->listTaskRepository->find($id);
        
        return view('list.edit', compact('listTasks', 'technologies'));
    }

    public function update($id, ListTaskCreateAndEdit $request)
    {
        $this->listTaskRepository->update($id, $request->all());
        return redirect()->route('list.index')->with('sucess','Lista atualizada');
    }

    public function destroy($id)
    {
        $this->listTaskRepository->delete($id);
        return redirect()->route('list.index')->with('sucess','Lista deletada');

    }
}