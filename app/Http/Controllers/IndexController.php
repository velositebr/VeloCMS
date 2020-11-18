<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Page;
use App\Models\Banner;
use App\Models\Album;
use App\Models\Contacts;

class IndexController extends Controller
{
    public function index()
    {
        $authUser = Auth::user();
        $menus = Page::all();
        $banners = Banner::all();
        $albums = Album::all();
        $contacts = Contacts::find(1);
        $page = Page::where('slug', '=', '/')->first();

        if($authUser){
            return view('index')->with([
                'authUser' => $authUser,
                'menus' => $menus,
                'contacts' => $contacts,
                'page' => $page,
                'banners' => $banners,
                'albums' => $albums,
            ]);
        }else{
            return view('index')->with([
                'menus' => $menus,
                'contacts' => $contacts,
                'page' => $page,
                'banners' => $banners,
                'albums' => $albums,
            ]);
        }
    }
}
