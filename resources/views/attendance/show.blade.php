@include('layouts.app')

<div class="container">
    <div class="post admin">
        <h2 style="color: black">Attendance Records</h2>
        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->student->name }}</td>
                        <td>{{ $attendance->date }}</td>
                        <td>{{ ucfirst($attendance->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

