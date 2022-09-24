@extends('layouts.app')

@section('content')


<div class="container">
    <h2 class="text-center">Confirmation</h2>
    <br>
    <form action = "/bookii" method = "post" class="form-group" style="width:70%; margin-left:15%;" action="/action_page.php">

    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

    <label class="form-group">Your ID : <input type="text" class="form-control" name="userid" value={{$iid = Auth::user()->id}} readonly>
        <label class="form-group">Flight Number : <input type="text" class="form-control" name="flight_number" value={{$id}} readonly>

    <label class="form-group">Your name : <input type="text" class="form-control" name="name" value={{$name = Auth::user()->name}} readonly>
    </label>
      <label class="form-group">From :<input type="text" class="form-control"  name="from" value={{$from}} readonly></label>

      <label>To :       <input type="text" class="form-control"  name="to" value={{$to}} readonly>
      </label>
    <label>Cost : <input type="text" class="form-control"  name="price" value={{$price}} readonly></label> $<br><br>
    <label>Date : <input type="datetime" class="form-control"  name="date" value="{{$date}}" readonly ></label>
    <br>
     <h4> Your Remain Balance Is : {{$bal = Auth::user()->balance-$price}} $</h4>
      <br>
      <button type="submit"  value = "books" class="btn btn-primary">Confirm Order</button>
    </form>

  </div>
</section>
@endsection
<!--<input type="text" value="3" class="field left" readonly><form action = "/bookii" method = "post" class="form-group" style="width:70%; margin-left:15%;" action="/action_page.php">

    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<h3>
    <label class="form-group">Your name : {{$name = Auth::user()->name}}</label><br>
      <label class="form-group">From : {{$from}} </label><br>
      <label>To : {{$to}}</label><br>
    <label>Cost : {{$price}} $</label><br>
      <label class="form-group">Date : {{$date}}</label><br>
      <br>
    Your remain balance will be : {{$bal = Auth::user()->balance - $price}} $
    </h3>
      <button type="submit"  value = "book" class="btn btn-primary">Confirm Order</button>
    </form>
    </form>
      <form action = "/edit" method = "put" class="form-group" style="width:70%; margin-left:15%;" action="/action_page.php">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <label>Seats Left : <input type="text" class="form-control"  name="num_of_passengers" value={{$num_of_passengers}} readonly></label> <br>

