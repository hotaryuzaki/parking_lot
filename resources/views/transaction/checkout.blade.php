@extends('base')

@section('main')
<div class="row">
  <div class="col-sm-8 offset-sm-2 main">
    <h1 class="title">Checkout Parking</h1>
    <div>
      <div id="error-div" class="alert alert-danger" style="display: none;">
        <ul>
          <li id="error-msg"></li>
        </ul>
      </div>
      
      <form id="checkout_process" style="display: none">
        @csrf
        <div class="form-group">    
            <label for="vehicle_no">Vehicle No:</label>
            <input type="text" class="form-control" name="vehicle_no" id="vehicle_no" disabled="" />
        </div>
        <div class="form-group">
            <label for="vehicle_type">Vehicle Type:</label>
            <input type="text" class="form-control" name="vehicle_type" id="vehicle_type" disabled="" />
        </div>
        <div class="form-group">
            <label for="vehicle_brand">Vehicle Brand:</label>
            <input type="text" class="form-control" name="vehicle_brand" id="vehicle_brand" disabled="" />
        </div>
        <div class="form-group">
            <label for="vehicle_color">Vehicle Color:</label>
            <input type="text" class="form-control" name="vehicle_color" id="vehicle_color" disabled="" />
        </div>
        <div class="form-group">
            <label for="entry_date">Entry Date:</label>
            <input type="text" class="form-control" name="entry_date" id="entry_date" disabled="" />
        </div>
        <div class="form-group">
            <label for="out_date_disabled">Out Date:</label>
            <input type="text" class="form-control" name="out_date_disabled" id="out_date_disabled" disabled="" />
        </div>
        <div class="form-group">
            <label for="id_slot_disabled">ID Slot:</label>
            <input type="text" class="form-control" name="id_slot_disabled" id="id_slot_disabled" disabled="" />
        </div>
        <div class="form-group">
            <label for="parking_time">Parking Time:</label>
            <input type="text" class="form-control" name="parking_time" id="parking_time" disabled="" />
            <small id="parking_time_help" class="form-text text-muted">h:m:s.ms</small>
        </div>  
        <div class="form-group">
            <label for="payment_type">Payment Type:</label>
            <select class="form-control" name="payment_type" id="payment_type">
              <option value="cash">cash</option>
              <option value="e-money">e-money</option>
              <option value="flazz">flazz</option>
            </select>
        </div>
        <input type="hidden" name="id" id="id" />
        <input type="hidden" name="id_slot" id="id_slot" />
        <input type="hidden" name="out_date" id="out_date" />

        <div class="form-group">
            <label for="parking_bill">Parking Bill:</label>
            <input type="text" class="form-control" name="parking_bill" id="parking_bill"/>
        </div>                         
        <button type="submit" class="btn btn-primary">Vehicle Checkout</button>
      </form>

      <form id="find_transaction">
        <div class="form-group">
          <label for="find_no">Vehicle No:</label>
          <input type="text" class="form-control" name="find_no" id="find_no" required />
        </div>
        <button type="submit" class="btn btn-primary">Check Vehicle</button>
      </form>

      <br><br>
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