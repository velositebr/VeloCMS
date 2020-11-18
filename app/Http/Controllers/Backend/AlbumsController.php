<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Album;

class AlbumsController extends Controller
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
        $authUser = Auth::user();
        $albums = Album::all();

        if(count($albums) > 0){
            return view('backend.albums.index')->with([
                'authUser' => $authUser,
                'albums' => $albums
            ]);
        }else{
            return view('backend.albums.index')->with([
                'authUser' => $authUser,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-albums')){
            return redirect(route('backend.dashboard.index'));
        }

        $authUser = Auth::user();

        return view('backend.albums.create')->with([
            'authUser' => $authUser,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::denies('create-albums')){
            return redirect(route('backend.dashboard.index'));
        }

        $album = new Album([
            'title' => $request->get('title'),
            'year' => $request->get('year'),
            'type' => $request->get('type'),
            'link' => $request->get('link'),
        ]);

        $saved = $album->save();

        if($saved){
            $request->session()->flash('success', 'Álbum ' . $album->title . ' cadastrado com sucesso!');
        }else{
            $request->session()->flash('error', 'Erro! Álbum não cadastrado.');
        }

        return redirect()->route('backend.albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        if(Gate::denies('edit-albums')){
            return redirect(route('backend.albums.index'));
        }

        $authUser = Auth::user();

        return view('backend.albums.edit')->with([
            'authUser' => $authUser,
            'album' => $album,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $album->title = $request->title;
        $album->year = $request->year;
        $album->type = $request->type;
        $album->link = $request->link;

        $saved = $album->save();

        if($saved){
            $request->session()->flash('success', 'Álbum ' . $album->title . ' atualizado com sucesso!');
        }else{
            $request->session()->flash('error', 'Erro! Álbum não atualizado.');
        }

        return redirect()->route('backend.albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Album $album)
    {
        if(Gate::denies('delete-albums')){
            return redirect(route('backend.albums.index'));
        }

        if($album->delete()){
            $request->session()->flash('success', 'Álbum ' . $album->title . ' excluído com sucesso!');
        }else{
            $request->session()->flash('error', 'Erro! Album não excluído.');
        }

        return redirect()->route('backend.albums.index');
    }
}
