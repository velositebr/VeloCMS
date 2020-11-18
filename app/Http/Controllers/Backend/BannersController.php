<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Banner;

class BannersController extends Controller
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
        $banners = Banner::all();

        if(count($banners) > 0){
            return view('backend.banners.index')->with([
                'authUser' => $authUser,
                'banners' => $banners
            ]);
        }else{
            return view('backend.banners.index')->with([
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
        if(Gate::denies('create-banners')){
            return redirect(route('backend.dashboard.index'));
        }

        $authUser = Auth::user();

        return view('backend.banners.create')->with([
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
        if(Gate::denies('create-banners')){
            return redirect(route('backend.dashboard.index'));
        }

        $banner = new Banner([
            'title' => $request->get('title'),
            'subtitle' => $request->get('subtitle'),
            'calltoaction' => $request->get('calltoaction'),
            'link' => $request->get('link'),
        ]);

        $saved = $banner->save();

        if($saved){
            $request->session()->flash('success', 'Banner cadastrado com sucesso!');
        }else{
            $request->session()->flash('error', 'Erro! Banner não cadastrado.');
        }

        return redirect()->route('backend.banners.index');
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
    public function edit(Banner $banner)
    {
        if(Gate::denies('edit-banners')){
            return redirect(route('backend.banners.index'));
        }

        $authUser = Auth::user();

        return view('backend.banners.edit')->with([
            'authUser' => $authUser,
            'banner' => $banner,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->calltoaction = $request->calltoaction;
        $banner->link = $request->link;

        $saved = $banner->save();

        if($saved){
            $request->session()->flash('success', 'Banner atualizado com sucesso!');
        }else{
            $request->session()->flash('error', 'Erro! Banner não atualizado.');
        }

        return redirect()->route('backend.banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Banner $banner)
    {
        if(Gate::denies('delete-banners')){
            return redirect(route('backend.banners.index'));
        }

        if($banner->delete()){
            $request->session()->flash('success', 'Banner excluído com sucesso!');
        }else{
            $request->session()->flash('error', 'Erro! Banner não excluído.');
        }

        return redirect()->route('backend.banners.index');
    }
}
