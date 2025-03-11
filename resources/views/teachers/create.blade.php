@include('layouts.app')


    <div class="container">
        <div class="post form">
             <h3 class="label">Add new Teacher</h3>
            <form method="POST" action="{{url('teachers')}}">
                @csrf
                <div>
                    <p class="label" style="display:inline">Name:</p>
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name" class="input" value="{{old('name')}}">

                    @error('name')
                       <div class="error">
                            {{$message}}
                       </div>
                    @enderror
                </div>

                <div>
                   <p class="label" style="display:inline"> Email:</p>
                    <label for="email" class="sr-only">email</label>
                    <input type="email" name="email" id="email" placeholder="email" class="input" value="{{old('email')}}">
                    @error('email')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div>
                    <p class="label" style="display:inline">Contact:</p>
                    <label for="contact" class="sr-only">Contact</label>
                    <input type="contact" name="contact" id="contact" placeholder="contact" class="input" value="{{old('contact')}}">
                    @error('contact')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div>
                    <p class="label" style="display:inline">Gender:</p>
                    
                    <label for="male" class="label">Male</label>
                    <input type="checkbox" name="gender[]" id="male" value="Male" {{ (is_array(old('gender')) && in_array('Male', old('gender'))) ? 'checked' : '' }}>
                
                    <label for="female" class="label">Female</label>
                    <input type="radio" name="gender[]" id="female" value="Female" {{ (is_array(old('gender')) && in_array('Female', old('gender'))) ? 'checked' : '' }}>
                
                    <label for="other" class="label">Other</label>
                    <input type="checkbox" name="gender[]" id="other" value="Other" {{ (is_array(old('gender')) && in_array('Other', old('gender'))) ? 'checked' : '' }}>
                
                    @error('gender')
                    <div class="error">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                

                <div>
                    <p class="label" style="display:inline;">Subjects:</p>
                    <label for="subject" class="sr-only">Subject</label>
                    <select name="subjects[]"  id="subjects" multiple="multiple" required>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    @error('subjects') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div>
                    <p class="label" style="display:inline;">Hire_date:</p>
                    <label for="hire_date" class="sr-only">Hire_date</label>
                    <input type="date" name="hire_date" id="hire_date" placeholder="hire_date" class="input" value="{{old('hire_date')}}">
                    @error('hire_date')
                    <div class="error">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                
                <div>
                    <p class="label" style="display:inline;">Status:</p>
                    <label for="status" class="sr-only">Status</label>
                    <input type="hidden" name="status" id="status" value="inactive"> <!-- Default Inactive -->
                    <input type="text" class="input" value="Inactive" readonly> <!-- Visible but not editable -->
                </div>
                

                <div>
                    <p class="label" style="display:inline; ">Created_at:</p>
                    <label for="created_at" class="sr-only">Created_at</label>
                    <input type="created_at" name="created_at" id="created_at" placeholder="created_at" class="input" value="{{old('created_at')}}">
                </div>

                <div>
                    <p class="label" style="display:inline;">Updated_at:</p>
                    <label for="updated_at" class="sr-only">Updated_at</label>
                    <input type="updated_at" name="updated_at" id="updated_at" placeholder="updated_at" class="input" value="{{old('updated_at')}}">
                    @error('contact')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
                </div>                

                <div>
                    <button type="submit" class="btn2">ADD</button>
                </div>
            </form>
        </div>
    </div>

<!-- Include Select2 CSS -->
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
            width: '100%', // Make it responsive
        });
    });
</script>

    @include('partials.footer')