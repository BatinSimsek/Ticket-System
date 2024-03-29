<?php

namespace App\Http\Controllers\User;

use App\Exports\TicketExport;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Ticketcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        //Roept de user_id op
        $ticket = request()->user()->ticket()->get();

        return view('users.tickets.index', compact($user), ['ticket' => $ticket]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title'      => 'required',
            'ticket'     => 'required'
        ));

        $ticket = new Ticket;
        $ticket->title = $request->title;
        $ticket->ticket = $request->ticket;
        $ticket->save();

        //Link de ticket_id met de user_id table
        $ticket->users()->attach(Auth::id());

        return redirect()->route('users.tickets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Ticket $ticket, Request $request)
    {
        if (!$ticket->users->contains($request->user())) {
            return abort(403);
        }

        return view('users.tickets.show', ['ticket' => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit(Ticket $ticket, Request $request)
    {
        //check of de user hoort bij de user_id zo niet gooi abort
        if (!$ticket->users->contains($request->user())) {
            return abort(403);
        }

        return view('users.tickets.edit', [
            'ticket' => $ticket
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update([
            'title' => $request->title,
            'ticket' => $request->ticket
        ]);

        return redirect()->route('users.tickets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Ticket $ticket)
    {
        //delete methode detach de user van de ticket_user
        $ticket->users()->detach();
        $ticket->delete();
        return redirect()->route('users.tickets.index');
    }

    /**
     *
     * Export all organization user courses
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
       return Excel::download(new TicketExport,'users.xlsx');
    }
}
