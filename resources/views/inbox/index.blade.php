@extends('admin.layouts.index')

@section('title', 'Inbox')

@section('judul')
Inbox
@endsection

@section('content')

<!-- Start Content Row -->
<div class="row">
  <!-- Start Content Column -->
  <div class="col-lg-12 mb-4">
    <!-- Start DataTables Biodata Freelancer-->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Table Inbox From WhatsApp or Gmail</h6>
      </div>
      @if (auth()->user()->level == "freelancer")
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                        <th>Klien</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($kliens as $klien)
                      @if ($klien->jasa->user->id == Auth::user()->id)
                      <tr>
                        <td>{{ $klien->user->name }}</td>
                        <td>{{ $klien->user->email }}</td>
                        <td>{{ $klien->user->phone }}</td>
                        <td>
                          <a href="http://wa.me/{{ $klien->user->phone }}" class="btn btn-sm btn-outline-primary mr-1" target="_blank"><i class="fas fa-inbox"></i></i></a>
                          <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to={{ $klien->user->email }}" class="btn btn-sm btn-outline-info mr-1" target="_blank"><i class="far fa-envelope"></i></a>
                        </td>
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