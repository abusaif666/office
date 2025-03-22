@extends('layout')

@section('content')
<div class="container">
    <div class="table_wrapper">
        <div class="table_header">
            <div class="table_header_left">
                <div class="table_title">User List</div>
            </div>
            <div class="table_header_right">
                <div class="table_header_button_wrapper">
                    <a class="table_header_btn" href="{{ route('add.user') }}"><i class="fa fa-plus"></i> Add User</a>
                </div>
            </div>
        </div>
        <div class="table_body">
            <table class="site_table site_sm_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key=>$user)
                    <tr>
                        <td data-head="Sl">{{ $key+1 }}</td>
                        <td data-head="Name">{{ $user->name }}</td>
                        <td data-head="Email">{{ $user->email }}</td>
                        <td data-head="Role">{{ $user->role }}</td>
                        <td data-head="Action" class="table_action_th">
                            <a title="Edit" class="action_btn" href="{{ route('edit.user', Crypt::encrypt($user->id)) }}">
                                <img src="{{ asset('assets/image/edit.gif') }}" alt="">
                            </a>
                            <a title="Delete" class="action_btn" onclick="return confirm('Are you sure delete this?')" href="{{ route('user.delete', Crypt::encrypt($user->id)) }}">
                                <img src="{{ asset('assets/image/delete.gif') }}" alt="">
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="table_footer">
            <div class="table_pagination_wrapper">

            </div>
        </div>
    </div>
</div>
@include('inc.alert')
@endsection
