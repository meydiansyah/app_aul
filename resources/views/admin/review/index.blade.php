@extends('admin.layouts.index')

@section('title', 'Review')

{{-- @section('btn')
@if (auth()->user()->level == "admin")
<a href="{{ route('review.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i> Add Data
</a>
@endif
@endsection --}}

@section('judul')
Review
@endsection

@section('content')

<!-- Content Row -->
<div class="row">
  <!-- Content Column -->
  <div class="col-lg-12 mb-4">
      <!-- DataTables -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Table Review</h6>
          </div>

          @if (auth()->user()->level == "admin")
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>ID MUA</th>
                              <th>Name Klien</th>
                              <th>Name MUA</th>
                              <th>Category</th>
                              <th>Star</th>
                              <th>Comment</th>
                              @if (auth()->user()->level == "admin")
                              <th>Actions</th>
                              @endif
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($reviews as $review)
                          <tr>
                              <td>{{ $review->jasa->user->id }}</td>
                              <td>{{ $review->user->name }}</td>
                              <td>{{ $review->jasa->user->name }}</td>
                              <td>{{ $review->jasa->category->name }}</td>
                              <td>{{ $review->star }}</td>
                              <td>{{ $review->comment }}</td>
                              @if (auth()->user()->level == "admin")
                              <td>
                                  <form action="{{ route('review.destroy', $review->id) }}" method="POST">
                                    {{-- <a href="{{ route('review.show', $review->id) }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-search"></i></a>
                                    <a href="{{ route('review.edit', $review->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-pencil-alt"></i></a> --}}
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash-alt"></i></button>
                                  </form>
                              </td>
                              @endif
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
                              <th>Name Klien</th>
                              <th>Name Jasa</th>
                              <th>Category</th>
                              <th>Star</th>
                              <th>Comment</th>
                              {{-- <th>Actions</th> --}}
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($reviews as $review)
                        @if ($review->jasa->user->id == Auth::user()->id)
                          <tr>
                              <td>{{ $review->user->name }}</td>
                              <td>{{ $review->jasa->name }}</td>
                              <td>{{ $review->jasa->category->name }}</td>
                              <td>{{ $review->star }}</td>
                              <td>{{ $review->comment }}</td>
                              {{-- <td>
                                  <form action="{{ route('review.destroy', $review->id) }}" method="POST">
                                    <a href="{{ route('review.show', $review->id) }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-search"></i></a>
                                    <a href="{{ route('review.edit', $review->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-pencil-alt"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash-alt"></i></button>
                                  </form>
                              </td> --}}
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