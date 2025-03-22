@extends('layout')

@section('content')
<div class="container">
    <div class="table_wrapper">
        <div class="table_header">
            <div class="table_header_left">
                <div class="table_title">Employee List</div>
            </div>
            <div class="table_header_right">
                <div class="table_search_form_wrapper">
                    <form class="table_search_form" action="" method="">
                        <input class="table_search_form_controll" type="search" name="" placeholder="Search.....">
                        <button class="table_search_form_btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="table_header_button_wrapper">
                    <a class="table_header_btn" href="{{ route('add.employee') }}"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="table_body">
            <table class="site_table site_lg_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Email</th>
                        <th>Office Id</th>
                        <th>Phone No</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $key=>$employee)
                    <tr>
                        <td data-head="Sl">{{ $employees->firstItem() + $key }}</td>
                        <td data-head="Image">
                            <img src="{{ asset('assets/upload/employees_photo/' . $employee->employee_image) }}" alt=""
                            style="height: 30px; width: 22px; border-radius: 50%; object-fit: cover;">
                        </td>
                        <td data-head="Name">{{ $employee->name }}</td>
                        <td data-head="Designation">{{ $employee->designation }}</td>
                        <td data-head="Email">{{ $employee->email }}</td>
                        <td data-head="Email">{{ $employee->office_id }}</td>
                        <td data-head="Phone Number">{{ $employee->phone_number }}</td>
                        <td data-head="Gender">{{ $employee->gender }}</td>
                        <td data-head="Action" class="table_action_th">
                            <a title="Edit" class="action_btn" href="{{ route('edit.employee', Crypt::encrypt($employee->id)) }}">
                                <img src="{{ asset('assets/image/edit.gif') }}" alt="">
                            </a>
                            <a title="Delete" class="action_btn" onclick="return confirm('Are you sure delete this?')" href="{{ route('delete.employee', Crypt::encrypt($employee->id)) }}">
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
                {{ $employees->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@include('inc.alert')
@endsection
