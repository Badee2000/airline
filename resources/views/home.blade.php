@extends('layouts.app')

@section('content')

<h1 style="margin-left: 5px;">Available flights : </h1>
<br>
<div>
@if(Session::has('message'))
<div  class = "alert alert-success" role="alert">{{Session::get('message')}}
@endif
<br>
</div>
        <div style="margin-left: 5px;">
    @foreach($flights as $flight)

        <h3>From {{$flight ['from']}}
        To {{$flight ['to']}}</h3>

         </div>
     </div>

        <div class="photo" style="margin-left: 10px;">
            <a href="/booking/{{$flight ['from']}}/{{$flight ['to']}}/{{$flight ['id']}}/{{$flight ['price']}}/{{$flight ['date']}}/{{$flight ['num_of_passengers']}}"><img src="http://127.0.0.1:8000/images/{{$flight ['to']}}.jpg" width="200" height="150"></a>
        </div>
        <br>

        <!--<a href="#" style ="margin-right:10px;" wire:click.prevent="deleteflight({/{$flight['id']}})"><i class="fa fa-times fa-2x text-danger "></i></a>-->

        @if(Auth::user()->id==1||Auth::user()->id==2)
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Confirm"  style="margin-left: 10px;">Delete Flight</button>
        <div class="modal fade" id="Confirm" tabindex="-1" aria-labelledby="ConfirmLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="ConfirmLabel">Are you sure ?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('/delete/'. $flight->id)}}" method="post" >
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button class ="btn btn-danger" type="submit" style="margin-top: 10px;margin-left: 10px;margin-bottom:10px" >Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="margin-top: 10px;margin-left: 10px;margin-bottom:10px">Close</button>
                </form>

              </div>
            </div>
          </div>




         @endif
         <hr>

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
    </body>
    </html>





@endsection
