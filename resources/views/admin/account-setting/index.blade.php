@extends('admin.layouts.index')

@section('title', 'Account')

{{-- @section('btn')
<a href="{{ route('acc-setting.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i> Add Data
</a>
@endsection --}}

@section('judul')
Account
@endsection

@section('content')

<!-- Content Row -->
<div class="row">
    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> --}}
    
        <!-- DataTables Category Post-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Category Post</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Avatar</th>
                                <th>Create</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->level }}</td>
                                <td>{{ $item->status->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if ($item->phone == null)
                                    Not Found!
                                    @else
                                    {{ $item->phone }}
                                    @endif
                                </td>
                                <td class="d-flex justify-content-center">
                                    <img src="{{ asset('image/profile/' .$item->image) }}" alt="profile" height="50">
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    @if ($item->phone == null)
                                    @else
                                    <a href="http://wa.me/{{ $item->phone }}" target="_blank" class="btn btn-sm btn-info mr-1"><i class="fas fa-phone"></i></a>
                                    @endif
                                    {{-- <form action="{{ route('acc-setting.destroy', $item->id) }}" method="POST">
                                        @if (auth()->user()->level == "admin")
                                        <a href="{{ route('acc-setting.show', $item->id) }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-search"></i></a>
                                        <a href="{{ route('acc-setting.edit', $item->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-pencil-alt"></i></a>
                                        <button class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash-alt"></i></button>
                                        @endif
                                    </form> --}}
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