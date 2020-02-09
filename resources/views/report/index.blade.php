@extends('base')

@section('main')
<div class="row">
  <div class="col-sm-8 offset-sm-2 main">
    <h1 class="title">Report</h1>
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

      <form method="post" action="{{ url('/report/get') }}">
        @csrf
        <div class="form-group">    
          <label for="report_type">Report Type:</label>
          <select class="form-control" name="report_type" id="report_type">
            <option value="vehicle_color">Vehicle Color</option>
            <option value="vehicle_no">Vehicle No</option>
          </select>
        </div>
        <div class="form-group">
          <label for="parameter">Parameter:</label>
          <input type="text" class="form-control" name="parameter" required />
        </div>

        <button type="submit" class="btn btn-primary">Get Report</button>
      </form>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  function msToTime(s) {
    var ms = s % 1000;
    s = (s - ms) / 1000;
    var secs = s % 60;
    s = (s - secs) / 60;
    var mins = s % 60;
    var hrs = (s - mins) / 60;
    return hrs + ':' + mins + ':' + secs + '.' + ms;
  }

  $('#find_transaction').on('submit', function(e){
    e.preventDefault();

    $.ajax({
      url: "{{ url('/transaction/') }}/" +  $('#find_no').val(),
      type: "GET",
      success: function(data) {
        var trans = JSON.parse(data);

        if (trans[0]) {
          var outdatePhp = "<?= date('Y-m-d H:i:s'); ?>"; // SERVER DATETIME
          var entrydatePhp = trans[0].entry_date; // UNTUK TAMPILAN
          var outdateJs = new Date(outdatePhp); // UNTUK PERHITUNGAN
          var entrydateJs = new Date(trans[0].entry_date); // UNTUK PERHITUNGAN
          var diffMs = Math.abs(outdateJs - entrydateJs); // SELISIH WAKTU PARKIR
          var diffHr = msToTime(diffMs); // SELISIH WAKTU PARKIR DALAM TIME
          var timeSplit = diffHr.split(':'); // UNTUK AMBIL JUMLAH JAM
          var firstHr = 2000; // INITIAL PARKING PRICE UNTUK 1 JAM PERTAMA
          var nextHr = timeSplit[0] - 1 >= 0 ? timeSplit[0] * 1000 : 0; // PERHITUNGAN JAM BERIKUTNYA
          var bill = firstHr + nextHr;

          $('#checkout_process').show();
          $('#find_transaction').hide();
          $('#error-div').hide();
          $('#vehicle_no').val(trans[0].vehicle_no);
          $('#vehicle_type').val(trans[0].vehicle_type);
          $('#vehicle_brand').val(trans[0].vehicle_brand);
          $('#vehicle_color').val(trans[0].vehicle_color);
          $('#entry_date').val(entrydatePhp);
          $('#out_date_disabled').val(outdatePhp);
          $('#out_date').val(outdatePhp);
          $('#id_slot_disabled').val(trans[0].id_slot);
          $('#id_slot').val(trans[0].id_slot);
          $('#parking_time').val(diffHr);
          $('#parking_bill').val(bill);
          $('#id').val(trans[0].id);
        } else {
          $('#error-msg').text("Vehicle not found!");
          $('#error-div').show();
        }
      }
    });
  });

  $('#checkout_process').on('submit', function(e){
    e.preventDefault();
    var post = $(this).serialize();

    console.log(post);

    $.ajax({
      url: "{{ url('/transaction/out') }}",
      type: "POST",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: post,
      success: function(data) {
        var checkout = JSON.parse(data);
        if (checkout.status === 'success') {
          window.location.replace("{{ url('/') }}");
        }
      }
    });
  });
</script>
@endsection