<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\Page;

class ContatoController extends Controller
{
    public function content()
    {
        $contacts = Contacts::find(1);
        $page = Page::where('slug', '=', 'contato')->first();
        $menus = Page::all();

        return view('contato')->with([
            'page' => $page,
            'menus' => $menus,
            'contacts' => $contacts,
        ]);
    }
}
