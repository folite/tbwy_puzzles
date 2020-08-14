<?php

namespace App\Http\Controllers;

use App\topic;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Print_;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = topic::orderBy('id')->get();

        return $topics;

    }
    public function rand()
    {
        $topics = topic::inRandomOrder()->get();

        return $topics;

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $topic = new topic;
        $topic->topic = $request->topic;
        if($topic->save()){
            return $topic;
        }
        return 0;
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
     * @param  \App\topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // return 0;
        return topic::where('id', $id)->delete();
    }
}
