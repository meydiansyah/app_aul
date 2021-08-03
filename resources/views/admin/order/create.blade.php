@extends('admin.layouts.index')

@section('title', 'Create Order')

@section('judul')
Order
@endsection

@section('app.js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    //   $('.date').mask('00/00/0000');
      $('.date').mask('0000-00-00');
      $('.time').mask('00:00');
      $('.date_time').mask('00/00/0000 00:00:00');
      $('.phone').mask('0000-0000-0000');
      $('.money').mask('000.000.000.000.000,00', {reverse: true})
    });
</script>
@endsection

@section('content')

<!-- Content Row -->
<div class="row">
    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- DataTables Order Post-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Create Order</h6>
            </div>
            <form action="{{ route('order.store') }}" method="POST">
            @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="user_id">Name</label>
                        <select name="user_id" id="user-option" class="form-control form-control-rounded">
                            @foreach ($users as $user)
                            @if ($user->id == Auth::user()->id)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jasa_id">Jasa</label>
                        <select name="jasa_id" id="jasa-option" class="form-control form-control-rounded">
                            @foreach ($jasas as $jasa)
                            <option value="{{ $jasa->id }}">{{ $jasa->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Input Name">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input name="phone" type="text" class="form-control phone" id="phone" placeholder="0000-0000-0000">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input name="address" type="text" class="form-control" id="address" placeholder="Input Name">
                    </div>
                    <div class="mb-3">
                        <label for="total_people">Total People</label>
                        <select name="total_people" id="total-option" class="form-control form-control-rounded">
                            <option value="1">1 Orang</option>
                            <option value="2">2 Orang</option>
                            <option value="3">3 Orang</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="booking_date" class="form-label">Booking Date</label>
                        <input name="booking_date" type="text" class="form-control date" id="booking_date" placeholder="0000-12-31">
                    </div>
                    <div class="mb-3">
                        <label for="booking_start" class="form-label">Booking Hours Start</label>
                        <input name="booking_start" type="text" class="form-control time" id="booking_start" placeholder="00:00">
                    </div>
                    <div class="mb-3">
                        <label for="booking_end" class="form-label">Booking Hours End</label>
                        <input name="booking_end" type="text" class="form-control time" id="booking_end" placeholder="00:00">
                    </div>
                    @if (auth()->user()->level == 'admin')
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="total-option" class="form-control form-control-rounded">
                            <option value="approved">Approved</option>
                            <option value="disapproved">Disapproved</option>
                        </select>
                    </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('order.index') }}" type="cancel" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection