@extends('admin.layouts.index')

@section('title', 'Update Order')

@section('judul')
Order
@endsection

@section('content')

<!-- Content Row -->
<div class="row">
    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- DataTables Order Post-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Update Order</h6>
            </div>
            <form action="{{ route('order.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="card-body">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control form-control-rounded">
                            <option value="{{ $order->status }}">{{ $order->status }}</option>
                            <option value="approved">Approved</option>
                            <option value="disapproved">Disapproved</option>
                        </select>
                    </div>
                    <button type="submit" name="save" class="btn btn-primary">Update</button>
                    <a href="{{ route('order.index') }}" type="cancel" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection