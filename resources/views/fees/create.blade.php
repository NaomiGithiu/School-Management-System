@include('layouts.app')


    <div class="container">
        <div class="post ">

            <div class="error">
                @if (session('error'))
                {{session('error')}}
                @endif
            </div>

             <h3 style="color: black ">Fee Management</h3>
            <form method="POST" action="{{route('fees.store')}}">
                @csrf
                <div>
                    <label for="student_id">Student:</label><br>
                    <select name="student_id" required>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="term">Term:</label><br>
                    <select name="term" required>
                        <option value="Term 1 2025">Term 1 2025</option>
                        <option value="Term 2 2025">Term 2 2025</option>
                        <option value="Term 3 2025">Term 3 2025</option>
                    </select>
                </div>

                <div>
                    <label>Total Fee:</label> <br>
                    <input type="number" name="total_fee" required>
                </div>

                <div>
                    <label>Amount Paid:</label><br>
                    <input type="number" name="amount_paid" required>
                </div>

                <div>
                    <label>Due Date:</label><br>
                    <input type="date" name="due_date" required>
                </div>

                <div>
                    <button type="submit" class="btn2">Add Fee Record</button>
                </div>
            </form>
        </div>
    </div>

    @include('partials.footer')






    <form action="{{ route('fees.store') }}" method="POST">
        @csrf
        <label for="student_id">Select Student:</label>
        <select name="student_id" required>
            @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
    
        <label for="term">Term:</label>
        <select name="term" required>
            <option value="Term 1 2025">Term 1 2025</option>
            <option value="Term 2 2025">Term 2 2025</option>
            <option value="Term 3 2025">Term 3 2025</option>
        </select>
    
        <label for="total_fee">Total Fee:</label>
        <input type="number" name="total_fee" required>
    
        <label for="amount_paid">Amount Paid:</label>
        <input type="number" name="amount_paid" required>
    
        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" required>
    
        <button type="submit">Submit</button>
    </form>
    