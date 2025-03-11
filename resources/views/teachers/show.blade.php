@include('layouts.app')

    <div class="container">
        <div class="post">
          <h2 style="color: black">Teachers page</h2>
          <div class="body">
            <p style="color: black">Name: {{$teachers->name}}</p>
            <p style="color: black">Email: {{$teachers->email}}</p>
            <p style="color: black">Contact: {{$teachers->contact}}</p>
          </div>
          
        </div>
    </div>
