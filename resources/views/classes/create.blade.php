@include('layouts.app')


    <div class="container">
        <div class="post form">
             <h3>Subjects Management</h3>
            <form method="POST" action="{{route('classes.store')}}">
                @csrf
                <div>
                    <label class="label">Class_name:</label> <br>
                    <input type="text" name="name" required>
                </div>

                <div>
                    <label class="label">Capacity:</label><br>
                    <input type="number" name="capacity" required>
                </div>

                <div>
                    <p class="label" style="display:inline;">Subjects:</p>
                    <label for="subject" class="sr-only">Subject</label><br>
                    <select name="subjects[]"  id="subjects" multiple="multiple" required>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    @error('subjects') <div class="error">{{ $message }}</div> @enderror
                </div>
                

                <div>
                    <button type="submit" class="btn2">Add New Class</button>
                </div>
            </form>
        </div>
    </div>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Initialize Select2 -->
<script>
    $(document).ready(function() {
        $('#subjects').select2({
            placeholder: "Select Subjects", // Placeholder text
            allowClear: true, // Allow clearing selection
            closeOnSelect: false, // Keep dropdown open after selecting an option
            width: '45%', // Make it responsive
        });
    });
</script>

    @include('partials.footer')





