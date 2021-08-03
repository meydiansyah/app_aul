<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view('admin.review.index', compact('reviews'));
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
        return view('admin.review.create', compact('users', 'jasas'));
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
            'star' => 'required',
            'comment' => 'required',
        ]);

        Review::create([
            'user_id' => $request->user_id,
            'jasa_id' => $request->jasa_id,
            'star' => $request->star,
            'comment' => $request->comment,
        ]);
        return redirect()->route('review.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        $review = Review::find($review->id);
        return view('admin.review.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        $review = Review::find($review->id);
        $users = User::all();
        $jasas = Jasa::all();
        return view('admin.review.edit', compact('review', 'users', 'jasas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'user_id' => 'required',
            'jasa_id' => 'required',
            'star' => 'required',
            'comment' => 'required',
        ]);

        $review = Review::find($review->id);
        $review->update([
            'user_id' => $request->user_id,
            'jasa_id' => $request->jasa_id,
            'star' => $request->star,
            'comment' => $request->comment,
        ]);
        return redirect()->route('review.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review = Review::find($review->id);
        $review->delete();
        return redirect('/review');
    }
}
