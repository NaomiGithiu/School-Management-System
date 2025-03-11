<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Log;

class AttendanceController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('attendance.index', compact('students'));
    }

    public function store(Request $request)
{
    $students = $request->input('student_id'); // Get student IDs

    foreach ($students as $student_id) {
        $status = $request->input('status')[$student_id]; // Get corresponding status

        // Check if attendance already exists for today
        $attendance = Attendance::where('student_id', $student_id)
                                ->whereDate('date', now()->toDateString())
                                ->first();

        if ($attendance) {
            // Update existing record
            $attendance->update(['status' => $status]);
        } else {
            // Create new attendance record
            Attendance::create([
                'student_id' => $student_id,
                'date' => now(),
                'status' => $status,
            ]);
        }
    }

    return redirect()->route('attendance.show')->with('success', 'Attendance recorded successfully!');
}



    public function show()
    {
        $attendances = Attendance::with('student')->get();
        //dd($attendances);
        return view('attendance.show', compact('attendances'));
    }
}
