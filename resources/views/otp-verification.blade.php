@include('partials.header')


<div class="container">
        <div class="post form">

            <div class="error">
                @if (session('status'))
                {{session('status')}}
                @endif
            </div>

        <form method="POST" action="{{ url('/verifyotp') }}">
                @csrf
                <div>
                    <h2 class="label">Verify Your Account</h2>
                    <p>Enter your OTP</p>
                </div>

                <div>
                    <p class="label">OTP: </p>
                    <label for="token" class="sr-only">otp</label>
                    <input type="text" name="token" id="token" placeholder="Your otp" class="input" value="">

                    @error('otp')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                    <br>

                <div >
                    <button type="submit" class="btn2">Login</button>
                </div>
            </form>
        </div>
        
    </div>

    
