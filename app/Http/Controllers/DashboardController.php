<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Fee;

class DashboardController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function admin()
    {
        $totalTeachers = User::role('teacher')->count(); // Using Spatie to get users with 'teacher' role
        $totalStudents = User::role('student')->count();


        // Get total attendance records
        $total_attendance = Attendance::count();

        // Get today's attendance count
        $today_attendance = Attendance::whereDate('date', now()->toDateString())->count();

        // Get total present and absent count
        $present_count = Attendance::where('status', 'present')->count();
        $absent_count = Attendance::where('status', 'absent')->count();

        // Fetch recent attendance records
        $recent_attendance = Attendance::with('student')->latest()->take(10)->get();

          // fee summary
        $totalCollected = Fee::sum('amount_paid'); 
        $totalFees = Fee::sum('total_fee'); 
        $totalBalance = Fee::sum('balance'); 
        $studentsWithOutstanding = Fee::where('balance', '>', 0)->count(); 

        return view('dashboards.admin', compact('totalTeachers', 'totalStudents', 'total_attendance', 'today_attendance', 'present_count', 'absent_count', 'recent_attendance', 'totalCollected', 'totalFees', 'totalBalance', 'studentsWithOutstanding'));
        
        //return view('dashboards.admin');
    }

    public function teacher()
    {
        return view('dashboards.teacher');
    }

    public function parent()
    {
        return view('dashboards.parent');
    }

    public function student()
    {
        return view('dashboards.student');
    }
}
