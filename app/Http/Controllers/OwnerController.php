<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = Owner::paginate(10);
        return response()->json($owners, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $owner = new Owner;
        $owner->name = $request->name;
        $owner->city = $request->city;
        $owner->age = $request->age;
        $owner->save();

        return response()->json(["message" => "owner added"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
        if (!empty($owner))
        {
            return response()->json($owner);
        }
        else
        {
            return response()->json(["message" => "owner not found"], 201); 
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owner $owner)
    {
        if (!empty($owner))
        {
            $owner->name = is_null($request->name) ? $owner->name : $request->name;
            $owner->city = is_null($request->city) ? $owner->city : $request->city;
            $owner->age = is_null($request->age) ? $owner->age : $request->age;

            $owner->save();
            return response()->json(["message" => "owner updated"], 201);
        }
        else
        {
            return response()->json(["message" => "owner not found"], 404); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        if (!empty($owner))
        {
            $owner->delete();
            return response()->json(["message" => "owner deleted"], 201);
        }
        else
        {
            return response()->json(["message" => "owner not found"], 404); 
        }
    }
}
