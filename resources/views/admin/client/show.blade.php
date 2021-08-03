@extends('admin.layouts.index')

@section('title', 'Show Account')

@section('judul')
Account
@endsection

@section('content')

<!-- Content Row -->
<div class="row">
    <!-- Content Column --> 
    <div class="col-lg-12 mb-4">
        <!-- DataTables Account Post-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Show Account</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input disabled type="text" class="form-control" id="name" value="{{ $user->name }}">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <input disabled type="text" class="form-control" id="role" value="{{ $user->level }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input disabled type="text" class="form-control" id="phone" value="{{ $user->phone }}">
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <input disabled type="text" class="form-control" id="gender" value="{{ $user->gender }}">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input disabled type="text" class="form-control" id="city" value="{{ $user->city }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input disabled type="text" class="form-control" id="address" value="{{ $user->address }}">
                </div>
                <div class="form-group">
                    <a href="{{ route('client.index') }}" type="cancel" class="btn btn-danger">Cancel</a>
                    <a href="{{ route('client.edit', $user->id) }}" type="submit" class="btn btn-primary">Update</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection