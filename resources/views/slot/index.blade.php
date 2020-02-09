@extends('base')

@section('main')
<div class="row">
  <div class="col-sm-8 offset-sm-2 main">
    <h1 class="title">Dashboard</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div><br />
    @endif

    @if (session('success'))
      <div class="alert alert-success">
        <ul>
          <li>{{ session('success') }}</li>
        </ul>
      </div>
    @endif

    @if (session('failed'))
      <div class="alert alert-danger">
        <ul>
          <li>{{ session('failed') }}</li>
        </ul>
      </div>
    @endif

    <table class="table table-striped">
      <thead>
        <tr>
          <td>ID</td>
          <td>Slots Name</td>
          <td>Slots Flag</td>
          <td>ID Transaction</td>
          <td>Vehicle No</td>
        </tr>
      </thead>
      
      <tbody>
        @foreach($master_slots as $data)
          <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->slots_name}}</td>
            <td>
              <?php
                echo $data->slots_flag
                  ? "<div class='text-danger' role='alert'>Terisi</div>"
                  : "<div class='text-success' role='alert'>Kosong</div>";
              ?>
            </td>
            <td>{{$data->id_transaction}}</td>
            <td>{{$data->vehicle_no}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection