@extends('layout')

@section('content')
<div class="container">
    <div class="table_wrapper">
        <div class="table_header">
            <div class="table_header_left">
                <div class="table_title">Ticket List</div>
            </div>
            <div class="table_header_right">
                <div class="table_search_form_wrapper">
                    <form class="table_search_form" action="{{route('ticket.list')}}" method="GET">
                        <input class="table_search_form_controll" type="text" name="search" value="{{$search}}" placeholder="Search.....">
                        <button class="table_search_form_btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="table_header_button_wrapper">
                    <a class="table_header_btn" href="{{route('add.ticket')}}"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="table_body">
            <table class="site_table site_lg_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Pnr</th>
                        <th>Issue Date</th>
                        <th>Flight Date</th>
                        <th>Route</th>
                        <th>Airlines</th>
                        <th>Agent Fare</th>
                        <th>Gross Fare</th>
                        <th>Selling Fare</th>
                        <th>Pax</th>
                        <th>Total Amount</th>
                        <th>Deposit</th>
                        <th>Due</th>
                        <th>Reference</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $key=>$ticket)
                    <tr>
                        <td data-head="Sl">{{ $tickets->firstItem() + $key }}</td>
                        <td data-head="Airlines">{{$ticket->pnr}}</td>
                        <td data-head="Issue Date">{{ \Carbon\Carbon::parse($ticket->issueDate)->format('d F Y') }}</td>
                        <td data-head="Flight Date">{{ \Carbon\Carbon::parse($ticket->flightDate)->format('d F Y') }}</td>
                        <td data-head="Route">{{$ticket->flightFrom}}  <i class="fa fa-plane">  {{$ticket->flightTo}}</i></td>
                        <td data-head="Airlines">{{$ticket->airlinesName}}</td>
                        <td data-head="Agent Fare">{{$ticket->agentFare}}</td>
                        <td data-head="Gross Fare">{{$ticket->grossFare}}</td>
                        <td data-head="Selling Fare">{{$ticket->sellingFare}}</td>
                        <td data-head="Pax">{{$ticket->totalPassenger}}</td>
                        <td data-head="Total Amount">{{$ticket->totalAmount}}</td>
                        <td data-head="Deposit">{{$ticket->depositAmount}}</td>
                        <td data-head="Due">{{$ticket->dueAmount}}</td>
                        <td data-head="Reference">{{$ticket->referenceBy}}</td>
                        <td data-head="Action" class="table_action_th">
                            <a title="View" class="action_btn" href=""><img src="{{ asset('assets/image/eye.gif') }}" alt=""></a>
                            <a title="Edit" class="action_btn" href="{{route('ticket.edit',Crypt::encrypt($ticket->id))}}"><img src="{{ asset('assets/image/edit.gif') }}" alt=""></a>
                            <a title="Delete" class="action_btn" onclick="return confirm('Are you sure delete this?')" href="{{route('ticket.delete',Crypt::encrypt($ticket->id))}}"><img src="{{ asset('assets/image/delete.gif') }}" alt=""></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="table_footer">
            <div class="table_pagination_wrapper">
                {{ $tickets->appends(['search' => $search])->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@include('inc.alert')
@endsection
