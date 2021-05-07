<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
$this->authorize('create',User::class);

        return 'create';
    }
    public function index()
    {
         $this->authorize('haveaccess', 'user.index');
          $users = User::with('roles')->orderBy('id', 'Desc')->paginate(4);

        return view('user.index', compact(['users']));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $this->authorize('view',[$user, ['user.show','userown.show']]);
          $roles = Role::orderBy('name')->get();

         return view('user.view', compact('roles', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
  $this->authorize('update',[$user, ['user.edit','userown.edit']]);

          $roles = Role::orderBy('name')->get();

         return view('user.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
          $request->validate([
            'name'        => 'required|max:50|unique:users,name,'.$user->id,
            'email'        => 'required|max:50|unique:users,email,'.$user->id,

        ]);

        $user->update($request->all());
          $user->roles()->sync($request->get('roles'));

       //}
        return redirect()->route('user.index')->with('status_success', 'user updated successfully');
        //if ($request->get('permission')) {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
$this->authorize('haveaccess', 'user.destroy');
        $user->delete();
          return redirect()->route('user.index')->with('status_success', 'User remove successfully');
    }
}
