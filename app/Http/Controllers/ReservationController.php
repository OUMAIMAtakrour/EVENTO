<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Ticket;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request)
    {
        // Create the reservation
        $reservation = Reservation::create([
            'client_id' => $request->client,
            'event_id' => $request->event,
        ]);


        $ticket = Ticket::create([
            'reservationID' => $reservation->id,

        ]);


        return redirect()->route('tickets.show', ['ticket' => $ticket->id]);
    }


    /**
     * Display the specified resource.
     */
   
public function show(Ticket $ticket)
{
    return view('tickets', compact('ticket'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
