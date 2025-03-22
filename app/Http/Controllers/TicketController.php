<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Crypt;

class TicketController extends Controller
{

    public function index(Request $request)
{
    $search = $request->search;

    if ($search) {
        $tickets = Ticket::where('pnr', 'like', '%' . $search . '%')->paginate(5);
    } else {
        $tickets = Ticket::paginate(5);
    }

    return view('ticket.ticket_list', compact('tickets','search'));
}



    public function create()
    {
        return view('ticket.add_ticket');
    }


    public function store(Request $request)
    {

        $request->validate([
            'pnr'             => 'required',
            'issueDate'       => 'required',
            'flightDate'      => 'required',
            'flightFrom'      => 'required',
            'flightTo'        => 'required',
            'airlinesName'    => 'required',
            'totalPassenger'  => 'required',
            'agentFare'       => 'required',
            'grossFare'       => 'required',
            'sellingFare'     => 'required',
            'totalAmount'     => 'required',
            'depositAmount'   => 'required',
            'dueAmount'       => 'required',
            'referenceBy'     => 'required',
        ]);

        try {
            Ticket::create([
                "pnr"             => $request->pnr,
                "issueDate"       => $request->issueDate,
                "flightDate"      => $request->flightDate,
                "flightFrom"      => $request->flightFrom,
                "flightTo"        => $request->flightTo,
                "airlinesName"    => $request->airlinesName,
                "totalPassenger"  => $request->totalPassenger,
                "agentFare"       => $request->agentFare,
                "grossFare"       => $request->grossFare,
                "sellingFare"     => $request->sellingFare,
                "totalAmount"     => $request->totalAmount,
                "depositAmount"   => $request->depositAmount,
                "dueAmount"       => $request->dueAmount,
                "referenceBy"     => $request->referenceBy
            ]);

            return redirect()->route('ticket.list')->with('success','Ticket added successfully');

        } catch (\Exception $e) {
            return redirect()->route('ticket.list')->with('error','Ticket added failed');
        }
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $decId = Crypt::decrypt($id);
        $ticket = Ticket::findorFail($decId);
        return view('ticket.edit_ticket',compact('ticket'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'pnr'             => 'required',
            'issueDate'       => 'required',
            'flightDate'      => 'required',
            'flightFrom'      => 'required',
            'flightTo'        => 'required',
            'airlinesName'    => 'required',
            'totalPassenger'  => 'required',
            'agentFare'       => 'required',
            'grossFare'       => 'required',
            'sellingFare'     => 'required',
            'totalAmount'     => 'required',
            'depositAmount'   => 'required',
            'dueAmount'       => 'required',
            'referenceBy'     => 'required',
        ]);

        try {

            $decId = Crypt::decrypt($id);
            $ticket = Ticket::findorFail($decId);

            $ticket->update([
                "pnr"             => strtoupper($request->pnr),
                "issueDate"       => $request->issueDate,
                "flightDate"      => $request->flightDate,
                "flightFrom"      => $request->flightFrom,
                "flightTo"        => $request->flightTo,
                "airlinesName"    => $request->airlinesName,
                "totalPassenger"  => $request->totalPassenger,
                "agentFare"       => $request->agentFare,
                "grossFare"       => $request->grossFare,
                "sellingFare"     => $request->sellingFare,
                "totalAmount"     => $request->totalAmount,
                "depositAmount"   => $request->depositAmount,
                "dueAmount"       => $request->dueAmount,
                "referenceBy"     => $request->referenceBy
            ]);

            return redirect()->route('ticket.list')->with('success','Ticket update successfully');

        } catch (\Exception $e) {
            return redirect()->route('ticket.list')->with('error','Ticket update failed');
        }
    }


    public function destroy($id)
    {
        try {
            $decId = Crypt::decrypt($id);
            $ticket = Ticket::findorFail($decId);
            $ticket->delete();
            return redirect()->route('ticket.list')->with('success','Ticket delete successfully');
        }  catch (\Exception $e) {
            return redirect()->route('ticket.list')->with('error','Ticket delete failed');
        }
    }
}
