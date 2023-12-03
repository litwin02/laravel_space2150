<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipModules;
use App\Models\ModuleCrew;

class ShipModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myShipModules = ShipModules::all();

        return view('shipmodules.list', ['ship_modules' => $myShipModules]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shipmodules.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'module_name' => 'required|min:3|max:25|unique:ship_modules',
            'is_workable' => 'required',
        ]);
        if($validated)
        {
            $mod_ship = new ShipModules();

            $mod_ship->module_name = $request->module_name;
            $mod_ship->is_workable = $request->is_workable;

            $mod_ship->save();

            return redirect('/shipmodules/list');
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
        $myShipModule = ShipModules::find($id);

        if($myShipModule == null)
        {
            $error_message = "Ship module with id=" . $id . " not found!";
            return view('message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        if($myShipModule->count() > 0)
        {
            return view('shipmodules.show', ['shipmodule' => $myShipModule]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $myShipModule = ShipModules::find($id);

        if($myShipModule == null)
        {
            $error_message = "Ship module with id=" . $id . " not found!";
            return view('message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        if($myShipModule->count() > 0)
        {
            return view('shipmodules.edit', ['shipmodule' => $myShipModule]);
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'module_name' => 'required|min:3|max:25|unique:ship_modules',
            'is_workable' => 'required',
        ]);
        if($validated)
        {
            $mod_ship = ShipModules::find($id);

            if($mod_ship == null)
            {
                $error_message = "Ship module with id=" . $id . " not found!";
                return view('message', ['message' => $error_message, 'type_of_message' => 'Error']);
            }
            $mod_ship->module_name = $request->module_name;
            $mod_ship->is_workable = $request->is_workable;

            $mod_ship->save();

            return redirect('/shipmodules/list');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mod_ship = ShipModules::find($id);
        if($mod_ship == null)
        {
            $error_message = "Ship module with id=" . $id . " not found!";
            return view('message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        else
        {
            $mod_ship->delete();
            return redirect('/shipmodules/list');
        }
    }

    private function getCrewMembers(string $id)
    {
        $crew = ModuleCrew::all()->where('ship_module_id', $id);
        return $crew;
    }

    public function showCrew(string $id)
    {
        $myShipModule = ShipModules::find($id);

        if($myShipModule == null)
        {
            $error_message = "Ship module with id=" . $id . " not found!";
            return view('message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        if($myShipModule->count() > 0)
        {
            $crew = $this->getCrewMembers($id);
            return view('shipmodules.crew', ['shipmodule' => $myShipModule, 'crew' => $crew]);
        }
    }
}
