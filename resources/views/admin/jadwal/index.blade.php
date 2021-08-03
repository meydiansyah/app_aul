@extends('admin.layouts.index')

@section('title', 'Jadwal')

@section('judul')
Jadwal
@endsection

@section('content')

<!-- Content Row -->
<div class="row">
  <!-- Content Column -->
  <div class="col-lg-12 mb-4">
      <!-- DataTables -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Table Jadwal</h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>Date</th>
                              <th>Name Klien</th>
                              <th>Category</th>
                              <th>Total People</th>
                              <th>Booking Hours Start</th>
                              <th>Booking Hours End</th>
                              <th>Address</th>
                              {{-- <th>Actions</th> --}}
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($jadwals as $jadwal)
                        @if ($jadwal->status == "approved")
                          <tr>
                              <td>{{ $jadwal->booking_date }}</td>
                              <td>{{ $jadwal->user->name }}</td>
                              <td>{{ $jadwal->jasa->category->name }}</td>
                              <td>{{ $jadwal->total_people }} People</td>
                              <td>{{ $jadwal->booking_start }}</td>
                              <td>{{ $jadwal->booking_end }}</td>
                              <td>{{ $jadwal->address }}</td>
                              {{-- <td>
                                <a href="" class="mr-1"><i class="fas fa-search"></i></a>
                                @if (auth()->user()->level == "freelancer")
                                <a href="" class="mr-1"><i class="fas fa-pencil-alt"></i></a>
                                @endif
                                @if (auth()->user()->level == "admin")
                                <a href="" class="mr-1"><i class="fas fa-pencil-alt"></i></a>
                                <a href="" class="mr-1"><i class="fas fa-trash-alt"></i></a>
                                @endif
                              </td> --}}
                          </tr>
                        @endif
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection