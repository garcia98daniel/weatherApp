<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //

    public function deleteUser($id){
        $user = User::find($id);

        $user->delete();

        return redirect('/listado');
    }

    public function getUser($id){
        $user = User::find($id);
        return view("editUser")->with('usuario', $user);

    }

    public function updateUser(Request $request){
        $user = User::find($request->get('userId'));
        // dd($request->get('admin'));
        // $adminValue = intval('42'); 
        $user->update([
            'admin' => $request->get('admin'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'ubicacion' => $request->get('ubicacion'),
        ]);

        return redirect('/listado');

        // dd($user);
    }
}
