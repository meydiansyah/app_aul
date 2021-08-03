@extends('admin.layouts.index')

@section('title', 'Post')

@section('btn')
<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i> Add Data</a>
@endsection

@section('judul')
Post
@endsection

@section('content')

<!-- Content Row -->
<div class="row">
  <!-- Content Column -->
  <div class="col-lg-12 mb-4">
      <!-- DataTables -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Table Post</h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>Name Freelancer</th>
                              <th>Category</th>
                              <th>Times</th>
                              <th>Price</th>
                              <th>Thumbnail</th>
                              <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($posts as $post)
                          <tr>
                              <td>{{ $post->user->name }}</td>
                              <td>{{ $post->category->name }}</td>
                              <td>{{ $post->timestart }} to {{ $post->timestop }}</td>
                              <td>{{ $post->price }}</td>
                              <td>{{ $post->thumbnail }}</td>
                              <td>
                                <a href="" class="mr-1"><i class="fas fa-search"></i></a>
                                @if (auth()->user()->level == "freelancer")
                                <a href="" class="mr-1"><i class="fas fa-pencil-alt"></i></a>
                                @endif
                                @if (auth()->user()->level == "admin")
                                <a href="" class="mr-1"><i class="fas fa-pencil-alt"></i></a>
                                <a href="" class="mr-1"><i class="fas fa-trash-alt"></i></a>
                                @endif
                              </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection