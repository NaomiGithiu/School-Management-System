<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:subjects',
            'code' => 'required',
        ]);

        Subject::create($request->all());
        return redirect()->route('subjects.index')->with('success', 'Subject added successfully!');
    }
    public function create()
    {
        $subjects = Subject::all(); // Fetch all students
        return view('subjects.create', compact('subjects')); // Pass students to the view
    }
    
}

