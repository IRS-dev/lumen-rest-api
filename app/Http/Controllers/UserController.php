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
        $data = User::all();
        return response()->json($data, 200, $headers);
    }

    public function show($id)
    {
        $data = User::find($id);
        return response()->json($data, 200, $headers);
    }

    public function create(Request $request)
    {
        $result['nama'] = $request->nama;
        $result['email'] = $request->email;
        $result['alamat']= $request->alamat;
        $data = $result;
        return response()->json($data, 200, $headers);
    }
    
    public function store(Request $request,User $user)
    {


        return response()->json($data, 200, $headers);
    }

    public function delete($id)
    {
        User::destroy($id);
        return response()->json($data, 200, $headers);
    }
}
