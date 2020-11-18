<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Page;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('manage-pages')){
            return redirect(route('backend.dashboard.index'));
        }

        $authUser = Auth::user();
        $pages = Page::all();


        return view('backend.pages.index')->with([
            'authUser' => $authUser,
            'pages' => $pages
        ]);

    }

    public function edit(Page $page)
    {
        if(Gate::denies('edit-pages')){
            return redirect(route('backend.pages.index'));
        }

        $authUser = Auth::user();

        return view('backend.pages.edit')->with([
            'authUser' => $authUser,
            'page' => $page
        ]);
    }

    public function update(Request $request, Page $page)
    {
        if(Gate::denies('edit-pages')){
            return redirect(route('backend.dashboard.index'));
        }

        $page->title = $request->title;
        $page->subtitle = $request->subtitle;
        $page->menu = $request->menu;
        $page->content = $request->content;
        $page->link = $request->link;
        $page->code = $request->code;
        $page->updated_at = date("Y-m-d H:i:s");

        $saved = $page->save();

        if($saved){
            $request->session()->flash('success', 'Página ' . $page->menu . ' atualizada com sucesso!');
        }else{
            $request->session()->flash('error', 'Erro! Página ' . $page->menu . ' não atualizada.');
        }

        return redirect()->route('backend.pages.index');
    }
}
