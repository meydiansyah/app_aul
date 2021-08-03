@extends('admin.layouts.index')

@section('title', 'Profile')

@section('judul')
Profile
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Your Profile</h4>
            </div>
            <div class="card-body">
                <p class="card-text"></p>
                <form class="form" method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group row">
                                    <label for="name" class="col-md-2 col-form-label text-md-left">Name</label>
                                    <div class="col-md-10">
                                        <input name="name" id="name" class="form-control" type="text" placeholder="Name" value="{{ $user->name }}">
                                        <p class="text-danger">{{ $errors->first("name") }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-2 col-form-label text-md-left">Email</label>
                                    <div class="col-md-10">
                                        <input name="email" id="email" type="email" class="form-control" placeholder="Email"  value="{{ $user->email }}">
                                        <p class="text-danger">{{ $errors->first("email") }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-2 col-form-label text-md-left">Password</label>
                                    <div class="col-md-10">
                                        <input value="{{ $user->password }}" name="password" id="password" type="password" class="form-control" placeholder="Masukkan password">
                                        <p class="text-danger">{{ $errors->first("password") }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-md-2 col-form-label text-md-left">Status</label>
                                    <div class="col-md-10">
                                        <select name="status_id" class="form-control">
                                            <option value="{{ $user->status->id }}" selected>{{ $user->status->name }}</option>
                                            @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}" >{{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first("status") }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-md-2 col-form-label text-md-left">Phone Number</label>
                                    <div class="col-md-10">
                                        <input name="phone" type="text" id="phone" class="form-control" placeholder="Phone Number" value="{{ $user->phone }}">
                                        <p class="text-danger">{{ $errors->first("phone") }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender" class="col-md-2 col-form-label text-md-left">Gender</label>
                                    <div class="col-md-10">
                                        <select name="gender" class="form-control">
                                            <option value="{{ $user->gender }}">{{ $user->gender }}</option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                        <p class="text-danger">{{ $errors->first("gender") }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-md-2 col-form-label text-md-left">City</label>
                                    <div class="col-md-10">
                                        <input name="city" type="text" id="city" class="form-control" value="{{ $user->city }}">
                                        <p class="text-danger">{{ $errors->first("city") }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-md-2 col-form-label text-md-left">Address</label>
                                    <div class="col-md-10">
                                        <input name="address" type="text" id="address" class="form-control" value="{{ $user->address }}">
                                        <p class="text-danger">{{ $errors->first("address") }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="desc" class="col-md-2 col-form-label text-md-left">Description</label>
                                    <div class="col-md-10">
                                        <input name="desc" type="text" id="desc" class="form-control" value="{{ $user->desc }}">
                                        <p class="text-danger">{{ $errors->first("desc") }}</p>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label for="password-confirm" class="col-md-2 col-form-label text-md-left">{{ __('Confirm Password') }}</label>
        
                                    <div class="col-md-10">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="image">Masukkan Foto Profile</label>
                                    <input name="image" type="file" class="form-control-file" id="image">
                                    <img alt="image" src="{{ asset('image/profile/' . $user->image) }}" class="img-fluid" style="width: 200px; margin-top: 1rem;">
                                    <p class="text-danger">{{ $errors->first("image") }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions d-flex justify-content-end">
                        <button value="save" type="submit" class="btn btn-primary mr-1">Submit</button>
                        <a href="{{ url('/') }}" class="btn btn-light-primary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection