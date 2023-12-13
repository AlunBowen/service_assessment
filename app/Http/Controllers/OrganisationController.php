<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganisationRequest;
use App\Http\Requests\UpdateOrganisationRequest;
use App\Models\Organisation;
use App\Models\User;
use Illuminate\Http\Request;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('viewAny', Organisation::class) ) {
            return view('organisations.index', [
                'organisations' => Organisation::all(),
            ]);

        } else {
            abort(403);
        }
    }

    public function getOrganisations()
    {
        $organisations = Organisation::all();
        return response()->json($organisations);
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
    public function store(StoreOrganisationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Organisation $organisation)
    {
        if (auth()->user()->can('view', $organisation) ) {
            return view('organisations.show', [
                'organisation' => $organisation,
            ]);

        } else {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organisation $organisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganisationRequest $request, Organisation $organisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisation $organisation)
    {
        //
    }
}
