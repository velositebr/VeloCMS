<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => ['required']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $authUser = Auth::user();
        return view('backend.users.index')->with([
            'users' => $users,
            'authUser' => $authUser
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-users')){
            return redirect(route('backend.users.index'));
        }

        $roles = Role::all();
        $authUser = Auth::user();

        return view('backend.users.create')->with([
            'authUser' => $authUser,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'roles' => 'required'
        ]);

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $saved = $user->save();

        if($saved){
            $request->session()->flash('success', 'Usuário adicionado com sucesso!');
        }else{
            $request->session()->flash('error', 'Erro! Usuário não adicionado.');
        }

        $user->roles()->sync($request->roles);

        return redirect()->route('backend.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $authUser = Auth::user();

        return view('backend.users.show')->with([
            'authUser' => $authUser,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('edit-users')){
            return redirect(route('backend.users.index'));
        }

        $roles = Role::all();
        $authUser = Auth::user();

        return view('backend.users.edit')->with([
            'authUser' => $authUser,
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'roles' => 'required'
        ]);

        $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->updated_at = date("Y-m-d H:i:s");

        if($request->password){
            $this->validate($request,[
                'password' => 'required|string|min:6|confirmed',
            ]);

            $user->password = Hash::make($request->password);
        }

        $saved = $user->save();

        if($saved){
            $request->session()->flash('success', $user->name . ' atualizado com sucesso!');
        }else{
            $request->session()->flash('error', 'Erro! Usuário não atualizado.');
        }

        return redirect()->route('backend.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        if(Gate::denies('delete-users')){
            return redirect(route('backend.users.index'));
        }

        if($user->delete()){
            $user->roles()->detach();
            $request->session()->flash('success', 'Usuário excluído com sucesso!');
        }else{
            $request->session()->flash('error', 'Erro! Usuário não excluído.');
        }

        return redirect()->route('backend.users.index');
    }
}
