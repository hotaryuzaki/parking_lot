@extends('base')

@section('main')
<div class="row">
  <div class="col-sm-8 offset-sm-2 main">
    <h1 class="title">Setup Parking</h1>
    <div>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div><br />
      @endif
      
      <form method="post" action="{{ route('setup-parking.update', $setup_parking->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="parking_name">Parking Name:</label>
          <input type="text" class="form-control" name="parking_name" value="{{ $setup_parking->parking_name }}"/>
        </div>
        <div class="form-group">
          <label for="parking_slots">Parking Slots:</label>
          <input type="text" class="form-control" name="parking_slots" value="{{ $setup_parking->parking_slots }}"/>
          <small id="parking_time_help" class="form-text text-muted">Be carefull to change this slots!</small>
        </div>
        <button type="submit" class="btn btn-primary">Update Setup</button>
      </form>
    </div>
  </div>
</div>
@endsection