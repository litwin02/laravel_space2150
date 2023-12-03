<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModuleCrew;

class ModuleCrewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $moduleCrew = ModuleCrew::all();
        return view('modulecrew.list', ['moduleCrew' => $moduleCrew]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modulecrew.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ship_module_id' => 'required',
            'nick' => 'required|min:3|max:10|unique:module_crew',
            'gender' => 'required',
            'age' => 'required',
        ]);
        if($validated)
        {
            $crew = new ModuleCrew();
            $crew->ship_module_id = $request->ship_module_id;
            $crew->nick = $request->nick;
            $crew->gender = $request->gender;
            $crew->age = $request->age;

            $crew->save();
            return redirect('/modulecrew/list');
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
        $crew = ModuleCrew::find($id);

        if($crew == null)
        {
            return view('message', ['message' => 'Crew not found!', 'type_of_message' => 'Error']);
        }
        else
        {
            return view('modulecrew.show', ['crew' => $crew]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $crew = ModuleCrew::find($id);

        if($crew == null)
        {
            return view('message', ['message' => 'Crew not found!', 'type_of_message' => 'Error']);
        }
        else
        {
            return view('modulecrew.edit', ['crew' => $crew]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'ship_module_id' => 'required',
            'nick' => 'required|min:3|max:10|unique:module_crew',
            'gender' => 'required',
            'age' => 'required',
        ]);
        if($validated)
        {
            $crew = ModuleCrew::find($id);
            if($crew == null)
            {
                return view('message', ['message' => 'Crew not found!', 'type_of_message' => 'Error']);
            }
            $crew->ship_module_id = $request->ship_module_id;
            $crew->nick = $request->nick;
            $crew->gender = $request->gender;
            $crew->age = $request->age;

            $crew->save();
            return redirect('/modulecrew/list');
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
        $crew = ModuleCrew::find($id);

        if($crew == null)
        {
            return view('message', ['message' => 'Crew not found!', 'type_of_message' => 'Error']);
        }
        else
        {
            $crew->delete();
            return redirect('/modulecrew/list');
        }
    }
}
