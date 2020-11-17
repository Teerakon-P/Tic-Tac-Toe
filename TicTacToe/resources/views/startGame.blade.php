@extends('layout.master')       

@section('content')

    <form action="/playGame" method="get">
        <h4> Size Board </h4>
        <select name="value" id="board">
            <?php
                for($i = 3; $i < 11; $i++){
            ?>
            <option value="{{$i}}"> {{$i}} x {{$i}} </option>
            <?php
                }
            ?>
        </select> 
        <br>
        <br>
        <h4> The First Player </h4>
            <input type="radio" name="player" value="O" checked="checked"> &nbsp;<b> X </b>
            &nbsp;&nbsp;&nbsp;
            <input type="radio" name="player" value="X"> &nbsp; <b> O </b>            
        <br>
        <br>
        <button type="submit" class="btn btn-light"><b> START </b></button> 

    </form>

@endsection