<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Carbon;

class AgendaController extends Controller
{
    public function content()
    {
        $today = Carbon::now();
        $page = Page::where('slug', '=', 'agenda')->first();
        $menus = Page::all();
        $events = Event::whereDate('date', '>', $today)->get();
        $contacts = Contacts::find(1);

        return view('agenda')->with([
            'page' => $page,
            'menus' => $menus,
            'events' => $events,
            'contacts' => $contacts,
        ]);
    }
}
