<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipModules;

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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
            return view('shipmodules.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
