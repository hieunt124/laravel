<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UpdateRequest $request)
    {
        $users = DB::table('users')->get();
        return view('users.users', compact('users'));
    }
    public function bulkAction(UpdateRequest $request)
    {
        $userids = $request->input('user_ids',[]);
        if(empty($userids)){
            return redirect()->back()->with('error', 'Please select at least one user!');
        }
        $action = $request->input('action');
        if($action == 'delete'){
            DB::table('users')->whereIn('id', $userids)->delete();
            return redirect()->back()->with('success', 'Delete success!');
        }
        elseif ($action == 'edit')
        {
            session(['userids' => $userids]);
            return redirect()->route('users.edit');
        }
        return redirect()->back()->with('error', 'Invalid action!');

    }
    public function edit(){
        $userids = session('userids',[]);
        $users = DB::table('users')->whereIn('id', $userids)->get();
        return view('users.edit', compact('users'));
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
    public function update(UpdateRequest $request)
    {
        $updateusers = $request->input('users',[]);
        foreach ($updateusers as $id => $data){
            DB::table('users')
                -> where('id', $id)
                -> update([
                    'username' => $data['name'],
                    'email' => $data['email'],
                ]);
        }
        return redirect()->route('users.index')->with('success', 'Update success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
