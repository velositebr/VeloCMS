<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\Page;

class SobreController extends Controller
{
    public function content()
    {
        $page = Page::where('slug', '=', 'sobre')->first();
        $menus = Page::all();
        $contacts = Contacts::find(1);

        return view('sobre')->with([
            'page' => $page,
            'menus' => $menus,
            'contacts' => $contacts,
        ]);
    }
}
