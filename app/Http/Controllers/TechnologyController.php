<?php

namespace DeveloperTasks\Http\Controllers;

use Illuminate\Http\Request;
use DeveloperTasks\Types\PlatformsType;
use DeveloperTasks\Repository\Technology\TechnologyRepository;
use DeveloperTasks\Http\Requests\TechnologyCreateAndEdit;

class TechnologyController extends Controller
{

    private $technologyRepository;

    public function __construct(TechnologyRepository $technologyRepository)
    {
        $this->technologyRepository = $technologyRepository;
    }

    public function index()
    {
        $technologies = $this->technologyRepository->all();        

        return view('technology.index', compact('technologies'));
    }

    public function create()
    {
        $platforms = new PlatformsType;
        return view('technology.create', compact('platforms'));
    }

    public function store(TechnologyCreateAndEdit $request)
    {           
        $this->technologyRepository->save($request->all());
        return redirect()->route('technology.index')->with('sucess','Tecnologia adicionada');
    }

    public function edit($id)
    {
        $platforms = new PlatformsType;
        $technology = $this->technologyRepository->find($id);
        return view('technology.edit', compact('technology', 'platforms'));
    }

    public function update($id, Request $request)
    {       
        $this->technologyRepository->update($id, $request->all());
        return redirect()->route('technology.index')->with('sucess','Tecnologia editada');
    }

    public function destroy($id)
    {
        $this->technologyRepository->delete($id);
        return redirect()->route('technology.index')->with('sucess','Tecnologia excluída');
    }
}
