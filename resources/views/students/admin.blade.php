@include('layouts.app')

    <div class="container">
        <div class="post admin">
            <a href="{{ url('students/create') }}" class="btn2">Add</a>
          <table>
            <thead>
              <tr>
                <th class="table_header">id</th>
                <th class="table_header">Name</th>
                <th class="table_header">Student_id</th>
                <th class="table_header">Email</th>
                <th class="table_header">Contact</th>
                <th class="table_header">Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($students as $item )
              <tr>
                    <td class="table_data">{{$loop->iteration}}</td>
                    <td class="table_data">{{$item->name}}</td>
                    <td class="table_data">{{$item->student_id}}</td>
                    <td class="table_data">{{$item->email}}</td>
                    <td class="table_data">{{$item->contact}}</td>
                    <td class="table_data">
                      {{-- <a href="{{ url('students/' . $item->id) }}" class="btn">view</a>--}}

                      <form action="{{url('students/' .$item->id)}}" style="display: inline">
                        <button class="deletebtn btn" >View</button>
                      </form>

                      <a href="{{ url('students/' . $item->id . '/edit') }}" class="btn edit">Edit</a> 

                      {{-- <form action="{{url('students/' .$item->id)}}"  style="display: inline">
                        @csrf
                        <button class="deletebtn edit">Edit</button>
                      </form> --}}
                      
                      <form action="{{url('students/' .$item->id)}}" method="POST" style="display: inline">
                        {{method_field('DELETE')}}
                        @csrf
                        <button type="submit" class="deletebtn" title="Delete students" onclick="return confirm('confirm delete')">Delete</button>
                      </form>
                    </td>
  
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
    </div>

    @include('partials.footer')
