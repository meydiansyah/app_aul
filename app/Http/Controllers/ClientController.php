<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = User::where('level', 'client')->get();
        return view('admin.client.index', compact('clients'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user, $id)
    {
        $user = User::find($id);
        return view('admin.client.show', compact('user'));
    }

    public function edit(User $user, $id)
    {
        $user = User::find($id);
        return view('admin.client.edit', compact('user'));
    }

    public function update(Request $request, User $user, $id)
    {
        $request->validate([
            'name' => 'required|max:150',
            'level' => 'required',
            // 'image' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);

        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'level' => $request->level,
            // 'image' => $request->image,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'city' => $request->city,
            'address' => $request->address,
        ]);
        return redirect()->route('client.index');
    }

    public function destroy(User $user, $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/client');
    }
}
