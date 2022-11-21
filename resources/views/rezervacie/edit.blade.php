@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Upraviť rezerváciu
        </div>
        <div class="card-body">
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
            <form method="post" action="{{ route('rezervacie.update', $rezervacia->id ) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="country_name">Meno:</label>
                    <input type="text" class="form-control" name="meno" value="{{ $rezervacia->meno }}"/>
                </div>
                <div class="form-group">
                    <label for="cases">Priezvisko:</label>
                    <input type="text" class="form-control" name="priezvisko" value="{{ $rezervacia->priezvisko }}"/>
                </div>
                <div class="form-group">
                    <label for="cases">Rezervácia od:</label>
                    <input type="date" class="form-control" name="od" value="{{ $rezervacia->od }}"/>
                </div>
                <div class="form-group">
                    <label for="cases">Rezervácia do:</label>
                    <input type="date" class="form-control" name="do" value="{{ $rezervacia->do }}"/>
                </div>
                <div class="form-group">
                    <label for="cases">Počet osôb:</label>
                    <input type="text" class="form-control" name="osoby" value="{{ $rezervacia->osoby }}"/>
                </div>
                <button type="submit" class="btn btn-primary">Upraviť rezerváciu</button>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        let elems = document.getElementsByClassName('btn-primary');
        let confirmIt = function (e) {
            let anyerrors = false;
            let showErrors = '<div class="alert alert-danger"><ul>\n';
            let meno = document.getElementsByName('meno')[0].value;
            let priezvisko = document.getElementsByName('priezvisko')[0].value;
            let odKedy = document.getElementsByName('od')[0].value;
            let dokedy = document.getElementsByName('do')[0].value;
            let pocetOsob = document.getElementsByName('osoby')[0].value;



            if (meno === '') {
                anyerrors = true;
                showErrors += '<li>' + 'Pole "Meno" nesmie byt prázdne!' +'</li>';
            } else if (!/^[a-zA-Z]+$/.test(meno)) {
                anyerrors = true;
                showErrors += '<li>' + 'Pole "Meno" obsahuje nepovolené znaky!' +'</li>';
            }

            if (priezvisko === '') {
                anyerrors = true;
                showErrors += '<li>' + 'Pole "Priezvisko" nesmie byt prázdne!' +'</li>';
            } else if (!/^[a-zA-Z]+$/.test(priezvisko)) {
                anyerrors = true;
                showErrors += '<li>' + 'Pole "Priezvisko" obsahuje nepovolené znaky!' +'</li>';
            }

            if (odKedy === '') {
                anyerrors = true;
                showErrors += '<li>' + 'Pole "Rezervácia do" nesmie byť prázdne!' +'</li>';
            }/* else if (Date.isDate(odKedy)) {
                anyerrors = true;
                showErrors += '<li>' + 'Pole "Rezervácia od" nie je dátum!' +'</li>';
            }*/

            if (dokedy === '') {
                anyerrors = true;
                showErrors += '<li>' + 'Pole "Rezervácia do" nesmie byť prázdne!' +'</li>';
            } /*else if (Date.isDate(dokedy)) {
                anyerrors = true;
                showErrors += '<li>' + 'Pole "Rezervácia do" nie je dátum!' +'</li>';
            }*/

            if (pocetOsob === '') {
                anyerrors = true;
                showErrors += '<li>' + 'Pole "Počet osôb" nesmie byť prázdne!' +'</li>';
            } else if (!/\d/.test(pocetOsob)) {
                anyerrors = true;
                showErrors += '<li>' + 'Pole "Počet osôb" nie je číslo!' +'</li>';
            }

            if (anyerrors) {
                showErrors += '</div><br/>';
                document.getElementById('jscheck').innerHTML = showErrors;
                e.preventDefault();
            }
        };
        for (let i = 0, l = elems.length; i < l; i++) {
            elems[i].addEventListener('click', confirmIt, false);
        }
    </script>
@endsection
