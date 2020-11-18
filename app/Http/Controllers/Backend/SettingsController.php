<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


class SettingsController extends Controller
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

    public function index()
    {
        if(Gate::denies('manage-settings')){
            return redirect(route('backend.dashboard.index'));
        }

        $authUser = Auth::user();

        return view('backend.settings.index')->with([
                'authUser' => $authUser
        ]);
    }


}
