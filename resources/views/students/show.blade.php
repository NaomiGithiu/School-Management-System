@include('layouts.app')

    <div class="container">
        <div class="post">
          <h2 style="color: black">Students page</h2>
          <div class="body">
            <p style="color: black">Name: {{$students->name}}</p>
            <p style="color: black">Email: {{$students->email}}</p>
            <p style="color: black">Contact: {{$students->contact}}</p>
          </div>
          
        </div>
    </div>
