@include('layouts.app')

<div class="container">
    <div class="post admin">
        <h3 style="color: black">Fee Records</h3>
        <a href="{{ url('fees/create') }}" class="btn2">Add</a>
        
        {{-- term selection --}}
        <form method="GET" action="{{ route('fees.index') }}">
            <label for="term">Select Term:</label>
            <select name="term" onchange="this.form.submit()">
                @foreach($terms as $term)
                    <option value="{{ $term }}" {{ $selectedTerm == $term ? 'selected' : '' }}>{{ $term }}</option>
                @endforeach
            </select>
        </form>

        <table>
            <tr>
                <th>Student</th>
                <th>Total Fee</th>
                <th>Amount Paid</th>
                <th>Balance</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>
            @foreach($fees as $fee)
            <tr>
                <td>{{ $fee->student->name }}</td>
                <td>{{ $fee->total_fee }}</td>
                <td>{{ $fee->amount_paid }}</td>
                <td>{{ $fee->balance }}</td>
                <td>{{ $fee->due_date }}</td>
                <td>
                    <form action="{{ route('fees.update', $fee->id) }}" method="POST">
                        @csrf
                        <input type="number" name="amount_paid" placeholder="Enter Payment">
                        <button type="submit">Pay</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>