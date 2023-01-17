<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="card uper">
        <div class="card-header">
            Pridať zamestnanca
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
                    </div><br/>
                @endif
            </div>
            <form id="formular" method="post" action="{{ route('zamestnanci.store') }}">
                <div class="form-group">
                    @csrf
                    <label>Meno:</label>
                    <input type="text" class="form-control" required name="meno"/>
                </div>
                <div class="form-group">
                    <label>Priezvisko:</label>
                    <input type="text" class="form-control" required name="priezvisko"/>
                </div>
                <div class="form-group">
                    <label>email:</label>
                    <input type="text" class="form-control" required name="email"/>
                </div>
                <div class="form-group">
                    <label>telefon:</label>
                    <input type="text" class="form-control" required name="telefon"/>
                </div>
                <div class="form-group">
                    <label>zamestnany do:</label>
                    <input type="date" class="form-control" required name="zamestnany_od"/>
                </div>
                <div class="form-group">
                    <label>zamestnany od:</label>
                    <input type="date" class="form-control" name="zamestnany_do"/>
                </div>
                <div class="form-group">
                    <label>oddelenie:</label>
                    <select id="oddelenia" name="oddelenie_id">
                        @foreach($data as $oddelenie)
                            <option value="{{$oddelenie->id}}">{{$oddelenie->nazov_oddelenia}}</option>

                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Pridať zamestnanca</button>
            </form>
        </div>
    </div>
@endsection
