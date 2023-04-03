<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
       return response()->json(User::all());
    }
    public function show($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            abort(404,"User not found");
        }
        return response()->json($user);
    }
    public function store(Request $request)
    {
        $validated = $this->validate($request,[
            'nama' => 'required|max:255',
            'email' => 'email|max:255|unique:users,email|required',
            'alamat' => 'required|max:255'
        ]);
        $user = new User($validated);
        $user->save();
        return response()->json($user);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (empty($user)) {
            abort(404,"User not found");
        }else{
            $validated = $this->validate($request,[
                'nama' => 'required|max:255',
                'email' => 'email|max:255|required',
                'alamat' => 'required|max:255'
            ]);
            $user->update([
                'nama'     => $validated['nama'],
                'email'   => $validated['email'],
                'alamat' => $validated['alamat']
            ]);
            return response()->json($user);
        }
    }
    public function delete($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            abort(404,"User not found");
        }else{
        $user->delete();
        return response()->json(['message'=> 'user deleted']);
        }
    }
}