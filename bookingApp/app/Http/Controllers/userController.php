<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        $userData = [
            'name' => $request->input('name'),
            'phone_number' => $request->input('phone_number'),
            'location' => $request->input('location'),
            'password' => bcrypt($request->input('password')),
            // Add other fields as needed
        ];

        $user = User::create($userData);

        return response()->json($user, 201);
    }
    // Other methods inside UserController class...
public function listUsers()
{
    $users = User::all();

    return response()->json($users, 200);
}
    public function getUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user, 200);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Update other fields as needed
        $user->save();

        return response()->json($user, 200);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted'], 200);
    }

}
