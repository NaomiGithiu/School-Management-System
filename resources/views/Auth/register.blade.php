@include('partials.header')

    <div class="container">
        <div class="post form">
            <form method="POST" action="{{Route('register')}}">
                @csrf
                <h2 class="label">Register an Account for free</h2>
                <div>
                    <p class="label">Name:</p>
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your Name" class="input" value="{{old('name')}}">

                    @error('name')
                       <div class="error">
                            {{$message}}
                       </div>
                    @enderror
                </div>
                <br>

               <div>
                    <p class="label">Mobile No:</p>
                    <label for="mobile_no" class="sr-only">Mobile No</label>
                    <input type="text" name="mobile_no" id="mobile_no" placeholder="Your mobile_no" class="input" value="{{old('username')}}">

                    @error('mobile_no')
                       <div class="error">
                            {{$message}}
                       </div>
                    @enderror
                </div> 
                <br>
                
                <div>
                    <p class="label">Email:</p>
                    <label for="email" class="sr-only">email</label>
                    <input type="email" name="email" id="email" placeholder="Your email" class="input" value="{{old('email')}}">

                    @error('email')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <br>

                <div>
                    <p class="label">Password:</p>
                    <label for="password" class="sr-only">password</label>
                    <input type="password" name="password" id="password" placeholder="Your password" class="input" value="">

                    @error('password')
                        <div class="error">
                            {{$message}}
                        </div>
                     @enderror
                </div>
                <br>

                <div>
                    <p class="label">Password:</p>
                    <label for="password_confirmation" class="sr-only">password again</label>
                    <input type="password" name="password_confirmation" id="password" placeholder="Repeat your Password" class="input" value="">
                </div>
                <br>

                <div>
                    <button type="submit" class="btn2">Register</button>
                </div>
                <div>
                    <p>Already have an account? <span style="color: red"><a href="{{Route('login')}}">Sign in</a></span></p>
                </div>
            </form>
        </div>
    </div>


