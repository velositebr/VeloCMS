<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserContact;
use App\Models\TotalContacts;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {

        try {
            Mail::to('contato@lucasakiraefabio.com.br')->send(
              new UserContact($request)
            );

            $total = 1;
            $total_contacts = TotalContacts::find(1);

            if($total_contacts){
                $total = $total_contacts->total_contacts + 1;
            }

            DB::table('total_contacts')
                    ->updateOrInsert(
                        ['id' => 1],
                        [
                            'total_contacts' => $total,
                        ]
                    );

            $request->session()->flash('success', 'E-mail enviado com sucesso!');
            return redirect()->route('home');

          } catch (\Throwable $th) {

            $request->session()->flash('error', 'Erro! E-mail não enviado!');
            return redirect()->route('home');
          }

    }
}
