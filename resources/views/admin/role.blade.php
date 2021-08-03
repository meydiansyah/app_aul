@extends('admin.layouts.index')

@section('title', 'Update Account')

@section('judul')
Account
@endsection

@section('content')

<!-- Content Row -->
<div class="row">
    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <form action="{{ route('home.update', $freelancer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- DataTables Account Post-->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Table Update Account</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input disabled name="name" type="text" class="form-control" id="name" value="{{ $freelancer->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <input disabled name="level" type="text" class="form-control" id="level" value="{{ $freelancer->level }}">
                        <!-- <select name="level" id="level-option" class="form-control form-control-rounded">
                            <option value="{{ $freelancer->level }}" selected>{{ $freelancer->level }}</option>
                            <option value="freelancer">Freelancer</option>
                            <option value="client">Client</option>
                        </select> -->
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status_id" id="status" class="form-control form-control-rounded">
                            <option value="{{ $freelancer->status->id }}" selected>{{ $freelancer->status->name }}</option>
                            @foreach ($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" value="save" class="btn btn-primary">Update</button>
                        <a href="{{ route('home') }}" type="cancel" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection