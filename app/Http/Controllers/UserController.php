<?php

namespace App\Http\Controllers;

use App\Models\GerantAdmin;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getUser(){
        //pour afficher juste 5 elements par page :
        // $users = User::paginate(5);
        
        $users = GerantAdmin::paginate(5);
        return view('users.show', compact('users'));
    }

    public function getUserMobile(){
        //pour afficher juste 5 elements par page :
        // $users = User::paginate(5);
        
        $users = User::paginate(10);
        return view('users.showUserMobile', compact('users'));
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
