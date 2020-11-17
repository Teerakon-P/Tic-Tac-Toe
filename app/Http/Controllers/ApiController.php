<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    
    public function move(Request $request)
    {   
        //$value = request('value');
        $player = request('player');
        $board = $request->session()->get('board');
        $returnArr = ['board' => $board,
                        'winner'=> '',
                        'draw'  => ''];

        if (!$board) {
            $board = [
                ['','','','','','','','','',''],
                ['','','','','','','','','',''],
                ['','','','','','','','','',''],
                ['','','','','','','','','',''],
                ['','','','','','','','','',''],
                ['','','','','','','','','',''],
                ['','','','','','','','','',''],
                ['','','','','','','','','',''],
                ['','','','','','','','','',''],
                ['','','','','','','','','',''],
            ];
        } 

        $sel = $request->input('select');
        $selArr = explode('-', $sel);
        $board[$selArr[0]][$selArr[1]] = $player;
        
        $win = $this->checkWin($player, $board);
        if ($win) {
            $winner = $player;
            $request->session()->put('board', $board);
            
            $returnArr['board'] = $board;
            $returnArr['winner'] = $winner;
            return $returnArr;
        }
       
        $draw = $this->gameDraw($board);
        if ($draw) {
            $request->session()->put('board', $board);

            $returnArr['board'] = $board;
            $returnArr['draw'] = $draw;
            return $returnArr;
        }  
        
        $request->session()->put('board', $board);
        $returnArr['board'] = $board;
        return $returnArr;
    }
    
    private function gameDraw($board) {
        $value = request('value');
        $draw = true;
        for ($i=0; $i<$value;$i++) {
            for ($n=0; $n<$value;$n++) {
                if ($board[$i][$n] == '') {
                    $draw = false;
                }
            }
        }
    
        return $draw;
    }
    
    private function checkWin($player, $board) {
        $win = false;
        $value = request('value');
        // row
        for($i = 0; $i < $value ; $i++){
            $count = 0;
            for($j = 0; $j < $value; $j++){
                if($board[$i][$j] == $player){ 
                    $count++; 
                }
            }
            if($count == $value){
                $win = true;
            }
        }

        // col
        for($i = 0; $i < $value; $i++){
            $count = 0;
            for($j = 0; $j < $value; $j++){
                if($board[$j][$i] == $player){ 
                    $count++; 
                }
            }
            if($count == $value){
                $win = true;
            }
        }
        
        // diagonal right
        $count = 0;
        for($i = 0, $j = 0; $i < $value; $i++, $j++){
            if($board[$i][$j] == $player){ 
                $count++; 
            }
        }
        if($count == $value){
            $win = true;
        }

        // diagonal left
        $count = 0;
        for($i = 0, $j = $value-1; $j >= 0 ; $i++ , $j--){
            if($board[$i][$j] == $player){ 
                $count++; 
            }
        }
        if($count == $value){
            $win = true;
        }

        return $win;   
    }
}