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
          <td>ID slot</td>
          <td>Vehicle No</td>
          <td colspan = 2>Actions</td>
        </tr>
      </thead>
      
      <tbody>
        @foreach($master_slots as $data)
          <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->slots_name}}</td>
            <td>{{$data->slots_flag ? 'Terisi' : 'Kosong'}}</td>
            <td>{{$data->id_transaction}}</td>
            <td>{{$data->vehicle_no}}</td>
            <td>
              <a href="{{ route('slot.edit',$data->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
              <form action="{{ route('slot.destroy', $data->id)}}" method="post">
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