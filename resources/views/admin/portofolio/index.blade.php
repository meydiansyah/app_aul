@extends('admin.layouts.index')
@section('title', 'Portofolio')

@section('btn')
@if (auth()->user()->level == 'freelancer')
<a href="{{ route('portofolio.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i> Add Data
</a>
@endif
@endsection

@section('judul')
Portofolio
@endsection

@section('content')

<!-- Content Row -->
<div class="row">
  <!-- Content Column -->
  <div class="col-lg-12 mb-4">
      <!-- DataTables -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Table Portofolio</h6>
          </div>

          @if (auth()->user()->level == "admin")
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>Name MUA</th>
                              <th>Image</th>
                              <th>Description</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($portofolios as $portofolio)
                          <tr>
                              <td>{{ $portofolio->user->name }}</td>
                                <td>
                                    <img src="{{ asset('admin/img/thumbnail/' .$portofolio->image) }}" alt="portofolio" width="150">
                                </td>
                                <td>{{ $portofolio->desc }}</td>
                                <td>
                                    <form action="{{ route('portofolio.destroy', $portofolio->id) }}" method="POST">
                                        <a href="{{ route('portofolio.show', $portofolio->id) }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-search"></i></a>
                                        {{-- <a href="{{ route('portofolio.edit', $portofolio->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-pencil-alt"></i></a> --}}
                                        @csrf
                                        @method('DELETE')
                                        {{-- <button type="submit" value="save" class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash-alt"></i></button> --}}
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
                              <th>Image</th>
                              <th>Description</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($portofolios as $portofolio)
                        @if ($portofolio->user->id == Auth::user()->id)
                          <tr>
                                <td>
                                    <img src="{{ asset('admin/img/thumbnail/' .$portofolio->image) }}" alt="portofolio" width="150">
                                </td>
                                <td>{{ $portofolio->desc }}</td>
                                <td>
                                    <form action="{{ route('portofolio.destroy', $portofolio->id) }}" method="POST">
                                        <a href="{{ route('portofolio.show', $portofolio->id) }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-search"></i></a>
                                        <a href="{{ route('portofolio.edit', $portofolio->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-pencil-alt"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value="save" class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash-alt"></i></button>
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