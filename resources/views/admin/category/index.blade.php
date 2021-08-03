@extends('admin.layouts.index')
@section('title', 'Category')
@section('btn')
    @if (auth()->user()->level == "admin")
    <a href="{{ route('category.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Add Data
    </a>    
    @endif
@endsection

@section('judul')
Category
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
                                <th>Link</th>
                                @if (auth()->user()->level == "admin")
                                <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                @if (auth()->user()->level == "admin")
                                <td>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                        {{-- <a href="{{ route('category.show', $category->id) }}" class="mr-1"><i class="fas fa-search"></i></a> --}}
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-pencil-alt"></i></a>
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
        </div>
    </div>
</div>

@endsection