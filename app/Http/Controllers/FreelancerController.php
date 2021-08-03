<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    public function index()
    {
        $freelancers = User::where('level', 'freelancer')->get();
        return view('admin.freelancer.index', compact('freelancers'));
    }

    public function create()
    {
        return view('admin.freelancer.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user, $id)
    {
        $user = User::find($id);
        return view('admin.freelancer.show', compact('user'));
    }

    public function edit(User $user, $id)
    {
        $user = User::find($id);
        return view('admin.freelancer.edit', compact('user'));
    }

    public function update(Request $request, User $user, $id)
    {
        $request->validate([
            'name' => 'required|max:150',
            'level' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);

        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'level' => $request->level,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'city' => $request->city,
            'address' => $request->address,
        ]);
        return redirect()->route('freelancer.index');
    }

    public function destroy(User $user, $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/freelancer');
    }
}
