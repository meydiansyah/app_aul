@extends('admin.layouts.index')

@section('title', 'Jasa')

@section('btn')
@if (auth()->user()->level == "freelancer")
<a href="{{ route('jasa.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i> Add Data
</a>    
@endif
@endsection

@section('judul')
Jasa
@endsection

@section('content')

<!-- Content Row -->
<div class="row">
  <!-- Content Column -->
  <div class="col-lg-12 mb-4">
      <!-- DataTables -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Table Jasa</h6>
          </div>
          
          @if (auth()->user()->level == "admin")
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>Name MUA</th>
                              <th>Name</th>
                              <th>Category</th>
                              <th>Price</th>
                              <th>Times</th>
                              <th>Thumbnail</th>
                              <th>Description</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($jasas as $jasa)
                          <tr>
                            <td>{{ $jasa->user->name }}</td>
                            <td>{{ $jasa->name }}</td>
                            <td>{{ $jasa->category->name }}</td>
                            <td>{{ $jasa->price }}</td>
                            <td>{{ $jasa->timestart }} to {{ $jasa->timestop }}</td>
                            <td>
                                <img src="{{ asset('admin/img/thumbnail/' .$jasa->portofolio->image) }}" alt="thumbnail" width="150px">
                            </td>
                            <td>{{ $jasa->desc }}</td>
                            <td>
                                <form action="{{ route('jasa.destroy', $jasa->id) }}" method="POST">
                                    <a href="{{ route('jasa.show', $jasa->id) }}" class="btn btn-sm btn-info"><i class="fas fa-search"></i></a>
                                    {{-- <a href="{{ route('jasa.edit', $jasa->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a> --}}
                                    @csrf
                                    @method('DELETE')
                                    {{-- <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button> --}}
                                </form>
                            </td>
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
                              <th>Name</th>
                              <th>Category</th>
                              <th>Price</th>
                              <th>Times</th>
                              <th>Thumbnail</th>
                              <th>Description</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($jasas as $jasa)
                        @if ($jasa->user->id == Auth::user()->id)
                          <tr>
                            <td>{{ $jasa->name }}</td>
                            <td>{{ $jasa->category->name }}</td>
                            <td>{{ $jasa->price }}</td>
                            <td>{{ $jasa->timestart }} to {{ $jasa->timestop }}</td>
                            <td>
                                <img src="{{ asset('admin/img/thumbnail/' .$jasa->portofolio->image) }}" alt="thumbnail" width="150px">
                            </td>
                            <td>{{ $jasa->desc }}</td>
                            <td>
                                <form action="{{ route('jasa.destroy', $jasa->id) }}" method="POST">
                                    <a href="{{ route('jasa.show', $jasa->id) }}" class="btn btn-sm btn-info"><i class="fas fa-search"></i></a>
                                    <a href="{{ route('jasa.edit', $jasa->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
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
  </div>
</div>

@endsection