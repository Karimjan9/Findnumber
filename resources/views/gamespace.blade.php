@extends('layouts.app')

@section('content')

<div class="container col-md-6 mx-auto">
    <table class="table col-md-12 mx-auto">
        <thead>
            <tr class="table-info">
                <th>
                    <h3 class="col-md-12 mx-auto d-flex justify-content-center">Find Number</h3>
                    
                </th>
            </tr>
            <tr class="table-info">
                <th>
                    <h3 class="col-md-12 mx-auto d-flex justify-content-center"> Player: {{ Auth::user()->name }}</h3>
                </th>
            </tr>
            <tr class="table-info">
                <th>
                    <h3 class="col-md-12 mx-auto d-flex justify-content-center">
                        1-1000 gacha son tanla!
                    </h3>
                </th>
            </tr>
            <tr class="table-info">
                <th>
                    <form action="/checkNumber" class="col-md-12 mx-auto d-flex justify-content-center" method="post">
                        @csrf
                        <?php
                        if(isset($id)){
                            ?>
                                <input type="hidden" name='id' value='{{$id}}'>
                            <?php
                        }
                        ?>
                        <input type="hidden" name="level" value="{{$level}}">
                        <input type="number" name="tanlanganson">
                        <input type="submit">
                    </form>
                </th>
            </tr>
            <tr >
            <th>
                <h3 class="">
                    Tries:<?php if(isset($i))echo $i; else echo 0;?>
                </h3>
                
            </th>
            <th>
                <h3 class=" ">
                    Tries left:<?php  echo $xodlar - $i; ?>
                </h3>
            </th>
            </tr>
            <tr>
                <th>
                    <h3 class="col-md-12 mx-auto d-flex justify-content-center">
                        <div class="alert alert-info">
                            <?php if(isset($son))echo $son; ?> 
                            @if (isset($message) && isset($taqoslash))
                            ->   {{ $message }} -> {{$taqoslash}}
                            @endif
                        </div>
                    </h3>
                </th>
            </tr>
            <tr>
                <th>
                    <h3 class="col-md-12 mx-auto d-flex justify-content-center">
                        <div class="alert alert-info">
                            <?php if(isset($history))echo $history; ?>
                        </div>
                    </h3>
                </th>
            </tr>
            
        </thead>
        <tbody>
            
        </tbody>
        
    </table>

</div>

@endsection