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
            <td>Payment Type</td>
            <td>Parking Bill</td>
            <td colspan = 2>Actions</td>
          </tr>
      </thead>
      <tbody>
          @foreach($transaction as $data)
          <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->vehicle_no}}</td>
              <td>{{$data->vehicle_type}}</td>
              <td>{{$data->vehicle_brand}}</td>
              <td>{{$data->vehicle_color}}</td>
              <td>{{$data->entry_date}}</td>
              <td>{{$data->out_date}}</td>
              <td>{{$data->id_slot}}</td>
              <td>{{$data->payment_type}}</td>
              <td>{{$data->parking_bill}}</td>
              <td>
                  <a href="{{ route('transaction.edit',$data->id)}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                  <form action="{{ route('transaction.destroy', $data->id)}}" method="post">
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