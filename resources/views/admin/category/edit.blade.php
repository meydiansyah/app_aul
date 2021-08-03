@extends('admin.layouts.index')

@section('title', 'Update Category')

@section('judul')
Category
@endsection

@section('content')

<!-- Content Row -->
<div class="row">
    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- DataTables Category Post-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Update Category</h6>
            </div>
            <form action="{{ url('category', $category->id ) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="card-body">
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input name="name" type="text" class="form-control" id="name" value="{{ $category->name }}">
                </div>
                <button type="submit" value="save" class="btn btn-primary">Update</button>
                <a href="{{ route('category.index') }}" type="cancel" class="btn btn-danger">Cancel</a>
              </div>
            </form>
        </div>
    </div>
</div>

@endsection