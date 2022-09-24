@extends('layouts.app')

@section('content')




<section class="banner" id="top">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="left-side">

                    <div class="tabs-content">
                        <ul class="social-links">
                            <li><a href="https://www.facebook.com/badee.esmandar">Find us on <em>Facebook</em><i class="fa fa-facebook"></i></a></li>
                      </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-5 col-md-offset-1">
                <section id="first-tab-group" class="tabgroup">
                    <div id="tab1">
                        <div class="submit-form">
                            <h4>Check availability for direction :</h4>
                            <form id="form-submit" action="" method="get">
                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="from">From :  </label>{{$from}}
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="to">To : </label>{{$to}}
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="date">Departure date : </label>{{$date}}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date">Price : </label>{{$price}} $ For a person
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <label for="date">Seats left : </label>{{$num_of_passengers}}
                                    </div>
                                        <br>

                                        <!--<a href="http://127.0.0.1:8000/home" class="btn btn-primary">Go to Google</a>
                                        --><?php $bal = Auth::user()->balance?>
                                                    <?php
                                                    $credit = Auth::user()->credit;
                                                    $userid = Auth::user()->id;
                                                        ?>
                                       @if($num_of_passengers==0)
                                        <br><br> <h4 color="red">Unfortunately This Flight Is Full</h4><a href ="http://127.0.0.1:8000/home"class="btn btn-primary">Return Home</a>
                                             @elseif($bal>=$price)
                                        <a href="http://127.0.0.1:8000/booki/{{$from}}/{{$to}}/{{$id}}/{{$price}}/{{$date}}/{{$userid}}/{{$num_of_passengers}}" class="btn btn-primary">Order Ticket</a>
                                        
                                        @else <br><br> <h4 color="red">Unfortunately Your Balance {{$bal}} $ is less Than Required</h4><a href="http://127.0.0.1:8000/home" class="btn btn-primary">Return Home</a>
                                        @endif







                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
@endsection
<!--$name = Auth::user()->name -->
<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Confirm">Check</button>
<form action="/action_page.php" method="get">
<input id="number" type=" number" name="number" required>
<input type="submit" value="Sum" name="Submit1">
</*?php
$credit = Auth::user()->credit;
   if($_GET["number"]==$credit)


   ?>
</form>
<!
<div class="modal fade" id="Confirm" tabindex="-1" aria-labelledby="ConfirmLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ConfirmLabel">Order in progress</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if ($bal>=$price)
           <h2> Your balance Now :{{$bal}}$</h2>
            <br>
                                     <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

        </div>
            @else Unfortunately your balance is less than required . <br> Your Balance is {{$bal}}$
            @endif
      </div>
    </div>
  </div>
