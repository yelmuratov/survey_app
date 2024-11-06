<?php

namespace App\Http\Controllers;

use App\Models\survey;
use App\Http\Controllers\Controller;
use App\Http\Requests\SurveyStoreRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surveys = survey::all();

        return view('survey.index', compact('surveys'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(SurveyStoreRequest $request)
    {
        try{
            survey::create($request->validated());
            return redirect()->route('survey.index')->with('success', 'Survey created successfully');
        }catch(\Exception $e){
            return redirect()->route('survey.index')->with('error', 'Survey creation failed');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, survey $survey)
    {
        try{
            $survey->update($request->all());
            return redirect()->route('survey.index')->with('success', 'Survey updated successfully');
        }catch(\Exception $e){
            return redirect()->route('survey.index')->with('error', 'Survey update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(survey $survey)
    {
        try{
            $survey->delete();
            return redirect()->route('survey.index')->with('success', 'Survey deleted successfully');
        }catch(\Exception $e){
            return redirect()->route('survey.index')->with('error', 'Survey deletion failed');
        }
    }

    public function surveys()
    {   
        $surveys = survey::all();
        $categories = Category::all();
        return view('dashboard.surveys', compact('surveys', 'categories'));
    }

    public function surveyStatusUpdate(Request $request, Survey $survey)
    {
        try {
            // Check if the 'status' value exists in the request
            if ($request->has('status')) {
                $survey->status = $request->status;
                $survey->save();
                return response()->json(['success' => true, 'message' => 'Survey status updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Status value missing']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Survey status update failed']);
        }
    }

}
