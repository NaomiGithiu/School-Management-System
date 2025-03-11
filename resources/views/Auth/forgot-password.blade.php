@include('layouts.app')
<div class="container">
    <div class="post form">

            <div class="error">
                @if (session('status'))
                {{session('status')}}
                @endif
            </div>
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <label>Email:</label>
            <input type="email" name="email" required>
            <button type="submit">Send Password Reset Link</button>
        </form>
            @if(session('message'))
                <p>{{ session('message') }}</p>
            @endif

</div>
</div>
