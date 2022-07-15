<?php

namespace App\Http\Controllers;

use App\Models\APIType;
use Illuminate\Http\Request;

class APITypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\APIType  $api_type
     * @return \Illuminate\Http\Response
     */
    public function show(APIType $api_type)
    {
        //
        return $api_type; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\APIType  $api_type
     * @return \Illuminate\Http\Response
     */
    public function edit(APIType $api_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\APIType  $api_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, APIType $api_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\APIType  $api_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(APIType $api_type)
    {
        //
    }
}
