<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Console\Scheduling\Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $events = Events::all();
        $categories = Categories::all();

        return view('index', compact('events', 'categories'));
    }

    public function showDashboard()
    {
        $events = Events::all();

        return view('dash', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'event_title' => 'required',
            'description' => 'required',
            'place' => 'required',
            'available_seats' => 'required',
            'category_id' => 'required',
            'event_status' => 'required',
            'events_access' => 'required',
        ]);

        Events::create($validatedData);

        return view('events');
    }
    public function filterEvents(Request $request)
    {
        $categoryId = $request->input('id');
        $order = $request->input('order');

        $query = Events::query();

        if ($categoryId) {

            $query->where('category_id', $categoryId);
        }

        if ($order === 'latest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($order === 'oldest') {
            $query->orderBy('created_at', 'asc');
        }

        $events = $query->with('categories')->get();

        return view('partials.single', ['events' => $events], 'categories')->render();
    }

    /**
     * Display the specified resource.
     */
    public function show(Events $EventsController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Events $EventsController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'event_title' => 'required',
            'description' => 'required',
            'place' => 'required',
            'available_seats' => 'required',
            'category_id' => 'required',
        ]);

        $event = Events::findOrFail($id);

        $event->update([
            'event_title' => $request->event_title,
            'description' => $request->description,
            'place' => $request->place,
            'available_seats' => $request->available_seats,
            'category_id' => $request->available_seats,
        ]);

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $events = Events::paginate(6);
        $searchQuery = $request->input('search');

        $categories = Categories::all();

        if ($searchQuery) {
            $eventSearchResults = Events::where('event_title', 'like', '%' . $searchQuery . '%')->paginate(6);
        } else {
            $eventSearchResults = $events;
        }
        return view('index', compact('eventSearchResults', 'events', "categories"));
    }


    public function delete($id)
    {
        Events::destroy($id);
        return redirect()->back()->with('success', 'Event deleted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Events $EventsController)
    {
        //
    }
}
