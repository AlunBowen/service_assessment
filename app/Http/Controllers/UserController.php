<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use App\Models\Organisation;
use App\Actions\Fortify\PasswordValidationRules;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        if (auth()->user()->hasRole('super-admin') ) {
            
        $user = new CreateNewUser();
        $user->create($request->all());
     
        

        return redirect()->back()->with('success', 'User created successfully');
        } else {
            return redirect()->route('home');
        }

    }

    //Get the users for a specific organisation
    public function apiIndex($id)
    {

        $organisations = User::where('organisation_id', $id)->get();
        return response()->json($organisations);
    }
}
