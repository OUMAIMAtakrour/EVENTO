<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Organizer;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Organizer as ModelsOrganizer;

class OrganizerController extends Controller
{
    public function index()
    {
        $events = Events::all();
        $categories = Categories::all();
        return view('dash', compact('events', 'categories'));
    }

    public function unblock(Organizer $organizers)
    {
        $organizers->update([
            'isBanned' => '0'
        ]);
        return redirect()->back()->with('success', 'Event accepted!');
    }
}
