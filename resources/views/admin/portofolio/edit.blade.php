@extends('admin.layouts.index')

@section('title', 'Update Portofolio')

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
                <h6 class="m-0 font-weight-bold text-primary">Table Update Portofolio</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('portofolio.update', $portofolio->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="mb-3">
                        <label for="user_id">Name</label>
                        <select name="user_id" id="user-option" class="form-control form-control-rounded">
                            <option value="{{ $portofolio->user->id }}">{{ $portofolio->user->name }}</option>
                            @foreach ($users as $user)
                            @if ($user->id == Auth::user()->id)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        <p class="text-danger">{{ $errors->first("name") }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <input name="desc" value="{{ $portofolio->desc }}" type="text" class="form-control" id="desc">
                        <p class="text-danger">{{ $errors->first("desc") }}</p>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Masukkan Foto Portofolio</label>
                        <input name="image" type="file" class="form-control-file" id="image">
                        <img alt="image" src="{{ asset('admin/img/thumbnail/' . $portofolio->image) }}" class="img-fluid" style="width: 200px; margin-top: 1rem;">
                        <p class="text-danger">{{ $errors->first("image") }}</p>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <button value="save" type="submit" class="btn btn-primary mr-3">Update</button>
                        <a href="{{ route('portofolio.index') }}" type="cancel" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection