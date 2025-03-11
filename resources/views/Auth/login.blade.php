@include('partials.header')


<div class="container">
        <div class="post form">

            <div class="error">
                @if (session('status'))
                {{session('status')}}
                @endif
            </div>

            <form method="POST" action="{{Route('store')}}">
                @csrf
                <div>
                    <h2 class="label">WELCOME BACK</h2>
                    <p>Enter your login details</p>
                </div>

                <div>
                    <p class="label">Email: </p>
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
                   <p class="label"> Password: </p>
                    <label for="password" class="sr-only">password</label>
                    <input type="password" name="password" id="password" placeholder=".........." class="input" value="">
                </div>

                <div>
                    <a href="{{route('password.email')}}">Forgot Password</a>
                </div>

                <br>

                <div >
                    <button type="submit" class="btn2">Login</button>
                </div>

                <div>
                    <p>Don't have an account <span class="signup" style="color: red"><a href="{{Route('register')}}">Sign up</a></span></p>
                </div>
            </form>
        </div>
        
    </div>

    
