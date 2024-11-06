<?php

namespace App\Http\Controllers;

use App\Models\option;
use App\Http\Controllers\Controller;
use App\Http\Requests\OptionStoreRequest;
use Illuminate\Http\Request;
use App\Models\survey;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = option::all();
        $surveys = survey::all();

        return view('option.index', compact('options, surveys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionStoreRequest $request)
    {
        try{
            option::create($request->validated());
            return redirect()->route('option.index')->with('success', 'Option created successfully');
        }catch(\Exception $e){
            return redirect()->route('option.index')->with('error', 'Option creation failed');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, option $option)
    {
        try{
            $option->update($request->all());
            return redirect()->route('option.index')->with('success', 'Option updated successfully');
        }catch(\Exception $e){
            return redirect()->route('option.index')->with('error', 'Option update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(option $option)
    {
        try{
            $option->delete();
            return redirect()->route('option.index')->with('success', 'Option deleted successfully');
        }catch(\Exception $e){
            return redirect()->route('option.index')->with('error', 'Option deletion failed');
        }
    }
}
