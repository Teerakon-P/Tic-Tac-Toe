<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = ['board'  => [],
                 'winner' => '',
                 'draw'   => ''];
        $value = request('value');
        $player = request('player');

        $select = $request->input('select');
        if ($select != '') {
            $data = \App::call('App\Http\Controllers\ApiController@move');
        }

        return view('playGame', compact('value','player'),['data' => $data]);
    }

    public function reset(Request $request)
    {
        $request->session()->forget('board');
        return redirect()->route('home'); 
    }

}