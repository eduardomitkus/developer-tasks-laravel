<?php

namespace DeveloperTasks\Http\Controllers;

use DeveloperTasks\Repository\Developer\DeveloperRepository;
use DeveloperTasks\Http\Requests\DeveloperEdit;

class DeveloperController extends Controller
{

    private $developerRepository;

    public function __construct(DeveloperRepository $developerRepository)
    {
        $this->developerRepository =  $developerRepository;
    }

    public function profile()
    {        
        return view('developer.profile');
    }

    public function edit()
    {
        $id = auth()->user()->getId();        
        $developer = $this->developerRepository->find($id);
        return view('developer.edit', compact('developer'));
    }

    public function update($id,DeveloperEdit $request)
    {                                

         $this->developerRepository->update($id, $request->all());
         return redirect()->route('developer.profile')->with('updateSucess','Atualizado com sucesso');

    }
}