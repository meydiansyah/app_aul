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
            <form action="{{ route('portofolio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="user_id">Name</label>
                        <select name="user_id" id="user-option" class="form-control form-control-rounded">
                            @foreach ($users as $user)
                            @if ($user->id == Auth::user()->id)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input name="image" type="file" class="form-control" id="image" placeholder="Input Image">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <input name="desc" type="text" class="form-control" id="desc" placeholder="Input Description">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('portofolio.index') }}" type="cancel" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection