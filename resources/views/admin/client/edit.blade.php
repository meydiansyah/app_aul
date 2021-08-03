@extends('admin.layouts.index')

@section('title', 'Update Account')

@section('judul')
Account
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
        <form action="{{ route('client.update', $user->id) }}" method="POST">
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
                        <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select name="level" id="level-option" class="form-control form-control-rounded">
                            <option value="{{ $user->level }}">{{ $user->level }}</option>
                            <option value="freelancer">Freelancer</option>
                            <option value="client">Client</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input name="phone" type="text" class="form-control phone" id="phone" value="{{ $user->phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender-option" class="form-control form-control-rounded">
                            <option value="{{ $user->gender }}">{{ $user->gender }}</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input name="city" type="text" class="form-control" id="city" value="{{ $user->city }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input name="address" type="text" class="form-control" id="address" value="{{ $user->address }}">
                    </div>
                    <div class="form-group">
                        <a href="{{ route('freelancer.index') }}" type="cancel" class="btn btn-danger">Cancel</a>
                        <button type="submit" value="save" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection