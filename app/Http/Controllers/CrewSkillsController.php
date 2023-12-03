<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrewSkills;

class CrewSkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $crewSkills = CrewSkills::all();
        return view('crewskills.list', ['crew_skills' => $crewSkills]);
    }

    /**
     * Show the form for creating a new sresource.
     */
    public function create()
    {
        return view('crewskills.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'module_crew_id' => 'required',
            'name' => 'required|max:15',
        ]);
        if($validated){
            $crewSkill = new CrewSkills();
            $crewSkill->module_crew_id = $request->module_crew_id;
            $crewSkill->name = $request->name;
            $crewSkill->save();
            return redirect('crewskills/list');
        }
        else
        {
            return view('message', ['message' => 'Validation failed!', 'type_of_message' => 'Error']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $crewSkill = CrewSkills::find($id);
        return view('crewskills.show', ['crew_skill' => $crewSkill]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $crewSkill = CrewSkills::find($id);
        return view('crewskills.edit', ['crew_skill' => $crewSkill]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'module_crew_id' => 'required',
            'name' => 'required|max:15',
        ]);
        if($validated){
            $crewSkill = CrewSkills::find($id);
            $crewSkill->module_crew_id = $request->module_crew_id;
            $crewSkill->name = $request->name;
            $crewSkill->save();
            return redirect('crewskills/list');
        }
        else
        {
            return view('message', ['message' => 'Validation failed!', 'type_of_message' => 'Error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $crewSkill = CrewSkills::find($id);
        $crewSkill->delete();
        return redirect('crewskills/list');
    }
}
