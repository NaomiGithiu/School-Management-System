<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\SetPasswordMail;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index')->with('teachers', $teachers );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('teachers.create', compact('subjects'));

        // return response()-> view ('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'contact'=> 'required',
            'gender' => 'required',
            'subjects' => 'required|array', // Make sure 'subjects' is an array
            'hire_date' => 'nullable|date',
            'status' => 'nullable|string',
        ]);
    
        // Create User Account for Teacher
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'), // Default/temporary password
        ]);
    
        // Assign Role to the User
        $user->assignRole('teacher');
    
        // Now Create Teacher Record Linked to User
        $teacher = Teacher::create([
            'name' => $request->name,
            'email' => $request->email, // Link Teacher to User
            'contact' => $request->contact,
            'gender' => is_array($request->gender) ? implode(',', $request->gender) : $request->gender, 
            'subjects' => $request->subjects,
            'hire_date' => $request->hire_date,
            'status' => $request->status,
        ]);
    
        // Attach subjects to teacher (Ensure Teacher model has a subjects() relationship)
        $teacher->subjects()->attach($request->subjects);
    
        // Generate Password Reset Token and Send Email
        $token = Password::broker()->createToken($user);
        Mail::to($user)->send(new SetPasswordMail($user, $token));
    
        return redirect('teachers')->with('flash_message', 'Teacher added successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::find($id);
        return view('teachers.show')->with('teachers', $teacher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return view('teachers.edit')->with('teachers', $teacher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $input = $request->all();
        $teacher->update($input);
        return redirect('teachers')->with('flash_message', 'teacher updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::destroy($id);
        return redirect ('teachers')->with('flash_message', 'teacher deleted!');
    }
}
