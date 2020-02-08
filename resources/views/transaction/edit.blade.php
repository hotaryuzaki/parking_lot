@extends('base')

@section('main')
<div class="row">
  <div class="col-sm-8 offset-sm-2 main">
    <h1 class="title">Edit a Vehicle</h1>
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
        <form method="post" action="{{ route('transaction.update', $transaction->id) }}">
          @method('PATCH')
          @csrf
          <div class="form-group">    
              <label for="vehicle_no">Vehicle No:</label>
              <input type="text" class="form-control" name="vehicle_no" value="{{ $transaction->vehicle_no }}"/>
          </div>
          <div class="form-group">
              <label for="vehicle_type">Vehicle Type:</label>
              <input type="text" class="form-control" name="vehicle_type" value="{{ $transaction->vehicle_type }}"/>
          </div>
          <div class="form-group">
              <label for="vehicle_brand">Vehicle Brand:</label>
              <input type="text" class="form-control" name="vehicle_brand" value="{{ $transaction->vehicle_brand }}"/>
          </div>
          <div class="form-group">
              <label for="vehicle_color">Vehicle Color:</label>
              <input type="text" class="form-control" name="vehicle_color" value="{{ $transaction->vehicle_color }}"/>
          </div>
          <div class="form-group">
              <label for="id_slot">ID Slot:</label>
              <input type="text" class="form-control" name="id_slot" value="{{ $transaction->id_slot }}"/>
          </div>
          <div class="form-group">
              <label for="payment_type">Payment Type:</label>
              <input type="text" class="form-control" name="payment_type" value="{{ $transaction->payment_type }}"/>
          </div>
          <div class="form-group">
              <label for="parking_bill">Parking Bill:</label>
              <input type="text" class="form-control" name="parking_bill" value="{{ $transaction->parking_bill }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Vehicle</button>
        </form>
    </div>
  </div>
</div>
@endsection