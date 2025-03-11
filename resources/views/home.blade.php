@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="post">
          @if (session('activated'))
            <div class="alert alert-success" role="alert">
              {{session('activated')}}
            </div>
          @endif

          {{__('you are logged in')}}
        </div>
    </div>
@endsection