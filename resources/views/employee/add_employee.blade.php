@extends('layout')

@section('content')
<div class="container">
    <div class="form_wrapper">
        <div class="form_header">
            <div class="form_header_left">
                <div class="form_title">Add Employee</div>
            </div>
            <div class="form_header_right">
                <div class="form_header_button_wrapper">
                    <a class="form_header_btn" href="{{ route('employee.list') }}"><i class="fa fa-eye"></i> All Lists</a>
                </div>
            </div>
        </div>
        <div class="form_body">
            <form class="site_form" method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Name</label>
                            <input class="form_controll" type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                            @error('name') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Designation</label>
                            <input class="form_controll" type="text" name="designation" value="{{ old('designation') }}" placeholder="Designation">
                            @error('designation') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Email</label>
                            <input class="form_controll" type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                            @error('email') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Office Id</label>
                            <input class="form_controll" type="text" name="office_id" value="{{ old('office_id') }}" placeholder="Office Id">
                            @error('office_id') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Phone Number</label>
                            <input class="form_controll" type="text" name="phone_number" value="{{ old('phone_number') }}" placeholder="Phone Number">
                            @error('phone_number') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Gender</label>
                            <select class="form_controll" name="gender">
                                <option value="">Select Gender</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <input type="file" name="employee_image">
                    </div>

                    
                    <div class="col-md-12">
                        <button class="form_button" type="submit">Submit</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="form_footer"></div>
    </div>
</div>

@include('inc.alert')
@endsection
