<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\Student;

class FeeController extends Controller
{
    // Display Fee Records
    public function index(Request $request)
    {
        // $fees = Fee::with('student')->get();
        // return view('fees.index', compact('fees'));

        $terms = Fee::select('term')->distinct()->pluck('term'); // Get unique terms
        $selectedTerm = $request->input('term', $terms->first()); // Default to the first term

        $fees = Fee::with('student')
               ->where('term', $selectedTerm)
               ->get();

        return view('fees.index', compact('fees', 'terms', 'selectedTerm'));
    }


    public function store(Request $request)
{
    $request->validate([
        'student_id' => 'required|exists:employees,id',
        'total_fee' => 'required|numeric|min:0',
        'amount_paid' => 'required|numeric|min:0',
        'due_date' => 'required|date',
        'term' => 'required|string' // Example: "Term 1 2025"
    ]);

    // Check if the student already has a record for this term
    $existingFee = Fee::where('student_id', $request->student_id)
                      ->where('term', $request->term)
                      ->first();

    if ($existingFee) {
        return redirect()->back()->with('error', 'This student already has a fee record for this term.');
    }

    // Calculate balance
    $balance = $request->total_fee - $request->amount_paid;

    // Create new fee record
    Fee::create([
        'student_id' => $request->student_id,
        'term' => $request->term,
        'total_fee' => $request->total_fee,
        'amount_paid' => $request->amount_paid,
        'balance' => $balance,
        'due_date' => $request->due_date,
    ]);

    return redirect()->route('fees.index')->with('success', 'Fee record added successfully!');
}


    // Store Fee Details
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'student_id' => 'required|exists:employees,id',
    //         'total_fee' => 'required|numeric|min:0',
    //         'amount_paid' => 'required|numeric|min:0',
    //         'due_date' => 'required|date',
    //     ]);

    //     $balance = $request->total_fee - $request->amount_paid;

    //     Fee::create([
    //         'student_id' => $request->student_id,
    //         'total_fee' => $request->total_fee,
    //         'amount_paid' => $request->amount_paid,
    //         'balance' => $balance,
    //         'due_date' => $request->due_date,
    //     ]);

    //     return redirect()->route('fees.index')->with('success', 'Fee record added successfully!');
    // }

    // Update Fee Payments
    public function update(Request $request, Fee $fee)
    {
        $request->validate([
            'amount_paid' => 'required|numeric|min:0',
        ]);

        $fee->amount_paid += $request->amount_paid;
        $fee->balance = $fee->total_fee - $fee->amount_paid;
        $fee->save();

        return redirect()->route('fees.index')->with('success', 'Payment updated successfully!');
    }
    public function create()
{
    $students = Student::all(); // Fetch all students
    return view('fees.create', compact('students')); // Pass students to the view
}
public function feeSummary()
{
    $totalCollected = Fee::sum('amount_paid'); // Total fees collected
    $totalFees = Fee::sum('total_fee'); // Total expected fees
    $totalBalance = Fee::sum('balance'); // Total outstanding balance
    $studentsWithOutstanding = Fee::where('balance', '>', 0)->count(); // Students with outstanding balance

    if ($totalFees == 0 && $totalCollected == 0) {
        return "No fee data found in the database. Please add records.";
    }
    //dd($totalFees, $totalCollected, $totalBalance, $studentsWithOutstanding);

    return view('admin.dashboard', [
        'totalCollected' => $totalCollected,
        'totalFees' => $totalFees,
        'totalBalance' => $totalBalance,
        'studentsWithOutstanding' => $studentsWithOutstanding
    ]);
}

}
