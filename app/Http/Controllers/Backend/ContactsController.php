<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Contacts;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $request)
    {
        return Validator::make($request, [

        ]);
    }

    public function index()
    {
        if(Gate::denies('manage-contacts')){
            return redirect(route('backend.dashboard.index'));
        }

        $authUser = Auth::user();
        $contacts = Contacts::find(1);

        if($contacts){
            return view('backend.contacts.edit')->with([
                'authUser' => $authUser,
                'contacts' => $contacts
            ]);
        }else{
            return view('backend.contacts.edit')->with([
                'authUser' => $authUser
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contacts $contacts)
    {
        if(Gate::denies('create-contacts')){
            return redirect(route('backend.dashboard.index'));
        }

        $request->validate([

        ]);

        $contacts = new Contacts([
            'sitename' => $request->get('sitename'),
            'legal_name' => $request->get('legal_name'),
            'trade_name' => $request->get('trade_name'),
            'cnpj' => $request->get('cnpj'),
            'address' => $request->get('address'),
            'number' => $request->get('number'),
            'complement' => $request->get('complement'),
            'zipcode' => $request->get('zipcode'),
            'neighborhood' => $request->get('neighborhood'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'cel_number' => $request->get('cel_number'),
            'whatsapp' => $request->get('whatsapp'),
            'facebook' => $request->get('facebook'),
            'instagram' => $request->get('instagram'),
            'youtube' => $request->get('youtube'),
            'spotify' => $request->get('spotify'),
        ]);

        $saved = $contacts->save();

        if($saved){
            $request->session()->flash('success', 'Dados de contato adicionados com sucesso!');
        }else{
            $request->session()->flash('error', 'Erro! Dados não adicionados.');
        }

        return redirect()->route('backend.contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $contacts)
    {
        return view ('backend.contacts.show')->with('contacts', $contacts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacts  $Contacts
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacts $contacts)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacts  $Contacts
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Contacts $contacts)
    {
        if(Gate::denies('edit-contacts')){
            return redirect(route('backend.dashboard.index'));
        }

        $saved = DB::table('contacts')
                    ->updateOrInsert(
                        ['id' => $request->id],
                        [
                            'sitename' => $request->get('sitename'),
                            'legal_name' => $request->get('legal_name'),
                            'trade_name' => $request->get('trade_name'),
                            'cnpj' => $request->get('cnpj'),
                            'address' => $request->get('address'),
                            'number' => $request->get('number'),
                            'complement' => $request->get('complement'),
                            'zipcode' => $request->get('zipcode'),
                            'neighborhood' => $request->get('neighborhood'),
                            'city' => $request->get('city'),
                            'state' => $request->get('state'),
                            'email' => $request->get('email'),
                            'phone_number' => $request->get('phone_number'),
                            'cel_number' => $request->get('cel_number'),
                            'whatsapp' => $request->get('whatsapp'),
                            'facebook' => $request->get('facebook'),
                            'instagram' => $request->get('instagram'),
                            'youtube' => $request->get('youtube'),
                            'spotify' => $request->get('spotify'),
                        ]
                    );

        if($saved){
            $request->session()->flash('success', 'Dados do site ' . $contacts->sitename . ' atualizados com sucesso!');
        }else{
            $request->session()->flash('error', 'Erro! Dados de contato não atualizados.');
        }

        return redirect()->route('backend.contacts.index');
    }
}
