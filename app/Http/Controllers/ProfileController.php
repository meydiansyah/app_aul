<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kota;
use App\Models\Status;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $statuses = Status::all();
    	return view('profile.index', compact('user', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            "name" => "required|string",
            "email" => "required|email|unique:users,id," . $id,
            "password" => "required",
            "gender" => "required",
            "phone" => "required|numeric",
            "city" => "required|string",
            "address" => "required|string",
        ]);

    	$user = User::where('id', Auth::user()->id)->first();

        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $filename = time() . "." . $file->getClientOriginalExtension();

            $file->move('image/profile', $filename);

            // File::delete('assets/image/profile' . $user->image);

            // Jika user mengganti passwornya password 

            if ($user->password != $request->password) {
                $user->update([
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => Hash::make($request->password),
                    "image" => $filename,
                    "gender" => $request->gender,
                    "phone" => $request->phone,
                    "city" => $request->city,
                    "address" => $request->address,
                    "desc" => $request->desc,
                ]);
            } else {
                // Jika user tidak mengganti passwordnya
                $user->update([
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => $request->password,
                    "image" => $filename,
                    "gender" => $request->gender,
                    "phone" => $request->phone,
                    "city" => $request->city,
                    "address" => $request->address,
                    "desc" => $request->desc,
                ]);
            }
        } else {
            //jika user tidak mengubah foto
            $user->update([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
                "gender" => $request->gender,
                "phone" => $request->phone,
                "city" => $request->city,
                "address" => $request->address,
                "desc" => $request->desc,
            ]);
        }
    	
    	return redirect('profile');
    }
}
