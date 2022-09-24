@extends('layouts.app')

@section('content')

<h1>Available flights : </h1>

    @if(Session::has('message'))
        <div class = "alert alert-success" role="alert">{{Session::get('message')}}
        @endif
    @foreach($flights as $flight)
    @if($flights['num_of_passengers']>=0)
        <h3>From {{$flight ['from']}}
        To {{$flight ['to']}}</h3>
        @if(Auth::user()->id==1||Auth::user()->id==2)
           <form action="{{url('/delete/'. $flight->id)}}" method="post">
            {{method_field('DELETE')}}
            {{csrf_field()}}
            <button class ="btn btn-danger" type="submit">Delete</button>

           </form>
           <br>
           @endif
     </div>
        <div class="photo">
            <a href="/booking/{{$flight ['from']}}/{{$flight ['to']}}/{{$flight ['id']}}/{{$flight ['price']}}/{{$flight ['date']}}/{{$flight ['num_of_passengers']}}"><img src="http://127.0.0.1:8000/images/{{$flight ['to']}}.jpg" width="200" height="150"></a>
        </div>
        <!--<a href="#" style ="margin-right:10px;" wire:click.prevent="deleteflight({/{$flight['id']}})"><i class="fa fa-times fa-2x text-danger "></i></a>-->

    @endif
    @endforeach
    <br>
    {{$flights->links('pagination::bootstrap-4')}}
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
     <br>
    </body>
    </html>





@endsection
