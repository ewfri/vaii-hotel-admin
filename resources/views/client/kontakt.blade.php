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
        <form class="kontakt" id="formular" method="post" action="/contactus">
            <div class="form-group kontakt1">
                @csrf
                <label>Meno:</label>
                <input type="text" class="form-control" name="meno"/>
            </div>
            <div class="form-group kontakt1">
                <label>Priezvisko:</label>
                <input type="text" class="form-control" name="priezvisko"/>
            </div>

            <div class="form-group kontakt1">
                <label>telefónne číslo:</label>
                <input type="text" class="form-control" name="telefon"/>
            </div>
            <div class="form-group kontakt2">
                <label>Emailová adresa*:</label>
                <input type="email" class="form-control" name="email"/>
            </div>
            <div class="form-group kontakt2">
                <label>Predmet*:</label>
                <input type="text" class="form-control" name="predmet"/>
            </div>
            <div class="form-group kontakt3">
                <label class="form-label">Správa*:</label>
                <textarea class="form-control" id="textAreaExample1" name="obsah" rows="8"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="height: 100%">Kontaktuj nás</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="/js/contactus.js"></script>
@endsection
