@include('layouts.app')


    <div class="container">
        <div class="post">
             <h3 style="color: black">Add new user</h3>
            <form method="POST" action="{{url('students')}}">
                @csrf
                <div>
                    <p style="display:inline; color:black">Name:</p>
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name" class="input" value="{{old('name')}}">

                    @error('name')
                       <div class="error">
                            {{$message}}
                       </div>
                    @enderror
                </div>

                <div>
                    <p style="display:inline; color:black">Student_id:</p>
                    <label for="student_id" class="sr-only">Student_id</label>
                    <input type="text" name="student_id" id="student_id" placeholder="student_id" class="input" value="{{old('student_id')}}">

                    @error('name')
                       <div class="error">
                            {{$message}}
                       </div>
                    @enderror
                </div>

                <div>
                   <p style="display:inline; color:black"> Email:</p>
                    <label for="email" class="sr-only">email</label>
                    <input type="email" name="email" id="email" placeholder="email" class="input" value="{{old('email')}}">
                    @error('email')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div>
                    <p style="display:inline; color:black">Contact:</p>
                    <label for="contact" class="sr-only">Contact</label>
                    <input type="contact" name="contact" id="contact" placeholder="contact" class="input" value="{{old('contact')}}">
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

    @include('partials.footer')