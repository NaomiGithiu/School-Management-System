@include('layouts.app')

<div class="container">
    <div class="post admin">
        <h2 style="color: black">Attendance Management</h2>
        <form action="{{ route('attendance.store') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>
                            <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                            <select name="status[{{ $student->id }}]" class="btn2">
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>
                                <option value="Late">Late</option>
                            </select>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Submit Attendance</button>
        </form>
    </div>
</div>
