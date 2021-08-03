@extends('admin.layouts.index')

@section('title', 'Order')

{{-- @section('btn')
@if (auth()->user()->level == "freelancer")
<a href="{{ route('order.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<i class="fas fa-plus fa-sm text-white-50"></i> Add Data
</a>
@endif
@endsection --}}

@section('judul')
Order
@endsection

@section('content')

<!-- Start Content Row -->
<div class="row">
  <!-- Start Content Column -->
  <div class="col-lg-12 mb-4">
    <!-- Start DataTables Biodata Freelancer-->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Table Order</h6>
      </div>
      @if (auth()->user()->level == "admin")
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Klien</th>
                <th>MUA</th>
                <th>Jasa</th>
                <th>Category</th>
                <th>Phone</th>
                <th>Price</th>
                <th>Address</th>
                <th>Total People</th>
                <th>Order Date</th>
                <th>Booking Date</th>
                <th>Booking Hours Start</th>
                <th>Booking Hours End</th>
                <th>Payment Image</th>
                <th>Payment Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
              <tr>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->jasa->user->name }}</td>
                <td>{{ $order->jasa->name }}</td>
                <td>{{ $order->jasa->category->name }}</td>
                <td>{{ $order->jasa->price }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->total_people }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->booking_date }}</td>
                <td>{{ $order->booking_start }}</td>
                <td>{{ $order->booking_end }}</td>
                <td>
                  @if ($order->pembayaran_id == null)
                  Not Found!
                  @else
                  {{ $order->pembayaran->image }}
                  @endif
                </td>
                <td>{{ $order->status }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      @endif
      @if (auth()->user()->level == "freelancer")
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Klien</th>
                <th>Jasa</th>
                <th>Category</th>
                <th>Phone</th>
                <th>Price</th>
                <th>Address</th>
                <th>Total People</th>
                <th>Order Date</th>
                <th>Payment Status</th>
                <th>Booking Date</th>
                <th>Booking Hours Start</th>
                <th>Booking Hours End</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
              @if ($order->jasa->user->id == Auth::user()->id)
              <tr>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->jasa->name }}</td>
                <td>{{ $order->jasa->category->name }}</td>
                <td>{{ $order->jasa->price }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->total_people }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->booking_date }}</td>
                <td>{{ $order->booking_start }}</td>
                <td>{{ $order->booking_end }}</td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      @endif
    </div>
    <!-- End DataTables Biodata Freelancer-->
  </div>
  <!-- End Content Column -->
</div>
<!-- End Content Row -->

@endsection