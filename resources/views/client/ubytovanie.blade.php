@extends('layouts.client')

@section('content')
    <div class="content">

        @foreach($izby as $data)

            <div class="text">
                <h5>{{$data->izba}}</h5><br>{{$data->popis}}</div>
            <div class="fotka"><img alt="img" src="{{ url('img/'.$data->obrazok) }}"/></div>


        @endforeach
    </div>

@endsection
