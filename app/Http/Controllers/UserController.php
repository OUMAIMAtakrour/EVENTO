<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Categories;

class UserController extends Controller
{
    public function index()
    {
        $events = Events::all();
        $categories = Categories::all();
        return view('index', compact('events', 'categories'));
    }
}
