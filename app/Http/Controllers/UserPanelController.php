<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPanel;

class UserPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $users = UserPanel::take(10)->get();
            return view('user.index', ['users' => $users]);
        }
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
    public function show(Request $request)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id = null)
    {
        $user = UserPanel::find($id);

        

        // Puedes personalizar la vista que mostrará el formulario de edición
        return view('user.edit', compact('user'));
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
