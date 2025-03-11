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
                    <p>Set your Password</p>
                </div>

                <div>
                    <p class="label">Password: </p>
                    <label for="password" class="sr-only">password</label>
                    <input type="password" name="password" id="password" placeholder="Your password" class="input" value="{{old('email')}}">

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

                <div >
                    <button type="submit" class="btn2">Set Password</button>
                </div>
            </form>
        </div>
        
    </div>

    
