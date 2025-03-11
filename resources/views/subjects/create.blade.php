@include('layouts.app')


    <div class="container">
        <div class="post form">
             <h3>Subjects Management</h3>
            <form method="POST" action="{{route('subjects.store')}}">
                @csrf
                <div>
                    <label class="label">Subject_name:</label> <br>
                    <input type="text" name="name" required>
                </div>

                <div>
                    <label class="label">Subject_code:</label><br>
                    <input type="number" name="code" required>
                </div>

                <div>
                    <button type="submit" class="btn2">Add New Subject</button>
                </div>
            </form>
        </div>
    </div>

    @include('partials.footer')





