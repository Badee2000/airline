@extends('layouts.app')

@section('content')

<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h2 class="text-center">Add Flight</h2>
    <br>
    <form action = "/add" method = "post" class="form-group" style="width:70%; margin-left:15%;" action="/action_page.php">

    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

      <label class="form-group">From :</label>
      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="From" name="from" required autocomplete="name" value="{{ old('from') }}"autofocus>
      @error('name')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
      <label>To :</label>
      <input type="text" class="form-control" placeholder="To" name="to"value="{{ old('to') }}">
    <label>Price :</label>
    <input type="text" class="form-control" placeholder="In $" name="price" value="{{ old('price') }}"><br>
  <label>Number of passengers :</label>
      <input type="text" class="form-control"placeholder="Less than 1000" name="num_of_passengers" value="{{ old('num_of_passengers') }}"><br>
      <label class="form-group">Date : </label>
      <input type="datetime-local" class="form-control" placeholder="" name="date" value="{{ old('date') }}">
      <br>

      <button type="submit"  value = "Add Flight" class="btn btn-primary">Add</button>
    </form>

  </div>

@endsection

<!--<div class ="row">
    <form method="POST" action="{{ route('welcome.create') }}">

        @csrf

        <div class="form-group">
            <div class="row mb-3">
                <label for="from" class="col-md-4 col-form-label text-md-end">{{ __('From') }}</label>
                <div class="col-md-6">
                    <input id="from" type="text" class="form-control @error('from') is-invalid @enderror" name="from" value="{{ old('from') }}" required autocomplete="from" autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label for="to" class="col-md-4 col-form-label text-md-end">{{ __('To') }}</label>
                <div class="col-md-6">
                    <input id="to" type="text" class="form-control @error('to') is-invalid @enderror" name="to" value="{{ old('to') }}" required autocomplete="to" autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>
                <div class="col-md-6">
                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label for="num_of_passengers" class="col-md-4 col-form-label text-md-end">{{ __('Num') }}</label>
                <div class="col-md-6">
                    <input id="num_of_passengers" type="text" class="form-control @error('num_of_passengers') is-invalid @enderror" name="num_of_passengers" value="{{ old('price') }}" required autocomplete="num_of_passengers" autofocus>
                </div>
            </div>


        <div class="row mb-1">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Add') }}
                </button>
            </div>
        </div>
        </div>
    </form>
</div>-->
