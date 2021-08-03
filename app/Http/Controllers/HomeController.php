<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Status;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (auth()->user()->status_id == 1){
            if (auth()->user()->level == "admin"){
                $freelancers = User::where('level', 'freelancer')->get();
                $kliens = User::where('level', 'client')->get();
                $orders = Order::all();
                $reviews = Review::all();
                return view('admin.home', compact('freelancers', 'kliens', 'orders', 'reviews'));
            }
            if (auth()->user()->level == "freelancer") {
                $users = User::where('level', 'client')->get();
                $orders = Order::all();
                $reviews = Review::all();
                return view('admin.dashboard', compact('users', 'orders', 'reviews'));
            }
            if (auth()->user()->level == "client") {
                return view('home');
            }
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function edit(User $freelancer, $id)
    {
        if (auth()->user()->level == "admin") {
            $freelancer = User::find($id);
            $statuses = Status::all();
            return view('admin.role', compact('freelancer', 'statuses'));
        } else {
            return redirect('/home');
        }
        
    }
    
    public function update(Request $request , User $freelancer, $id)
    {
        $request->validate([
            'level' => 'required',
            'status_id' => 'required',
        ]);

        $freelancer = User::find($id);
        $freelancer->update([
            'level' => $request->level,
            'status_id' => $request->status_id,
        ]);
        return redirect('/home');
    }
}
