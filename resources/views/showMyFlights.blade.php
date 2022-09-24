@extends('layouts.app')

@section('content')

<p hidden>{{$today =date("Y-m-d H:i:s" , strtotime(' + 3 hours'));}}</p>

<h1 style="margin-left: 200px;">Your Flights : </h1>
<h4 style="margin-left: 200px;">
<table style= "border: 1px solid black;">
    <tr>
      <th style = "text-align : center; border: 1px solid black;padding : 3px;"> Name   </th>
      <th style = "text-align : center; border: 1px solid black;padding : 3px;">Flight Number</th>
      <th style = "text-align : center; border: 1px solid black;padding : 3px;">From   </th>
      <th style = "text-align : center; border: 1px solid black;padding : 3px;">To</th>
      <th style = "text-align : center; border: 1px solid black;padding : 3px;">Cost</th>
      <th style = "text-align : center; border: 1px solid black;padding : 3px;">Date</th>
            <th style = "text-align : center; border: 1px solid black;padding : 3px;">Available</th>
            <th style = "text-align : center; border: 1px solid black;padding : 3px;">Statue</th>


    </tr>

    @foreach($book as $bok )
        @if($bok->userid==Auth::user()->id)
        <tr>
           <p hidden> @if(strtotime($bok->date)<strtotime($today)) {{$bol=0}} @else {{$bol=1;}} @endif</p>
            <td style = "text-align : center; border: 1px solid black;padding : 3px;">{{Auth::user()->name}} </td>
            <td style = "text-align : center; border: 1px solid black;padding : 3px;">{{$bok->flight_number}}</td>
            <td style = "text-align : center; border: 1px solid black;padding : 3px;">{{$bok->from}}</td>
            <td style = "text-align : center; border: 1px solid black;padding : 3px;">{{$bok->to}}</td>
            <td style = "text-align : center; border: 1px solid black;padding : 3px;">{{$bok->price}} $</td>
            <td style = "text-align : center; border: 1px solid black;padding : 3px;">{{$bok->date}}</td>
            <td style = "text-align : center; border: 1px solid black;padding : 3px;"> @if($flight = App\Models\Flight::where('id',$bok->flight_number)->first() && $bol==1){{$av="YES"}}  @else {{$av="NO"}} @endif</td>
           <td style = "text-align : center; border: 1px solid black;padding : 3px;">
           @if($bok->approved==1 && $bol==1) Approved
            @elseif($bol==0) Missed
            @elseif($av=="YES"&&$bol==1)
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Confirm"  style="margin-left: 10px;margin-right: 10px;">Cancel Reservation</button></td>
                @else Deleted
            @endif
          </tr>
          <div class="modal fade" id="Confirm" tabindex="-1" aria-labelledby="ConfirmLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="ConfirmLabel">Are you sure ?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('/deletebook/'. $bok->id)}}" method="post" >
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button class ="btn btn-danger" type="submit" style="margin-top: 10px;margin-left: 10px;margin-right: 10px;" >YES</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="margin-top: 10px;margin-left: 10px;margin-right: 10px;margin-bottom:10px">NO</button>
                </form>

              </div>
            </div>
          </div>
        </form>

        @endif

     @endforeach

</table>
</h4>
<h1 style="margin-left: 200px;">Your Balance : {{Auth::user()->balance}} $ </h1><br>

@endsection

