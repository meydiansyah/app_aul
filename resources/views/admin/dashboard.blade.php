@extends('admin.layouts.index')

@section('title', 'Home')

@section('judul')
Dashboard
@endsection

@section('content')
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Orders (Pesanan)</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $orders->count() }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Comments</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $reviews->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if (auth()->user()->level == "freelancer")
                <!-- Pending Requests Card Example -->
                <div class="col-xl-12 col-md-12 mb-4">
                    <!-- DataTables -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Terima Order</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name Klien</th>
                                            <th>Nama Jasa</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($orders as $order)
                                    @if ($order->jasa->user->id == Auth::user()->id)
                                        <tr>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->jasa->name }}</td>
                                            <td>Rp.{{ $order->jasa->price }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>
                                            <a href="{{ route('order.edit', $order->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-pencil-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        {{-- <!-- Inbox Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Inbox</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    @foreach ($users as $user)
                    <div class="card-body">
                        <div class="card border-left-primary" style="background-color: rgb(170, 225, 250);">
                            <a href="" class="btn btn-sm btn-default">
                                <div class="row">
                                    <p class="col-6 text-left" style="color: #000">{{ $user->name }}</p>
                                    <p class="col-6 text-right" style="color: #000">{{ $user->id }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div> --}}
    </div>
@endsection