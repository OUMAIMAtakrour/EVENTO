<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Events;
use App\Models\Organizer;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $events = Events::with('organizers')->where('event_status', 'pending')->get();
        return view('dashboard', compact('events'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $clients = Client::all();
        $organizers = Organizer::all();
        return view('Users', compact('organizers', 'clients'));
    }
    public function ban(Organizer $organizers)
    {
        $organizers->update([
            'isBanned' => '1'
        ]);
        return redirect()->back()->with('success', 'Event accepted!');
    }
  


    public function block(Client $clients)
    {
        $clients->update([
            'isBanned' => '1'
        ]);
        return redirect()->back()->with('success', 'Event accepted!');
    }
    public function unblock(Client $clients)
    {
        $clients->update([
            'isBanned' => '0'
        ]);
        return redirect()->back()->with('success', 'Event accepted!');
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
