@extends('base')

@section('main')
<div class="row">
  <div class="col-sm-8 offset-sm-2 main">
    <h1 class="title">Add a Vehicle</h1>
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
        <form method="post" action="{{ route('transaction.store') }}">
            @csrf
            <div class="form-group">    
                <label for="vehicle_no">Vehicle No:</label>
                <input type="text" class="form-control" name="vehicle_no"/>
            </div>
            <div class="form-group">
                <label for="vehicle_type">Vehicle Type:</label>
                <input type="text" class="form-control" name="vehicle_type"/>
            </div>
            <div class="form-group">
                <label for="vehicle_brand">Vehicle Brand:</label>
                <input type="text" class="form-control" name="vehicle_brand"/>
            </div>
            <div class="form-group">
                <label for="vehicle_color">Vehicle Color:</label>
                <input type="text" class="form-control" name="vehicle_color"/>
            </div>
            <button type="submit" class="btn btn-primary">Add Vehicle</button>
        </form>
    </div>
  </div>
</div>
@endsection