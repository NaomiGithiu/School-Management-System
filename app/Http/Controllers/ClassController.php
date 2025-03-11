<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClass;
use App\Models\Subject;

class ClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::with('subjects')->get();
        return view('classes.index', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:school_classes',
            'capacity' => 'nullable|integer|min:1',
            'subjects' => 'required|array', // Validate subjects input
            'subjects.*' => 'exists:subjects,id', // Ensure subjects exist
        ]);
    
        // Create the class
        $class = SchoolClass::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
        ]);
        
        //dd($request->all());

        // Assign subjects to the class
        $class->subjects()->sync($request->subjects);
    
        return redirect()->route('classes.index')->with('success', 'Class added successfully with subjects!');
    }
    

    public function assignSubjects(Request $request, SchoolClass $class)
    {
        $request->validate([
            'subjects' => 'required|array',
            'capacity' => 'required',
            //'subjects.*' => 'exists:subjects,id',
        ]);

        $class->subjects()->sync($request->subjects);
        return redirect()->route('classes.index')->with('success', 'Subjects assigned successfully!');
    }

    public function create()
    {
        $subjects = Subject::all(); // Fetch all students
        return view('classes.create', compact('subjects')); // Pass students to the view
    }

}
