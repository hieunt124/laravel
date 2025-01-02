<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function handleLogin(LoginRequest $request)
    {
//        $validated = $request->validate([
//            'username' => 'required',
//            'password' => 'required',
//        ],[
//                'username.required' => 'Username is required.',
//                'password.required' => 'Password is required.',
//            ]
//        );
        $login = [
            'username' => $request->get('username'),
            'password' =>$request->get('password')
        ];
        if (!Auth::attempt($login)) {
            return redirect()->back()->with('error', 'username hoặc Password không chính xác');
        }
        return redirect()->route('dashboard');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
