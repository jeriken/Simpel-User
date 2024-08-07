<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use App\Models\User;

class UserController extends Controller
{
    use ApiResponses;

    public function index(): JsonResponse
    {
        //get all users
        $users = User::get();

        //return collection of users
        return $this->successResponse($users, 200);
    }

    public function show($id): JsonResponse
    {
        //find users by ID
        $users = User::find($id);

        //return single users 
        return $this->successResponse($users, 200);
    }

    public function store(UserRequest $request): JsonResponse
    {

        //create users
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        //return response
        return $this->successResponse($users, 200);
    }

    public function update(Request $request, $id): JsonResponse
    {
        //find book by ID
        $book = User::find($id);

        //update book with new image
        $book->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        //return response
        return $this->successResponse($book, 200);
    }

    public function destroy($id)
    {

        //find user by ID
        $user = User::find($id);

        //delete user
        $user->delete();

        //return response
        return $this->successResponse(null, 200);
    }

}