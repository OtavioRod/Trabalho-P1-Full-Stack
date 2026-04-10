<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserProfile;
class UserProfileController extends Controller
{
    public function index()
    {
        $users = UserProfile::all();
        return view('users.index', compact('users'));
    }
 
    public function create()
    {
        return view('users.create');
    }
 
    public function store(Request $request)
    {
        UserProfile::create($request->all());
        return redirect('/');
    }
 
    public function edit($id)
    {
        $user = UserProfile::findOrFail($id);
        return view('users.edit', compact('user'));
    }
 
    public function update(Request $request, $id)
    {
        $user = UserProfile::findOrFail($id);
        $user->update($request->all());
        return redirect('/');
    }
 
    public function destroy($id)
    {
        UserProfile::findOrFail($id)->delete();
        return redirect('/');
    }
}


