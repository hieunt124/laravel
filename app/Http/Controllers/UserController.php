<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UpdateRequest $request)
    {
        $users = DB::table('users')->paginate(4);
        return view('/admin/users.users', compact('users'));
    }
    public function edit($id)
    {
        $users = DB::table('users')->where('id', $id)->first();
        if (!$users) {
            return redirect()->route('users.index')->with('error', 'User not found!');
        }
        return view('users.update', compact('users'));
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
    public function store(Request $request)
    {
        //
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
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        $update = DB::table('users')->where('id', $id)->update([
            'username' => $request->get('name'),
            'email' => $request->get('email'),
            'updated_at' => now(),
    ]);
        if($update){
            return redirect()->route('users.index')->with('success', 'Update success!');
        }
        return redirect()->route('users.index')->with('error', 'Update failed!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = DB::table('users')->where('id', $id)->delete();
        if($item){
            return redirect()->route('users.index')->with('success', 'Delete success!');
        }
        return redirect()->route('users.index')->with('error', 'Delete failed!');
    }
}
