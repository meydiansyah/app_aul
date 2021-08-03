@extends('admin.layouts.index')

@section('title', 'Create Jasa')

@section('judul')
Jasa
@endsection

@section('app.js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('.date').mask('00/00/0000');
      $('.time').mask('00:00');
      $('.date_time').mask('00/00/0000 00:00:00');
      $('.phone').mask('0000-0000-0000');
      $('.money').mask('000.000.000.000.000,00', {reverse: true})
    });
</script>
@endsection

@section('content')

<!-- Content Row -->
<div class="row">
    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- DataTables Jasa Post-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Create Jasa</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="user_id">Name</label>
                    <input disabled value="{{ $jasa->user->name }}" type="text" class="form-control" id="user_id">
                </div>
                <div class="mb-3">
                    <label for="category_id">Category</label>
                    <input disabled value="{{ $jasa->category->name }}" type="text" class="form-control" id="category_id">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input disabled value="{{ $jasa->name }}" type="text" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="timestart" class="form-label">Timestart</label>
                    <input disabled value="{{ $jasa->timestart }}" type="text" class="form-control time" id="timestart">
                </div>
                <div class="mb-3">
                    <label for="timestop" class="form-label">Timestop</label>
                    <input disabled value="{{ $jasa->timestop }}" type="text" class="form-control time" id="timestop">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input disabled value="{{ $jasa->price }}" type="text" class="form-control money" id="price">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <input disabled value="{{ $jasa->desc }}" type="text" class="form-control" id="desc">
                </div>
                <a href="{{ route('jasa.edit', $jasa->id) }}" type="submit" class="btn btn-primary">Update</a>
                <a href="{{ route('jasa.index') }}" type="cancel" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </div>
</div>

@endsection