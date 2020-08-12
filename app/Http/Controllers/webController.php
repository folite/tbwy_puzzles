<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\WayController;

class webController extends Controller
{
    protected $TopicController, $WayController;
    public function __construct(TopicController $TopicController, WayController $WayController)
    {
        $this->TopicController = $TopicController;
        $this->WayController = $WayController;
    }

    public function webView()
    {
        $topic = $this->TopicController->rand()->toArray();
        $way = $this->WayController->index()->toArray();
        // print_r($topic);
        foreach ($topic as $index => $value) {
            shuffle($way);
            $topic[$index]['way'] = $way[0]['way'];
        }
        // print_r($topic);

        return view('index', ['collection' => $topic]);
    }
    public function webAdmin(Type $var = null)
    {
        return view('control');
    }
}
