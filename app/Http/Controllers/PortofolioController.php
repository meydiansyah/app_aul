<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\User;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portofolios = Portofolio::all();
        return view('admin.portofolio.index', compact('portofolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.portofolio.create', compact('users'));
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
            'user_id' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
            'desc' => 'required',
        ]);
        
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $filename = time() . "." . $file->getClientOriginalExtension();

            $file->move('admin/img/thumbnail', $filename);

            Portofolio::create([
                'user_id' => $request->user_id,
                'image' => $filename,
                'desc' => $request->desc,
            ]);
        }
        return redirect()->route('portofolio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portofolio $portofolio)
    {
        $portofolio = Portofolio::find($portofolio->id);
        return view('admin.portofolio.show', compact('portofolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portofolio $portofolio)
    {
        $users = User::all();
        $portofolio = Portofolio::find($portofolio->id);
        return view('admin.portofolio.edit', compact('users', 'portofolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        $request->validate([
            'user_id' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
            'desc' => 'required',
        ]);

        $portofolio = Portofolio::find($portofolio->id);
        
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $filename = time() . "." . $file->getClientOriginalExtension();

            $file->move('admin/img/thumbnail', $filename);
            
            $portofolio->update([
                'user_id' => $request->user_id,
                'image' => $filename,
                'desc' => $request->desc,
            ]);
        } else {
            $portofolio->update([
                'user_id' => $request->user_id,
                'desc' => $request->desc,
            ]);
        }
        return redirect()->route('portofolio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portofolio $portofolio)
    {
        $portofolio = Portofolio::find($portofolio->id);
        $portofolio->delete();
        return redirect('/portofolio');
    }
}
