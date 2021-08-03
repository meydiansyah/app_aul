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
            <form action="{{ route('jasa.update', $jasa->id) }}" method="POST">
            @method('PUT')
            @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="user_id">Name</label>
                        <select name="user_id" id="user-option" class="form-control form-control-rounded">
                            <option value="{{ $jasa->user->id }}">{{ $jasa->user->name }}</option>
                            @foreach ($users as $user)
                            @if ($user->id == Auth::user()->id)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category-option" class="form-control form-control-rounded">
                            <option value="{{ $jasa->category->id }}">{{ $jasa->category->name }}</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="portofolio_id">Portofolio</label>
                        <select name="portofolio_id" id="portofolio-option" class="form-control form-control-rounded">
                            @foreach ($portofolios as $portofolio)
                            <option value="{{ $portofolio->id }}">{{ $portofolio->desc }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{ $jasa->name }}">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input name="image" type="file" class="form-control" id="image" value="{{ $jasa->image }}" placeholder="Input Image">
                    </div> --}}
                    <div class="mb-3">
                        <label for="timestart" class="form-label">Open</label>
                        <input name="timestart" type="text" class="form-control time" id="timestart" value="{{ $jasa->timestart }}">
                    </div>
                    <div class="mb-3">
                        <label for="timestop" class="form-label">Close</label>
                        <input name="timestop" type="text" class="form-control time" id="timestop" value="{{ $jasa->timestop }}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input name="price" type="text" class="form-control money" id="price" value="{{ $jasa->price }}">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <input name="desc" type="text" class="form-control" id="desc" value="{{ $jasa->desc }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('jasa.index') }}" type="cancel" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection