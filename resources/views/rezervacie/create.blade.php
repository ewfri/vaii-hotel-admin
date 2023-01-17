<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Pridať rezerváciu
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
            <form id="formular" method="post" action="{{ route('rezervacie.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="country_name">Meno:</label>
                    <input type="text" class="form-control" name="meno"/>
                </div>
                <div class="form-group">
                    <label for="country_name">Priezvisko:</label>
                    <input type="text" class="form-control" name="priezvisko"/>
                </div>
                <div class="form-group">
                    <label for="cases">Rezervácia od:</label>
                    <input type="date" class="form-control" name="od"/>
                </div>
                <div class="form-group">
                    <label for="cases">Rezervácia do:</label>
                    <input type="date" class="form-control" name="do"/>
                </div>
                <div class="form-group">
                    <label for="cases">Počet osôb:</label>
                    <input type="text" class="form-control" name="osoby"/>
                </div>
                <button type="submit" class="btn btn-primary">Pridať rezerváciu</button>
            </form>
        </div>
    </div>

@endsection

@section('scripts')

@endsection
