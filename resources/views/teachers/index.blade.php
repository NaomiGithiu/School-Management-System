@include('layouts.app')

    <div class="container">
        <div class="post admin">
            <a href="{{ url('teachers/create') }}" class="btn2">Add</a>
          <table>
            <thead>
              <tr>
                <th class="table_header">id</th>
                <th class="table_header">Name</th>
                <th class="table_header">Email</th>
                <th class="table_header">Contact</th>
                <th class="table_header">Gender</th>
                <th class="table_header">Subject</th>
                <th class="table_header">Hire-date</th>
                <th class="table_header">Status</th>
                <th class="table_header">Created_at</th>
                <th class="table_header">Updated_at</th>
                <th class="table_header">Action</th>
              </tr>
            </thead>

            <tbody>
               @foreach ($teachers as $item )
              <tr>
                    <td class="table_data">{{$loop->iteration}}</td>
                    <td class="table_data">{{$item->name}}</td>
                    <td class="table_data">{{$item->email}}</td>
                    <td class="table_data">{{$item->contact}}</td>
                    <td class="table_data">{{$item->gender}}</td>
                    <td class="table_data">
                        @foreach ($item->subjects as $subject)
                            {{ $subject->name }}{{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    </td>
                    <td class="table_data">{{$item->hire_date}}</td>
                    <td class="table_data">{{$item->status}}</td>
                    <td class="table_data">{{$item->created_at}}</td>
                    <td class="table_data">{{$item->updated_at}}</td>
                    <td class="table_data"> 
                      {{-- <a href="{{ url('students/' . $item->id) }}" class="btn">view</a>--}}

                      <form action="{{url('teachers/' .$item->id)}}" style="display: inline">
                        <button class="deletebtn btn" >View</button>
                      </form>

                      <a href="{{ url('teachers/' . $item->id . '/edit') }}" class="btn edit">Edit</a> 

                      {{-- <form action="{{url('students/' .$item->id)}}"  style="display: inline">
                        @csrf
                        <button class="deletebtn edit">Edit</button>
                      </form> --}}
                      
                      <form action="{{url('teachers/' .$item->id)}}" method="POST" style="display: inline">
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
