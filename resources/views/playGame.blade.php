<?php 
if (isset($data['board'])) {
    $board = $data['board'];
    $winner = $data['winner'];
    $draw = $data['draw'];
}
?>

@extends('layout.master')       

@section('content') 

    @if($player == 'X')
        <?php $player = 'O'; ?>
    @else
        <?php $player = 'X'; ?>
    @endif

    @if (!$winner)
        <h4> Player : {{$player}}  </h4>
    @endif
        <br>
    @for ($i = 0; $i < $value; $i++)
        @for ($j = 0; $j < $value; $j++)
            <button type="button" class="btn btn-outline-dark">
                @if (count($board) > 0 && $board[$i][$j] != '')
                   <div class="xo"> {{ $board[$i][$j] }} </div>
                @else
                    <?php  $num = "$i-$j"; ?>
                    @if (!$winner)
                        <a href="{{ url('playGame?select='.$num.'&value='.$value.'&player='.$player) }}" class="text-decoration-none"> ? </a>
                    @endif
                @endif            
            </button>
        @endfor
        <br>
    @endfor
    <br>

    <form action="{{ url("reset") }}" method="get">
    @if ($winner)
        <h3> Player {{ $winner }} Win ! </h3><br><button class="btn btn-light"> New Game </button><br>
    @elseif ($draw)
        <h3> Player Draw ! </h3><br><button class="btn btn-light"> New Game </button><br>
     @endif
    </form>

@endsection