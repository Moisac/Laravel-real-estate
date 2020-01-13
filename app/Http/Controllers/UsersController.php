<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use App\Role;
use App\Posts;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $users = User::with('roles')->get();

        $users = User::paginate(15);

        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'password'=>'required'

        ]);

        $users = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'password' => Hash::make($request->get('password')),
        ]);

        $users->save();

        return redirect('admin/users');
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
    public function edit($id)
    {
        $users = User::find($id);
        
        return view('admin.users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'password'=>'required'

        ]);

        $users = User::find($id);
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->phone = $request->get('phone');
        $users->password = $request->get('password');

        $users->save();

        return redirect('admin/users')->with('toast_info', 'Date utilizator modificate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/admin/users')->with('toast_success', 'Utilizatorul a fost sters.');
    }

    public function giveAdmin($userId) {

        $user = User::where('id', $userId)->firstOrFail();

        $adminRole = Role::where('name', 'admin')->firstOrFail();

        $user->roles()->attach($adminRole->id);

        toast('Rol de admin atribuit!','success')->width('100px;');

        return redirect('/admin/users');


    }

    public function removeAdmin($userId) {

        $user = User::where('id', $userId)->firstOrFail();

        $adminRole = Role::where('name', 'admin')->firstOrFail();

        $user->roles()->detach($adminRole->id);

        toast('Rol de utilizator atribuit!','success')->width('100px;');

        return redirect('/admin/users');


    }

    public function givePremium($userId) {

        $user = User::where('id', $userId)->firstOrFail();

        $premiumRole = Role::where('name', 'premium')->firstOrFail();

        $user->roles()->attach($premiumRole->id);

        toast('Utilizator premium atribuit!','success')->width('100px;');

        return redirect('/admin/users');
    }

    public function removePremium($userId) {

        $user = User::where('id', $userId)->firstOrFail();

        $premiumRole = Role::where('name', 'premium')->firstOrFail();

        $user->roles()->detach($premiumRole->id);

        toast('Rol de utilizator atribuit!','success')->width('100px;');

        return redirect('/admin/users');
    }

}
