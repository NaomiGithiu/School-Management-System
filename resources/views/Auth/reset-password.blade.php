@include('partials.header')

<div class="container">
    <div class="post form">
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div>
                <p class="label">Reset Your Password</p>
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

            <div>
               <p class="label"> Password: </p>
                <label for="password" class="sr-only">password</label>
                <input type="password" name="password" id="password" placeholder=".........." class="input" value="">
                @error('password')
                    <div class="error">
                        {{$message}}
                    </div>
            @enderror
            </div>
            

            <div>
                <p class="label"> Password: </p>
                 <label for="password" class="sr-only">password</label>
                 <input type="password" name="password_confirmation" id="password" placeholder=".........." class="input" value="">
             </div>
             <button type="submit" class="btn2">Reset Password</button>
        </form>
            @if(session('message'))
                <p>{{ session('message') }}</p>
            @endif 


            {{-- @csrf
            
                <input type="hidden" name="token" value="{{ $token }}">
            <div>
                <label style="display: inline">Email:</label><br>
                <input type="email" name="email" required>
            </div>
            

            <div>
                <label style="display: inline">Password:</label><br>
                <input type="password" name="password" required>
            </div>
            
            <div>
            <label style="display: inline">Confirm Password:</label><br>
            <input type="password" name="password_confirmation" required>
            </div>

            <button type="submit">Reset Password</button>
        </form>
            @if(session('message'))
                <p>{{ session('message') }}</p>
            @endif --}}
    </div>
</div>