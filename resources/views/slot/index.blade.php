@extends('base')

@section('main')
<div class="row">
  <div class="col-sm-8 offset-sm-2 main">
    <h1 class="title">Master Slots</h1>
    <table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>Slots Name</td>
            <td>Slots Flag</td>
            <td>ID slot</td>
            <td colspan = 2>Actions</td>
          </tr>
      </thead>
      <tbody>
          @foreach($slot as $data)
          <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->slots_name}}</td>
              <td>{{$data->slots_flag}}</td>
              <td>{{$data->id_transaction}}</td>
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