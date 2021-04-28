@extends('layouts.app')

@section('content')
@if (isset($message))
    @if ($message == 'won')
        <div class="alert alert-success container" style="font-size:30px">
            Tabriklaymiz yutdingiz!!!
        </div>
    @else
        <div class="alert alert-danger container" style="font-size:30px">
            {{$message}}
        </div>
    @endif
@endif
<div class="container col-md-8 mx-auto">
    {{-- <a class="btn btn-outline-primary col-md-6 mx-auto btn-lg d-flex justify-content-center " style="height:75px;padding:8px;font-size:40px; box-shadow: 0 10px 20px black; border-radius: 15px  " href="/startgame">Start</a> --}}
    <br>
    <form method="get" action="/startgame" class=" col-md-6 mx-auto btn-lg d-flex justify-content-center container " >
        <div>
            <input type="submit" name="start" value="Start"  class="btn btn-outline-primary col-md-6 mx-auto btn-lg d-flex justify-content-center "  style="height:75px;width:250px;padding:8px;font-size:40px; box-shadow: 0 10px 20px black; border-radius: 15px  ">
        </div>
        <div>
            <div class="form-check">
                <input type="radio" class="btn-radio" id="contactChoice1" name="level" value='1'>
                <label class="btn btn-outline-danger" for="contactChoice1" value='easy'>Easy</label>
            </div>
            <div class="form-check">
                <input type="radio" class="btn-radio" id="contactChoice2" name="level" value='2'>
                <label class="btn btn-outline-danger" for="contactChoice2" value='medium'>Medium</label>
            </div>
             <div class="form-check">
            <input type="radio" class="btn-radio" id="contactChoice3" name="level" value="3">
            <label class="btn btn-outline-danger" for="contactChoice3" value="hard">Hard</label>
            
            
            </div>
        </div>
    </form>
    <br><h3 class="border border-primary col-md-6 mx-auto btn-lg d-flex justify-content-center " style="">
        Player:{{ Auth::user()->name }}
    </h3>
    
</div>
@endsection
