<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Contacts;

class FotosController extends Controller
{
    public function content()
    {
        $page = Page::where('slug', '=', 'fotos')->first();
        $menus = Page::all();
        $contacts = Contacts::find(1);

        return view('fotos')->with([
            'page' => $page,
            'menus' => $menus,
            'contacts' => $contacts,
        ]);
    }
}
