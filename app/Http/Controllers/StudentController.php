<?php

namespace App\Http\Controllers;

use App\Mail\SetPasswordMail;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User; // Import User Model
use App\Notifications\NewPasswordNotification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.admin')->with('students', $students);
    }

    public function create()
    {
        return response()-> view ('students.create');
    }

    // public function store(Request $request)
    // {
    //     $input = $request->all();
    //     Student::create($input);
    //     return redirect('students')->with('flash_message', 'student added');
    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'student_id' => 'required',
            //'password' => 'required|min:6'
        ]);

        $student = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'student_id' => $request->student_id,
            'password' => bcrypt('password') //default/temporary password
        ]);

        $student->assignRole('student');
        

    // Generate Password Reset Token
         $token = Password::broker()->createToken($student);

    // Send Reset Password Email Notification
        Mail::to($student)->send(new SetPasswordMail($student, $token));

    // saves users details and redirect to students
        $input = $request->all();
        Student::create($input);
        return redirect('students')->with('flash_message', 'student added');

    }

    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show')->with('students', $student);
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit')->with('students', $student);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $input = $request->all();
        $student->update($input);
        return redirect('students')->with('flash_message', 'student updated');
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect ('students')->with('flash_message', 'student deleted!');
    }
}
