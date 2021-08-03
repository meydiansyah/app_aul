<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Jasa;
use App\Models\Portofolio;
use App\Models\User;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jasas = Jasa::all();
        return view('admin.jasa.index', compact('jasas'));
    }

    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        $portofolios = Portofolio::all();
        $jasas = Jasa::all();
        return view('admin.jasa.create', compact('users', 'categories', 'portofolios', 'jasas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
            'portofolio_id' => 'required',
            'timestart' => 'required',
            'timestop' => 'required',
            'price' => 'required',
            'desc' => 'required',
        ]);

        Jasa::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'portofolio_id' => $request->portofolio_id,
            'timestart' => $request->timestart,
            'timestop' => $request->timestop,
            'price' => $request->price,
            'desc' => $request->desc,
        ]);
        return redirect()->route('jasa.index');
    }

    public function show(Jasa $jasa)
    {
        $jasa = Jasa::find($jasa->id);
        return view('admin.jasa.show', compact('jasa'));
    }

    public function edit(Jasa $jasa)
    {
        $users = User::where('level', 'freelancer')->get();
        $categories = Category::all();
        $portofolios = Portofolio::all();
        $jasa = Jasa::find($jasa->id);
        return view('admin.jasa.edit', compact('users', 'categories', 'portofolios', 'jasa'));
    }

    public function update(Request $request, Jasa $jasa)
    {
        $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
            'portofolio_id' => 'required',
            'timestart' => 'required',
            'timestop' => 'required',
            'price' => 'required',
            'desc' => 'required',
        ]);

        $jasa = Jasa::find($jasa->id);
        $jasa->update([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'portofolio_id' => $request->portofolio_id,
            'timestart' => $request-> timestart,
            'timestop' => $request->timestop,
            'price' => $request->price,
            'desc' => $request->desc,
        ]);
        return redirect()->route('jasa.index');
    }

    public function destroy(Jasa $jasa)
    {
        $jasa = Jasa::find($jasa->id);
        $jasa->delete();
        return redirect('/jasa');
    }
}
