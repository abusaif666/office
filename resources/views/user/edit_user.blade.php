@extends('layout')

@section('content')
<div class="container">
    <div class="form_wrapper">
        <div class="form_header">
            <div class="form_header_left">
                <div class="form_title">Update User</div>
            </div>
            <div class="form_header_right">
                <div class="form_header_button_wrapper">
                    <a class="form_header_btn" href="{{ route('user.list') }}"><i class="fa fa-eye"></i> All Users</a>
                </div>
            </div>
        </div>
        <div class="form_body">
            <form class="site_form" method="POST" action="{{route('user.update',Crypt::encrypt($user->id))}}">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Name</label>
                            <input class="form_controll" type="text" name="name" value="{{ $user->name }}">
                            @error('name') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Email</label>
                            <input class="form_controll" type="text" name="email" value="{{ $user->email }}">
                            @error('email') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Password</label>
                            <input class="form_controll" type="text" name="password" placeholder="New Password">
                            @error('password') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Role</label>
                            <select class="form_controll" name="role">
                                <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="User" {{ $user->role == 'User' ? 'selected' : '' }}>User</option>
                            </select>
                            @error('role') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <button class="form_button" type="submit">Update</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="form_footer"></div>
    </div>
</div>

@include('inc.alert')
@endsection
