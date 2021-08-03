<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Jasa;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $jasas = Jasa::all();
        return view('admin.order.create', compact('users', 'jasas'));
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
            'jasa_id' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'total_people' => 'required',
            'status' => 'required',
            'booking_date' => 'required',
            'booking_start' => 'required',
            'booking_end' => 'required',
        ]);

        Order::create([
            'user_id' => $request->user_id,
            'jasa_id' => $request->jasa_id,
            'phone' => $request->phone,
            'address' => $request->address,
            'total_people' => $request->total_people,
            'status' => $request->status,
            'booking_date' => $request->booking_date,
            'booking_start' => $request->booking_start,
            'booking_end' => $request->booking_end,
        ]);
        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $order = Order::find($order->id);
        return view('admin.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // dd($request->all);
        $request->validate([
            'status' => 'required',
        ]);

        $order = Order::find($order->id);
        $order->update(['status' => $request->status]);
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order = Order::find($order->id);
        $order->delete();
        return redirect('/order');
    }
}
