@extends('layouts.app')

@section('content')
<h1 style="margin-left: 200px;">Flights To Approve : </h1>
<h4 style="margin-left: 200px;">
<table style= "border: 1px solid black;">
    <tr>
      <th style = "text-align : center; border: 1px solid black;padding : 3px;"> User's First Name   </th>
      <th style = "text-align : center; border: 1px solid black;padding : 3px;"> User ID</th>
      <th style = "text-align : center; border: 1px solid black;padding : 3px;">Flight Number</th>
      <th style = "text-align : center; border: 1px solid black;padding : 3px;">From   </th>
      <th style = "text-align : center; border: 1px solid black;padding : 3px;">To</th>
      <th style = "text-align : center; border: 1px solid black;padding : 3px;">Approving</th>


    </tr>
@foreach($book as $bok )
@if($bok->approved==0)
<td style = "text-align : center; border: 1px solid black;padding : 3px;">{{$bok->name}} </td>
<td style = "text-align : center; border: 1px solid black;padding : 3px;">{{$bok->userid}} </td>
<td style = "text-align : center; border: 1px solid black;padding : 3px;">{{$bok->flight_number}}</td>
<td style = "text-align : center; border: 1px solid black;padding : 3px;">{{$bok->from}}</td>
<td style = "text-align : center; border: 1px solid black;padding : 3px;">{{$bok->to}}</td>
<td style = "text-align : center; border: 1px solid black;padding : 3px;"> <button type="button" class="btn btn-primary" style="margin-left: 10px;margin-right: 10px;">Approve</button></td>
<tr>
@endif
@endforeach
@endsection
