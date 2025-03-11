@include('layouts.app')

    <div class="container">
        <div class="post">
            <h5 style="color: black">Edit User </h5>
            <form action="{{url('teachers/' . $teachers->id) }}" method="POST">
                @csrf
                @method("PATCH")
                <div>
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name" class="input" value="{{$teachers->name}}">

                    @error('name')
                       <div class="error">
                            {{$message}}
                       </div>
                    @enderror
                </div>

                <div>
                    <label for="email" class="sr-only">email</label>
                    <input type="email" name="email" id="email" placeholder="email" class="input" value="{{$teachers->email}}">
                    @error('email')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="contact" class="sr-only">Contact</label>
                    <input type="contact" name="contact" id="contact" placeholder="contact" class="input" value="{{$teachers->contact}}">
                    @error('contact')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="btn2">Save</button>
                </div>
            </form>
        </div>
    </div>
