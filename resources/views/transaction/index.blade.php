@extends('base')

@section('main')
<div class="row">
  <div class="col-sm-8 offset-sm-2 main">
    <h1 class="title">Vehicles Parking</h1>
    <table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>Vehicle No</td>
            <td>Vehicle Type</td>
            <td>Vehicle Brand</td>
            <td>Vehicle Color</td>
            <td>Entry Date</td>
            <td>Out Date</td>
            <td>ID Slot</td>
            <td colspan = 2>Actions</td>
          </tr>
      </thead>
      <tbody>
          @foreach($transaction as $trans)
          <tr>
              <td>{{$trans->id}}</td>
              <td>{{$trans->vehicle_no}}</td>
              <td>{{$trans->vehicle_type}}</td>
              <td>{{$trans->vehicle_brand}}</td>
              <td>{{$trans->vehicle_color}}</td>
              <td>{{$trans->entry_date}}</td>
              <td>{{$trans->out_date}}</td>
              <td>{{$trans->id_slot}}</td>
              <td>
                  <a href="{{ route('transaction.edit',$trans->id)}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                  <form action="{{ route('transaction.destroy', $trans->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection