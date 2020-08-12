<?php

namespace App\Http\Controllers;

use App\way;
use Illuminate\Http\Request;

class WayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ways = way::all();

        return $ways;
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
     * @param  \App\way  $way
     * @return \Illuminate\Http\Response
     */
    public function show(way $way)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\way  $way
     * @return \Illuminate\Http\Response
     */
    public function edit(way $way)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\way  $way
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, way $way)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\way  $way
     * @return \Illuminate\Http\Response
     */
    public function destroy(way $way)
    {
        //
    }
}
