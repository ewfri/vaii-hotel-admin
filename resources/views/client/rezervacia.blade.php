@extends('layouts.client')

@section('content')


    <div class="content">
        <div id="jscheck">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
        </div>
        <form class="kontakt" id="formular" method="post" action="/reservation">
            <div class="form-group kontakt2">
                @csrf
                <label>Meno:</label>
                <input type="text" class="form-control" name="meno"/>
            </div>
            <div class="form-group kontakt2">
                <label>Priezvisko:</label>
                <input type="text" class="form-control" name="priezvisko"/>
            </div>
            <div class="form-group kontakt1">
                <label>Rezervácia od:</label>
                <input type="date" class="form-control" name="od"/>
            </div>
            <div class="form-group kontakt1">
                <label>Rezervácia do:</label>
                <input type="date" class="form-control" name="do"/>
            </div>
            <div class="form-group kontakt1">
                <label>Počet osôb:</label>
                <input type="text" class="form-control" name="osoby"/>
            </div>
            <button type="submit" class="btn btn-primary">Pridať rezerváciu</button>
        </form>
    </div>
@endsection


@section('scripts')
    <script src="/js/reservation.js"></script>
@endsection
