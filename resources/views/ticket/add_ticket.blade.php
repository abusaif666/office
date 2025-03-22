@extends('layout')

@section('content')
<div class="container">
    <div class="form_wrapper">
        <div class="form_header">
            <div class="form_header_left">
                <div class="form_title">Add Ticket</div>
            </div>
            <div class="form_header_right">
                <div class="form_header_button_wrapper">
                    <a class="form_header_btn" href="{{ route('ticket.list') }}"><i class="fa fa-eye"></i> All Ticket</a>
                </div>
            </div>
        </div>
        <div class="form_body">
            <form class="site_form" method="POST" action="{{route('ticket.store')}}">
                @csrf
                <div class="row">

                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>PNR</label>
                            <input class="form_controll" type="text" name="pnr" value="{{ old('pnr') }}" placeholder="PNR">
                            @error('pnr') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Issue Date</label>
                            <input class="form_controll" type="date" name="issueDate" value="{{ old('issueDate') }}">
                            @error('issueDate') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Flight Date</label>
                            <input class="form_controll" type="date" name="flightDate" value="{{ old('flightDate') }}">
                            @error('flightDate') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Flight From</label>
                            <input class="form_controll" type="text" name="flightFrom" value="{{ old('flightFrom') }}" placeholder="example: DAC">
                            @error('flightFrom') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Flight To</label>
                            <input class="form_controll" type="text" name="flightTo" value="{{ old('flightTo') }}" placeholder="example: CXB">
                            @error('flightTo') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Airlines Name</label>
                            <input class="form_controll" type="text" name="airlinesName" value="{{ old('airlinesName') }}" placeholder="Airlines Name">
                            @error('airlinesName') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Total Passenger</label>
                            <select class="form_controll" name="totalPassenger">
                                <option value="">Select</option>
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}" {{ old('totalPassenger') == $i ? 'selected' : '' }}>  {{ $i }} </option>
                                @endfor
                            </select>
                            @error('totalPassenger') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Agent Fare</label>
                            <input class="form_controll" type="text" name="agentFare" value="{{ old('agentFare') }}" placeholder="Agent Fare">
                            @error('agentFare') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Gross Fare</label>
                            <input class="form_controll" type="text" name="grossFare" value="{{ old('grossFare') }}" placeholder="Gross Fare">
                            @error('grossFare') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Selling Fare</label>
                            <input class="form_controll" type="text" name="sellingFare" value="{{ old('sellingFare') }}" placeholder="Selling Fare">
                            @error('sellingFare') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Total Amount</label>
                            <input class="form_controll" type="text" name="totalAmount" value="{{ old('totalAmount') }}" placeholder="Total Amount">
                            @error('totalAmount') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Deposit Amount</label>
                            <input class="form_controll" type="text" name="depositAmount" value="{{ old('depositAmount') }}" placeholder="Deposit Amount">
                            @error('depositAmount') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Due Amount</label>
                            <input class="form_controll" type="text" name="dueAmount" value="{{ old('dueAmount') }}" placeholder="Due Amount">
                            @error('dueAmount') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="form_controll_wrapper">
                            <label>Reference By</label>
                            <select class="form_controll" name="referenceBy">
                                <option value="">Select</option>
                                <option value="Saif">Saif</option>
                                <option value="Sayem">Sayem</option>
                                <option value="Momin">Momin</option>
                            </select>
                            @error('referenceBy') <small class="form_input_error"> {{ $message }} </small> @enderror
                        </div>
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
