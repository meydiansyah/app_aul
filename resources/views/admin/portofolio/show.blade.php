@extends('admin.layouts.index')

@section('title', 'Create Portofolio')

@section('judul')
Portofolio
@endsection

@section('content')

<!-- Content Row -->
<div class="row">
    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- DataTables Portofolio Post-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Create Portofolio</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="user_id">Name</label>
                    <input disabled value="{{ $portofolio->user->name }}" type="text" class="form-control" id="user_id">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <input disabled value="{{ $portofolio->desc }}" type="text" class="form-control" id="desc">
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <img src="{{ asset('admin/img/thumbnail/' .$portofolio->image) }}" alt="portofolio" width="300">
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <a href="{{ route('portofolio.edit', $portofolio->id) }}" type="submit" class="btn btn-primary mr-3">Update</a>
                    <a href="{{ route('portofolio.index') }}" type="cancel" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection