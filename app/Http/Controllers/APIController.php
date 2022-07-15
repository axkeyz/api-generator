<?php

namespace App\Http\Controllers;

use App\Models\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return API::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $request = request()->all();

        // Get input values
        // $user = API::create($validated);
        return $request;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\API  $api
     * @return \Illuminate\Http\Response
     */
    public function show(API $api)
    {
        // Show the API
        return $api;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\API  $api
     * @return \Illuminate\Http\Response
     */
    public function edit(API $api)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\API  $api
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, API $api)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\API  $api
     * @return \Illuminate\Http\Response
     */
    public function destroy(API $api)
    {
        //
    }
}
