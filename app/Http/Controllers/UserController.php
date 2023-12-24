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
    public function index()
    {
        User::all();
        return view("users.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("user.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'organisation_id' => 'required|exists:organisations,id',
        //     'password' => ['required', 'string', 'min:8', 'confirmed'], 
        // ]);
        
        $user = new CreateNewUser();
        $user->create($request->all());
        // $user->name = $validatedData['name'];
      
        // $user->email = $validatedData['email'];
        // $user->password = bcrypt($validatedData['password']);
        // $user->organisation()->associate(Organisation::find($validatedData['organisation_id']));
        // $user->save();

        

        return redirect()->back()->with('success', 'User created successfully');

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

    public function apiIndex($id)
    {

       error_log($id);
        $organisations = User::where('organisation_id', $id)->get();
        return response()->json($organisations);
    }
}
