<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPanel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{   
    protected $connetion =  'pgslq';
    protected $connetion2 =  'oracle';
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        //
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
    public function show($show)
    {
         /*
        Datos del usuario que ha iniciado sesion
        */
        
        $user = User::where('id',$show)->firstorFail();

        $consultaBasePostgres = User::all();

        $consultaBaseOracle = UserPanel::where('run',$user->run)->get();

    
        return view('user.show',['user'=>$user,'usersPostgres' => $consultaBasePostgres, 'UsersOracle'=>$consultaBaseOracle ]);
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
