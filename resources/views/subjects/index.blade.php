@include('layouts.app')

<div class="container">
    <div class="post admin">
        <h2 style="color: black">Subjects</h2>
        <a href="{{ route('subjects/create') }}" class="btn2">Add</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->code }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

