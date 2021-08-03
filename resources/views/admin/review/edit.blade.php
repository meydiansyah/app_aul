@extends('admin.layouts.index')

@section('title', 'Create Review')

@section('judul')
Review
@endsection

@section('app.js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    //   $('.date').mask('00/00/0000');
      $('.date').mask('0000-00-00');
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
        <!-- DataTables Review Post-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Create Review</h6>
            </div>
            <form action="{{ route('review.update', $review->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="card-body">
                    <div class="mb-3">
                        <label for="user_id">Name</label>
                        <select name="user_id" id="user-option" class="form-control form-control-rounded">
                            <option value="{{ $review->user->id }}">{{ $review->user->name }}</option>
                            @foreach ($users as $user)
                            @if ($user->id == Auth::user()->id)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jasa_id">Jasa</label>
                        <select name="jasa_id" id="jasa-option" class="form-control form-control-rounded">
                            <option value="{{ $review->jasa->id }}">{{ $review->jasa->name }}</option>
                            @foreach ($jasas as $jasa)
                            <option value="{{ $jasa->id }}">{{ $jasa->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="star">Star</label>
                        <select name="star" id="total-option" class="form-control form-control-rounded">
                            <option value="{{ $review->star }}">{{ $review->star }} Star</option>
                            <option value="1">1 Star</option>
                            <option value="2">2 Star</option>
                            <option value="3">3 Star</option>
                            <option value="4">4 Star</option>
                            <option value="5">5 Star</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <input name="comment" type="text" class="form-control" id="comment" value="{{ $review->comment }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('review.index') }}" type="cancel" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection