@include('layouts.app')

<div class="container">
    <div class="post admin">
        <h2 style="color: black">Classes</h2>
        <a href="{{ route('classes/create') }}" class="btn2">Add</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Capacity</th>
                    <th>Subjects</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classes as $class)
                <tr>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->capacity }}</td>
                    <td>
                        @foreach($class->subjects as $subject)
                            {{ $subject->name }},
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

