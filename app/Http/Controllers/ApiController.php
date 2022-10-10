<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\JobsResource;
use App\Http\Resources\UserResource;
use App\Models\Category;
use App\Models\Jasa;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function register(Request $request)
    {
        $plainPassword = $request->password;
        $password = bcrypt($request->password);
        $request->request->add(['password' => $password]);
        // create the user account 
        $created = User::create($request->all());

        $request->request->add(['password' => $plainPassword]);
        return $this->login($request);
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );

        $input = $request->only('email', 'password');
        if (!$token = auth()->attempt($input)) {
            return response()->json([
                'message' => 'Invalid Email or Password',
            ], 401);
        }
        $user = UserResource::make(auth()->user());

        return response()->json(
            [
                'success' => true,
                'token' => $token,
                'data' => $user
            ]
        );
    }

    public function getAllUser()
    {
        $data = UserResource::collection(User::where('level', '=', 'freelancer')->get());
        return response()->json($data);
    }

    public function getUser($id)
    {
        $user = UserResource::make(User::find($id));
        return response()->json($user);
    }

    public function allJobs()
    {
        $data = JobsResource::collection(Jasa::all());
        return response()->json($data);
    }

    public function getJob($id)
    {
        $data = JobsResource::make(Jasa::find($id));
        return response()->json($data);
    }

    public function allCategory()
    {
        $data = CategoryResource::collection(Category::all());
        return response()->json($data);
    }

    public function storeComment(Request $request)
    {
        $data = Review::create($request->all());
        return response()->json(
            [
                'message' => 'Success',
                'data' => $data
            ]
        );
    }

    public function deleteComment($id)
    {
        $data = Review::find($id)->delete();
        return response()->json(
            [
                'message' => 'Success Deleted',
                'data' => $data
            ]
        );
    }

    public function storeOrder(Request $request)
    {
        $data = Order::create($request->all());
        return response()->json(
            [
                'message' => 'Success',
                'data' => $data
            ]
        );
    }

    public function updateOrder(Request $request, $id)
    {
        $data = Order::find($id)->update($request->all());
        return response()->json(
            [
                'message' => 'Success update data',
            ]
        );
    }

    public function deleteOrder($id)
    {
        $data = Order::find($id)->delete();
        return response()->json(
            [
                'message' => 'Data has been deleted',
                'data' => $data
            ]
        );
    }

    public function getOrder($id)
    {
        $data = Order::find($id)->get();
        return response()->json($data);
    }
}
