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
                    
                    <p>Enter your OTP</p>
                </div>

                <div>
                    <p class="label">Mobile No: </p>
                    <label for="mobile_no" class="sr-only">mobile_no</label>
                    <input type="mobile_no" name="mobile_no" id="mobile_no" placeholder="Your mobile_no" class="input" value="{{old('email')}}">

                    @error('mobile_no')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                    <br>

                <div>
                   <p class="label"> OTP: </p>
                    <label for="otp" class="sr-only">otp</label>
                    <input type="otp" name="otp" id="otp" placeholder=".........." class="input" value="">
                </div>

                <br>

                <div >
                    <button type="submit" class="btn2">Login</button>
                </div>
            </form>
        </div>
        
    </div>

    
