<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class EventsController extends Controller
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
        $events = Event::all();

        if(count($events) > 0){
            return view('backend.events.index')->with([
                'authUser' => $authUser,
                'events' => $events
            ]);
        }else{
            return view('backend.events.index')->with([
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
        if(Gate::denies('create-events')){
            return redirect(route('backend.dashboard.index'));
        }

        $authUser = Auth::user();

        return view('backend.events.create')->with([
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
        if(Gate::denies('create-events')){
            return redirect(route('backend.dashboard.index'));
        }

        $event = new Event([
            'date' => $request->get('date'),
            'place' => $request->get('place'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'link' => $request->get('link'),
        ]);

        if($event){

            $saved = $event->save();

            if($saved){
                $request->session()->flash('success', 'Agenda atualizada com sucesso!');
            }else{
                $request->session()->flash('error', 'Erro! Agenda não atualizada.');
            }
        }else{
            $request->session()->flash('error', 'Erro! Datas passadas não são permitidas.');
        }

        return redirect()->route('backend.events.index');
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
    public function edit(Event $event)
    {
        if(Gate::denies('edit-events')){
            return redirect(route('backend.dashboard.index'));
        }

        $authUser = Auth::user();

        return view('backend.events.edit')->with([
            'authUser' => $authUser,
            'event' => $event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {

        $event->date = $request->date;
        $event->place = $request->place;
        $event->city = $request->city;
        $event->state = $request->state;
        $event->link = $request->link;

        $saved = $event->save();

        if($saved){
            $request->session()->flash('success', 'Evento de ' . date('d/m/Y', strtotime($event->date)) . ' atualizado com sucesso!');
        }else{
            $request->session()->flash('error', 'Erro! Evento não atualizado.');
        }

        return redirect()->route('backend.events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Event $event)
    {
        if(Gate::denies('delete-events')){
            return redirect(route('backend.events.index'));
        }

        if($event->delete()){
            $request->session()->flash('success', 'Evento excluído com sucesso!');
        }else{
            $request->session()->flash('error', 'Erro! Evento não excluído.');
        }

        return redirect()->route('backend.events.index');
    }
}
