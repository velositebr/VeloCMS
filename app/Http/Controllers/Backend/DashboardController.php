<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TotalContacts;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $authUser = Auth::user();

        $users = User::all();
        $totalUsers = count($users);
        $totalVisitors = 0;

        $contacts = TotalContacts::find(1);
        if($contacts){
            $totalContacts = $contacts->total_contacts;
        }else{
            $totalContacts = 0;
        }

        return view('backend.dashboard.index')->with([
            'authUser' => $authUser,
            'totalUsers' => $totalUsers,
            'totalVisitors' => $totalVisitors,
            'totalContacts' => $totalContacts,
        ]);
    }
}
